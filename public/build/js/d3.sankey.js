/*
 * Right now, it is assumed that the number of WANs is 3.
 * (See computeWanTotal().)
 */
d3.sankey = function() {
  var sankey = {},
      nodeWidth = 24,
      nodePadding = 1,
      zeroPadding = 0;
      wanPadding = 0,
      wanTotal = 0,
      srcColumn = 0,
      gnatColumn = 1,
      wanColumn = 2,
      netColumn = 3,
      bondingServerColumn = 4,
      dstColumn = 5,
      numTrafficFlows = 0,
      size = [1, 1],
      wans = [],
      networks = [],
      nodes = [],
      links = [];

  var wanLabel = "WAN";

  sankey.nodeWidth = function(_) {
    if (!arguments.length) return nodeWidth;
    nodeWidth = +_;
    return sankey;
  };

  sankey.nodePadding = function(_) {
    if (!arguments.length) return nodePadding;
    nodePadding = +_;
    return sankey;
  };

  sankey.nodes = function(_) {
    if (!arguments.length) return nodes;
    nodes = _;
    return sankey;
  };

  sankey.links = function(_) {
    if (!arguments.length) return links;
    links = _;
    return sankey;
  };

  sankey.wans = function(_) {
    if (!arguments.length) return wans;
    wans = _;
    wanTotal = computeWanTotal();
    return sankey;
  };

  sankey.networks = function(_) {
    if (!arguments.length) return networks;
    networks = _;
    return sankey;
  };

  sankey.size = function(_) {
    if (!arguments.length) return size;
    size = _;
    return sankey;
  };

  sankey.layout = function(iterations) {
    computeNodeLinks();
    computeNodeValues();
    computeNodeBreadths();
    computeNodePadding();
    computeNodeDepths(iterations);
    computeLinkDepths();
    return sankey;
  };

  sankey.relayout = function() {
    computeLinkDepths();
    return sankey;
  };

  sankey.link = function() {
    var curvature = .5;

    function link(d) {
      var x0 = d.source.x + d.source.dx,
          x1 = d.target.x,
          xi = d3.interpolateNumber(x0, x1),
          x2 = xi(curvature),
          x3 = xi(1 - curvature),
          y0 = d.source.y + d.sy + d.dy / 2,
          y1 = d.target.y + d.ty + d.dy / 2;
      return "M" + x0 + "," + y0
           + "C" + x2 + "," + y0
           + " " + x3 + "," + y1
           + " " + x1 + "," + y1;
    }

    link.curvature = function(_) {
      if (!arguments.length) return curvature;
      curvature = +_;
      return link;
    };

    return link;
  };

  sankey.columnCategory = function(column) {
    if (column == srcColumn)
      return "src";
    else if (column == gnatColumn)
      return "gnat";
    else if (column == wanColumn)
      return "wan";
    else if (column == netColumn)
      return "network";
    else if (column == bondingServerColumn)
      return "bondingServer";
    else
      return "dst";
  }

  // Compute the number of WANs that actually have flows going through them
  // for this set of data
  function computeWanTotal() {
      if ((wans[0].flows != 0) &&
         (wans[1].flows != 0) &&
         (wans[2].flows != 0))
          return (3);

      if (((wans[0].flows == 0) && (wans[1].flows == 0)) ||
          ((wans[0].flows == 0) && (wans[2].flows == 0)) ||
          ((wans[1].flows == 0) && (wans[2].flows == 0)))
          return (1);

      return (2);
  }

  // Populate the sourceLinks and targetLinks for each node.
  // Also, if the source and target are not objects, assume they are indices.
  function computeNodeLinks() {
    nodes.forEach(function(node) {
      node.sourceLinks = [];
      node.targetLinks = [];
    });
    links.forEach(function(link) {
      var source = link.source,
          target = link.target;
      if (typeof source === "number") source = link.source = nodes[link.source];
      if (typeof target === "number") target = link.target = nodes[link.target];
      source.sourceLinks.push(link);
      target.targetLinks.push(link);
    });
  }

  // Compute the value (size) of each node by summing the associated links.
  function computeNodeValues() {
    nodes.forEach(function(node) {
      node.value = Math.max(
        d3.sum(node.sourceLinks, value),
        d3.sum(node.targetLinks, value)
      );
    });
  }

  // Iteratively assign the breadth (x-position) for each node.
  // Nodes are assigned the maximum breadth of incoming neighbors plus one;
  // nodes with no incoming links are assigned breadth zero, while
  // nodes with no outgoing links are assigned the maximum breadth.
  function computeNodeBreadths() {
    var remainingNodes = nodes,
        nextNodes,
        x = 0;

    while (remainingNodes.length) {
      nextNodes = [];
      remainingNodes.forEach(function(node) {
        node.x = x;
        node.dx = nodeWidth;
        node.sourceLinks.forEach(function(link) {
          if (nextNodes.indexOf(link.target) < 0) {
            nextNodes.push(link.target);
          }
        });
      });
      remainingNodes = nextNodes;
      ++x;
    }

    // Determine the column for each node.
    // Also determine the total number of traffic flows for this set of data.
    nodes.forEach(function(node) {
        node.column = node.x;
        if (node.column == srcColumn)
          numTrafficFlows++;
    });

    moveSinksRight(x);
    scaleNodeBreadths((size[0] - nodeWidth) / (x - 1));
  }

  function moveSourcesRight() {
    nodes.forEach(function(node) {
      if (!node.targetLinks.length) {
        node.x = d3.min(node.sourceLinks, function(d) { return d.target.x; }) - 1;
      }
    });
  }

  function moveSinksRight(x) {
    nodes.forEach(function(node) {
      if (!node.sourceLinks.length) {
        node.x = x - 1;
      }
    });
  }

  function scaleNodeBreadths(kx) {
    nodes.forEach(function(node) {
      node.x *= kx;
    });
  }

  /*
   * computeNodePadding()
   *
   * Compute the padding, or space, between a given node and the next node.
   * By default, all nodes will have "nodePadding", except if they are in
   * in the WAN or NETWORK (softflow) columns.
   *
   * In the WAN or NETWORK columns, nodes are stacked according to which
   * WAN / NETWORK they belong to.  Nodes that are stacked on top of other nodes
   * have a padding of 0.  The last node in a WAN / NETWORK group has a larger
   * amount of space between it and the next node, or "wanPadding".  This
   * larger amount of space makes the WAN / NETWORK groups more visually
   * distinct and allows enough space for the WAN / NETWORK text label.
   */
  function computeNodePadding() {
    var nodesByBreadth = d3.nest()
        .key(function(d) { return d.x; })
        .sortKeys(d3.ascending)
        .entries(nodes)
        .map(function(d) { return d.values; });

      nodesByBreadth.forEach(function(nodes) {
        nodes.forEach(function(node, idx) {

        // Set the default padding for every node
        node.padding = nodePadding;

        // If not WAN or NETWORK column nodes, nothing more to do
        if ((node.column != wanColumn) &&
            (node.column != netColumn))
          return;

        // wanSubFlowTotal: the total number of subflows across WANs 1, 2, and 3
        var wanSubFlowTotal = wans[0].flows + wans[1].flows + wans[2].flows;

        // firstWanFlow: the node index of the first node in the WAN column
        var firstWanFlow = numTrafficFlows + 1;

        // firstNetFlow: the node index of the first node in the NETWORK column
        var firstNetFlow = numTrafficFlows + 1 + wanSubFlowTotal;

        // last NetFlow: the node index of the last node in the NETWORK column
        var lastNetFlow = firstNetFlow + wanSubFlowTotal - 1;

        // First set padding for all WAN and NETWORK nodes to 0
        node.padding = zeroPadding;

        /*
         * The below settings allow the WAN and NETWORK text labels
         * have enough space to print, and prevent the padding not
         * to be so much so as to cause nodes to go out of bounds.
         */

        /*
        if (numTrafficFlows <= 2)
                wanPadding = numTrafficFlows * 30;
        else if (numTrafficFlows <= 7)
                wanPadding = numTrafficFlows * 9;
        else
                wanPadding = numTrafficFlows * 7;
        */

        wanPadding = 65;                // This is good enough for now


        // Note: If there are < maximum 3 WANs, the WAN label # may not be
        // consecutive, depending on what the WAN JSON data is (e.g.,
        // "WAN1" and "WAN3" might be the names of the two WANs displayed)

        // A maximum of three WAN groups of nodes and three NETWORK groups
        // of nodes is displayed.  Above each such group, a text label is
        // also displayed.  This text label needs to be associated with a
        // node in order to be displayed.
        //
        // Below we determine which node to associate each label with (always
        // the first node in each group), and also which node gets more padding
        // ("wanPadding") (always the last node in each group).
        //
        // (See function header comments [above] for more information.)
        //
        // For now, the WAN labels are simply "WAN1", "WAN2", and "WAN3".
        // The NETWORK labels come from the "energy" JSON data passed into
        // the "animation()" function.

        if (wans[0].flows != 0) {
          if (idx == 0) {
            if (node.column == wanColumn) {
              node.label = wanLabel + 1;        // "WAN1"
            } else {
              node.label = networks[0].name;
            }
          }
          if (((wans[1].flows != 0) || (wans[2].flows != 0)) &&
                     (idx == (+wans[0].flows - 1))) {
            node.padding = wanPadding;
          }
        }

        if (wans[1].flows != 0) {
          if (((wans[0].flows != 0) && (idx == wans[0].flows)) ||
              ((wans[0].flows == 0) && (idx == 0))) {

            if (node.column == wanColumn) {
              node.label = wanLabel + 2;        // "WAN2"
            } else {
              node.label = networks[1].name;
            }
          }
          if ((wans[2].flows != 0) &&
                     (((wans[0].flows != 0) &&
                       (idx == (+wans[0].flows + +wans[1].flows - 1))) ||
                      ((wans[0].flows == 0) &&
                      (idx == (+wans[1].flows - 1))))) {
            node.padding = wanPadding;
          }
        }

        if (wans[2].flows != 0) {
           if (((wans[0].flows != 0) &&
                (wans[1].flows != 0) &&
                (idx == +wans[0].flows + +wans[1].flows)) ||
               ((wans[0].flows == 0) &&
                (wans[1].flows == 0) &&
                (idx == 0)) ||
               (idx == +wans[0].flows + +wans[1].flows)) {

             if (node.column == wanColumn) {
               node.label = wanLabel + 3;       // "WAN3"
             } else {
               node.label = networks[2].name;
             }
           }
        }
      });
    });
  }

  function computeNodeDepths(iterations) {
    var nodesByBreadth = d3.nest()
        .key(function(d) { return d.x; })
        .sortKeys(d3.ascending)
        .entries(nodes)
        .map(function(d) { return d.values; });

    initializeNodeDepth();
    resolveCollisions();
    for (var alpha = 1; iterations > 0; --iterations) {
      relaxRightToLeft(alpha *= .99);
      resolveCollisions();
      relaxLeftToRight(alpha);
      resolveCollisions();
    }

    function initializeNodeDepth() {
      var ky = d3.min(nodesByBreadth, function(nodes) {
//    return (size[1] - (nodes.length - 1) * nodePadding) / d3.sum(nodes, value);
      return (size[1] - (18) * nodePadding) / d3.sum(nodes, value);
      });

      nodesByBreadth.forEach(function(nodes) {
        nodes.forEach(function(node, i) {
          node.y = i;
          node.dy = node.value * ky;
        });
      });

      links.forEach(function(link) {
        link.dy = link.value * ky;
      });
    }

    function relaxLeftToRight(alpha) {
      nodesByBreadth.forEach(function(nodes, breadth) {
        nodes.forEach(function(node) {
          if (node.targetLinks.length) {
            var y = d3.sum(node.targetLinks, weightedSource) / d3.sum(node.targetLinks, value);
            node.y += (y - center(node)) * alpha;
          }
        });
      });

      function weightedSource(link) {
        return center(link.source) * link.value;
      }
    }

    function relaxRightToLeft(alpha) {
      nodesByBreadth.slice().reverse().forEach(function(nodes) {
        nodes.forEach(function(node) {
          if (node.sourceLinks.length) {
            var y = d3.sum(node.sourceLinks, weightedTarget) / d3.sum(node.sourceLinks, value);
            node.y += (y - center(node)) * alpha;
          }
        });
      });

      function weightedTarget(link) {
        return center(link.target) * link.value;
      }
    }

    function resolveCollisions() {
      nodesByBreadth.forEach(function(nodes) {
        var node,
            dy,
            y0 = 0,
            n = nodes.length,
            pad,
            i;

        // Push any overlapping nodes down.

        // Note: Do not sort based on depth
        // (we want to keep the original order
        // passed in to us, i.e. based on flow index)

        // nodes.sort(ascendingDepth);

        for (i = 0; i < n; ++i) {
          node = nodes[i];

          dy = y0 - node.y;
          if (dy > 0) node.y += dy;
          y0 = node.y + node.dy + node.padding;
        }

        // If the bottommost node goes outside the bounds, push it back up.
        dy = y0 - nodePadding - size[1];
//        if (dy > 0) {
//          y0 = node.y -= dy;

        if (dy + 10 > 0) {
          y0 = node.y -= dy + 20;

          // Push any overlapping nodes back up.
          for (i = n - 2; i >= 0; --i) {
            node = nodes[i];
            dy = node.y + node.dy + node.padding - y0;
            if (dy > 0) node.y -= dy;
            y0 = node.y;
          }
        }
      });
    }

    function ascendingDepth(a, b) {
      return a.y - b.y;
    }
  }

  function computeLinkDepths() {
    nodes.forEach(function(node) {
      node.sourceLinks.sort(ascendingTargetDepth);
      node.targetLinks.sort(ascendingSourceDepth);
    });
    nodes.forEach(function(node) {
      var sy = 0, ty = 0;
      node.sourceLinks.forEach(function(link) {
        link.sy = sy;
        sy += link.dy;
      });
      node.targetLinks.forEach(function(link) {
        link.ty = ty;
        ty += link.dy;
      });
    });

    function ascendingSourceDepth(a, b) {
      return a.source.y - b.source.y;
    }

    function ascendingTargetDepth(a, b) {
      return a.target.y - b.target.y;
    }
  }

  function center(node) {
    return node.y + node.dy / 2;
  }

  function value(link) {
    return link.value;
  }

  return sankey;
};
