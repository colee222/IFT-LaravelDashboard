<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8" />
<title>GNAT Flow</title>
<style>
.node rect {
  cursor: move;
  fill-opacity: .9;
  shape-rendering: crispEdges;
}

.node text {
  pointer-events: none;
  text-shadow: 0 1px 0 #fff;
}

.link {
  fill: none;
  stroke: #000;
  stroke-opacity: .05;
}

.link:hover {
  stroke-opacity: .25;
}

svg {
  position: absolute;
    overflow:hidden
}

canvas {
  position: absolute;
    overflow:hidden
}

#chart {
  position: fixed;
  left: 10px;
  right: 10px;
  top: 10px;
  bottom: 10px;
    overflow:hidden;
}

/*
 * Removing the scrollbar prevents the particles from being scrolled off
 * the animation
 */
html {
  overflow-y: hidden;
    overflow-x: hidden;
    
}


</style>
</head>
<body>

<div id="chart"></div>

<!--/*
 * Use a very large canvas and svg size to ensure that the particles can
 * display properly
 */
-->
<canvas width="4000" height="4000" ></canvas>
<svg width="4000" height="4000" ></svg>

<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.16/d3.min.js" charset="utf-8" type="text/javascript"></script>
<script src="https://d3js.org/d3-timer.v1.min.js"></script>
<script src="d3.sankey.js" charset="utf-8" type="text/javascript"></script>
-->

<script src="/build/js/d3.min.js" charset="utf-8" type="text/javascript"></script>
<script src="/build/js/d3-timer.v1.min.js"></script>
<script src="/build/js/d3.sankey.js" charset="utf-8" type="text/javascript"></script>
    
    
    
    
<script type="text/javascript">

    const VERBOSE = 1;

    const HOSTADDRESS = "http://"+window.location.hostname+":8080/?outFlowInfox";
    const SCALE = 1000;

    /************************************************************************/
    /******************* Constants for convertJson() code *******************/

    const DISPLAY_NUM = 7;
    const THROUGHPUT_THRESHOLD = 0.01

    const MAX_WANS = 3;
    const MAX_SUBFLOWS = 65536 * 3;
    const BONDING_MODE = 2;
    const BONDING_MODE_FORCE = 0;

    const GNAT = "GNAT";
    const BONDING_SERVER = "BONDING SERVER";

    const WAN_NETWORKS = ["SOFTFLOW1","SOFTFLOW2","SOFTFLOW3"];

    /************************************************************************/
    /************************************************************************/


    var margin = {top: 1, right: 1, bottom: 6, left: 1},
        width = 4000 - margin.left - margin.right,
        height = 4000 - margin.top - margin.bottom;

    var chartDiv = document.getElementById("chart");

    var formatNumber = d3.format(",." + Math.log10(SCALE) + "f"),
        format = function(d) { return formatNumber(d) + " Mbps"; },
        color = d3.scale.category20();

    var svg;
    var sankey;
    var path;

    /*
 * delay is the rate at which new JSON data is processed
 * and the display is refreshed
 */
    var delay = 5000;      // 5 seconds

    /*
 * Perform the animation only when the display is in the foreground.
 */
    var doVisualUpdates = true;

    document.addEventListener('visibilitychange', function(){
        doVisualUpdates = !document.hidden;
    });

    /*
 * Listen for window resize events and refresh the animation accordingly
 */
    window.addEventListener("resize", refresh);

    /*
 * Disable mouse scrolling (otherwise the particles will be scrolled and
 * detach from the animation)
 */
    window.addEventListener("wheel", function(e){e.preventDefault();}, {passive: false} );


    /*
 * Note: PERCENTAGE and PERCENT exist because sometimes test JSON input data
 * is used where the elements of the bondingRatio array consist of percentages
 * rather than decimals.  In this case, the following must be set:

PERCENTAGE = 100;
PERCENT = .01;

 */
    var PERCENTAGE;
    var PERCENT;


    /*
 ***********************************************************************
 * Input code--REAL (start) ********************************************
 ***********************************************************************
 */

    PERCENTAGE = 1;
    PERCENT = 1;

    var outputJson;

    process();

    /*
 * Refresh JSON data and perform the animation every "delay" seconds
 */
    function process() {
        if (doVisualUpdates)
            refreshDisplay();

        setTimeout(process, delay);
    }

    function refreshDisplay() {
        var xhttp = new XMLHttpRequest();
        /*xhttp.onreadystatechange = function() {
                if (!((this.readyState == 4) && (this.status == 200))) {
                        console.log("getJSON(): returning: this.readyState: " +
                            this.readyState + "; this.status: " + this.status +
                            "\n");
                        return;
                }*/


        var testVar = {"outFlowTraffic": [
            {
                "index": 1,
                "protocol": "TCP",
                "srcIP": "192.168.1.1",
                "dstIP": 9,
                "srcPort": 8080,
                "dstPort": 360,
                "wanNum": 1,
                //"sendRate1s": sendRate1s,
                "sendRate20s": 200,
                //"recvRate1s": recvRate1s,
                //"recvRate20s": recvRate20s,
            },
            {
                "index": 2,
                "protocol": "TCP",
                "srcIP": "192.168.1.1",
                "dstIP": 9,
                "srcPort": 8080,
                "dstPort": 360,
                "wanNum": 2,
                //"sendRate1s": sendRate1s,
                "sendRate20s": 40,
                //"recvRate1s": recvRate1s,
                //"recvRate20s": recvRate20s,
            },
            {
                "index": 3,
                "protocol": "TCP",
                "srcIP": "192.168.1.1",
                "dstIP": 9,
                "srcPort": 8080,
                "dstPort": 360,
                "wanNum": 3,
                //"sendRate1s": sendRate1s,
                "sendRate20s": 100,
                //"recvRate1s": recvRate1s,
                //"recvRate20s": recvRate20s,
            },
        ]};

        var inputJson; //The read-only XMLHttpRequest property responseText returns the text received from a server following a request being sent.
        if ((inputJson = JSON.parse( JSON.stringify(  testVar))) == undefined) {
            console.log("getJSON(): No valid input\n");
            return;
        }

        if (VERBOSE)
            console.log(inputJson);

        outputJson = convertJson(inputJson);
        if (Object.keys(outputJson).length == 0) {
            console.log("getJSON(): Object length: 0\n");
            return;
        }


            refresh();
    }//refreshDisplay() 
    
    var hostAddress = HOSTADDRESS;
    xhttp.open("GET", hostAddress, true);
    xhttp.send(null);
    //}


    /*
 ***********************************************************************
 * Input code--REAL (end) **********************************************
 ***********************************************************************
 */

    /*
 ***********************************************************************
 ***********************************************************************
 */

    function refresh() {
        reinit();
        animation(outputJson);
    }

    /*
 * reinit()
 *
 * This function is critical to clearing the display every iteration
 */
    function reinit() {

        d3.selectAll("svg").remove();

        svg = d3.select(chartDiv).append("svg");

        width = chartDiv.clientWidth;
        height = chartDiv.clientHeight;

        svg
            .attr("width", width)
            .attr("height", height)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        sankey = d3.sankey()
            .nodeWidth(20)
            .nodePadding(12)
            .size([width, height]);

        path = sankey.link();
    }

    /*
 * animation()
 *
 * It is better to call the below function synchronously (with
 * already parsed JSON data), rather than use d3.json(), an asynchronous
 * callback (which takes a file of JSON data as input).  This is because
 * the animation function needs to be called in a loop, and, if it were
 * an asynchronous callback, it would cause overlap of its particle
 * animation with previous or future animation calls, thus causing problems
 * with the display.
 */
    function animation(energy) {

        sankey
            .nodes(energy.nodes)
            .links(energy.links)
            .wans(energy.wans)
            .networks(energy.networks)
            .layout(32);

        var link = svg.append("g").selectAll(".link")
        .data(energy.links)
        .enter().append("path")
        .attr("class", "link")
        .attr("d", path)
        .style("stroke-width", function(d) { return Math.max(1, d.dy); })
        .sort(function(a, b) { return b.dy - a.dy; });

        link.append("title")
            .text(function(d) { return d.title = d.source.name + " → " + d.target.name + "\n" + format(d.valueTrue); });

        var node = svg.append("g").selectAll(".node")
        .data(energy.nodes)
        .enter().append("g")
        .attr("class", "node")
        .attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; })

        /*
   * Colors for all bars
   * Aside from the GNAT and BONDING SERVER nodes / bars, which are set to a
   * hardcoded color, all other nodes / bars are set to a color determined
   * by the prefix in their name (in this case, the traffic flow ID).  This
   * color is persistent for the life of the application (i.e. not across
   * reboots).
   */
        node.append("rect")
            .attr("height", function(d) { return d.dy; })
            .attr("width", sankey.nodeWidth())
            .style("fill", function(d) {
            if ((sankey.columnCategory(d.column) == "gnat") ||
                (sankey.columnCategory(d.column) == "bondingServer"))
                return d.color = "lightgray";
            else
                return d.color = color(d.name.replace(/ .*/, ""));
        })
            .style("stroke", "none")
            .append("title")
            .text(function(d) {
            d.valueTrue = d.value / SCALE;
            return d.name + "\n" + d.valueTrue.toFixed(Math.log10(SCALE)) + " Mbps";
        });

        /*
   * Bar-side labels
   * (For left-hand bars, the text displays to the right of the bar;
   * for right-hand bars, the text displays to the left of the bar)
   */
        node.append("text")
            .attr("x", -6)
            .attr("y", function(d) { return d.dy / 2; })
            .attr("dy", ".35em")
            .attr("text-anchor", "end")
            .attr("transform", null)
            .style("fill", function(d) {
            if (sankey.columnCategory(d.column) == "gnat")
                return "gray";
        })
            .text(function(d) {
            if (sankey.columnCategory(d.column) == "gnat") {
                d.valueTrue = d.value / SCALE;
                return d.valueTrue.toFixed(Math.log10(SCALE)) + " Mbps";
            }
        })
            .filter(function(d) { return d.x < width / 2; })
            .attr("x", 6 + sankey.nodeWidth())
            .attr("text-anchor", "start");

        /*
   * Labels above bars
   */
        node.append("text")
            .attr("fill", function(d) {
            if (sankey.columnCategory(d.column) == "wan") {
                return "red";
            } else if (sankey.columnCategory(d.column) == "network") {
                return "slateblue";
            } else if (sankey.columnCategory(d.column) == "gnat") {
                return "gray";
            } else if (sankey.columnCategory(d.column) == "bondingServer") {
                return "gray";
            }
        })
            .attr("x", 6)
            .attr("y", -6)
            .attr("text-anchor", "middle")
            .text(function(d) {
            if ((sankey.columnCategory(d.column) == "wan") ||
                (sankey.columnCategory(d.column) == "network")) {
                return d.label;
            } else if ((sankey.columnCategory(d.column) == "gnat") ||
                       (sankey.columnCategory(d.column) == "bondingServer")) {
                return d.name;
            }
        })

        /*
   * Node names (index and IP info) for source and destination nodes
   */
        node.append("text")
            .attr("y", -2)
            .attr("font-size", "10px")
            .attr("font-family", "sans-serif")
            .attr("text-anchor", "start")
            .text(function(d) {
            if ((sankey.columnCategory(d.column) == "src") ||
                (sankey.columnCategory(d.column) == "dst")) {
                return d.name;
            }})
            .filter(function(d) { return d.x > width / 2; })
            .attr("text-anchor", "end")
            .attr("x", 20)

        /*
   * Throughput values for all nodes (over the bars)
   */
        /*
  node.append("text")
      .attr("x", 8)
      .attr("y", function(d) { return d.dy / 2})
      .attr("text-anchor", "middle")
      .attr("font-size", "9px")
      .attr("font-family", "sans-serif")
      .attr("font-weight", "bold")
      .attr("fill", "darkblue")
          .text(function(d) {
                d.valueTrue = d.value / SCALE;
                return d.valueTrue.toFixed(1)
          })
  */

        var linkExtent = d3.extent(energy.links, function (d) {return d.value});

        var frequencyScale = d3.scale.linear().domain(linkExtent).range([10,110]);
        var particleSize = d3.scale.linear().domain(linkExtent).range([1,5]);

        energy.links.forEach(function (link) {
            link.freq = frequencyScale(link.value);
            //  link.particleSize = particleSize(link.value);
            link.particleSize = 2;

            link.particleColor = d3.scale.linear().domain([1,1000]).range([link.source.color, link.target.color]);
        })

        var particles = [];
        var freqCounter = 1;

        var timer = d3.timer(tick);

        d3.timeout(() => timer.stop(), delay);

        var mywidth = width,
            myheight = height;

        function tick(elapsed, time) {

            particles = particles.filter(function (d) {return d.time > (elapsed - 1000)});

            if (freqCounter > 100) {
                freqCounter = 1;
            }

            d3.selectAll("path.link")
                .each(
                function (d) {
                    if (d.freq >= freqCounter) {
                        var offset = (Math.random() - .5) * d.dy;
                        particles.push({link: d, time: elapsed, offset: offset, path: this})
                    }
                });

            //Stop the current callback if the width or height is detected to be changed
            if ((mywidth != width) || (myheight != height))
                return;

            particleEdgeCanvasPath(elapsed);
            freqCounter++;

        }

        function particleEdgeCanvasPath(elapsed) {
            var context = d3.select("canvas").node().getContext("2d")

            //Stop the current callback if the width or height is detected to be changed
            if ((mywidth != width) || (myheight != height))
                return;

            context.clearRect(0,0,4000,4000);

            context.fillStyle = "gray";
            context.lineWidth = "1px";
            for (var x in particles) {
                // Stop the current callback if the width or height is detected
                // to be changed
                if ((mywidth != width) || (myheight != height))
                    return;

                var currentTime = elapsed - particles[x].time;
                var currentPercent = currentTime / 1000 * particles[x].path.getTotalLength();
                var currentPos = particles[x].path.getPointAtLength(currentPercent)
                context.beginPath();
                context.fillStyle = particles[x].link.particleColor(currentTime);
                context.arc(currentPos.x - 8,currentPos.y - 8 + particles[x].offset,particles[x].link.particleSize,0,2*Math.PI);
                context.fill();
            }
        }
    }




    /*******************************************************************************/
    /*******************************************************************************/
    /*
 * Convert input JSON into JSON object needed by d3 sankey animation module
 */
    /*******************************************************************************/
    /*******************************************************************************/

    function convertJson(inputJson) {

        var outputJson = new Object();
        var nodes = [];
        var links = [];
        var wans = [];
        var networks = [];

        var raw = inputJson.outFlowTraffic;
        console.log(raw);
        /*
         * Do NOT include 0-value links.
         * They will break the animation.
         * Extremely small values may also cause display issues.
         * Allow only values greater than or equal to THROUGHPUT_THRESHOLD.
         */
        var outFlowTraffic = raw.filter
        (flow => flow.sendRate20s >= THROUGHPUT_THRESHOLD);
        /*I think this is a value */
        var totalFlows = Math.min(DISPLAY_NUM, outFlowTraffic.length);
        /*I think this is a value */
        if (totalFlows == 0)
            return outputJson;

        outFlowTraffic.sort(sortThroughput);
        outFlowTraffic.length = totalFlows;
        outFlowTraffic.sort(sortIndex);

        var wanNumFlows = [totalFlows, totalFlows, totalFlows];
        /*I think this is one*/
        nodesCreate(nodes, outFlowTraffic, totalFlows);
        linksCreate(links, outFlowTraffic, totalFlows, wanNumFlows);

        wansCreate(wans, wanNumFlows);
        networksCreate(networks, WAN_NETWORKS);

        // Use this instead of the above line
        // IFF "softflows" array is included in the JSON input
        //      networksCreate(networks, inputJson.softflows);

        /*nodes links*/
        outputJson.nodes = nodes;
        outputJson.links = links;
        outputJson.wans = wans;
        outputJson.networks = networks;

        return outputJson;
    }

    function nodesCreate(nodes, outFlowTraffic, totalFlows)
    {
        var removeFlow = 0;

        for (i=0; i<totalFlows; i++) {
            newNode(nodes, outFlowTraffic[i].index + " (" +
                    outFlowTraffic[i].srcIP + ":" +
                    outFlowTraffic[i].srcPort + ")");
        }

        newNode(nodes, GNAT);

        for (k=0; k<2; k++) {
            for (j=0; j<MAX_WANS; j++) {
                for (i=0; i<totalFlows; i++) {
                    if (isWanSoftflowNode(outFlowTraffic[i],j)) {
                        newNode(nodes, outFlowTraffic[i].index);
                    }
                }
            }
        }

        newNode(nodes, BONDING_SERVER);

        for (i=0; i<totalFlows; i++) {
            newNode(nodes, outFlowTraffic[i].index + " (" +
                    outFlowTraffic[i].dstIP + ":" +
                    outFlowTraffic[i].dstPort + ")");
        }
    }

    function linksCreate(links, outFlowTraffic, totalFlows, wanNumFlows)
    {
        var subFlowArray = new Array(MAX_SUBFLOWS).fill(0);
        var gnat = totalFlows;
        var ratio;

        /* Source IP to GNAT */
        for (i=0; i<totalFlows; i++)
            newLink(links, i, gnat, outFlowTraffic[i].sendRate20s);

        subFlowNodeCnt = gnat + 1;
        k = 0;

        /* GNAT to WAN  */
        for (j=0; j<MAX_WANS; j++) {
            for (i=0; i<totalFlows; i++) {
                if ((ratio = isWanSoftflowNode(outFlowTraffic[i],j))) {
                    subFlowArray[k] = ratio * PERCENT *
                        outFlowTraffic[i].sendRate20s;

                    newLink(links, gnat, subFlowNodeCnt++,
                            subFlowArray[k]);
                    k++;
                } else {
                    wanNumFlows[j] = wanNumFlows[j] - 1;
                }
            }
        }

        /* WAN to Network  */
        for (k=0,i=gnat + 1; i<subFlowNodeCnt; k++,i++)
            newLink(links, i, subFlowNodeCnt + k, subFlowArray[k]);

        /* Network to Bonding Server */
        bondingServer = subFlowNodeCnt + k;
        k = 0;
        for (k=0,i=totalFlows + 1; i<subFlowNodeCnt; k++,i++) {
            newLink(links, subFlowNodeCnt + k, bondingServer,
                    subFlowArray[k]);
        }

        /* Bonding Server to Destination IP */
        for (i=0; i<totalFlows; i++) {
            newLink(links, bondingServer,
                    bondingServer + 1 + i,
                    outFlowTraffic[i].sendRate20s);
        }
    }

    function wansCreate(wans, wanNumFlows)
    {
        for (i=0; i<MAX_WANS; i++)
            newWan(wans, wanNumFlows[i]);
    }

    function networksCreate(networks, wanNetwork)
    {
        for (i=0; i<MAX_WANS; i++)
            newNetwork(networks, wanNetwork[i]);
    }

    function newNode(nodes, value)
    {
        var entry = new Object();

        entry.name = value.toString();
        nodes.push(entry);
    }

    function newLink(links, source, target, value)
    {
        var entry = new Object();

        var valueScaled = value * SCALE;

        entry.source = source;
        entry.target = target;
        entry.valueTrue = parseFloat(value.toFixed(Math.log10(SCALE)));

        /*
         * Pass scaled value for Sankey processing.
         * This fixes display problems when values are < 0 (due to rounding).
         * In the final animation, display text will use valueTrue values.
         */
        entry.value = parseFloat(valueScaled.toFixed(Math.log10(SCALE)));

        links.push(entry);
    }

    function newWan(wans, value)
    {
        var entry = new Object();

        entry.flows = value;
        wans.push(entry);
    }

    function newNetwork(networks, value)
    {
        var entry = new Object();

        entry.name = value;
        networks.push(entry);
    }

    function isWanSoftflowNode(flow, j)
    {
        var ratio;

        if (BONDING_MODE_FORCE) {
            if ((flow["LBmode"] != BONDING_MODE) && (flow["wanNum"] == j))
                return (1 * PERCENTAGE);

            if (((flow["LBmode"] == BONDING_MODE) || BONDING_MODE_FORCE) &&
                ((ratio = flow["bondingRatio"][j]) > 0)) {
                return (ratio);
            }

            return;
        }

        if ((flow["LBmode"] == BONDING_MODE) &&
            ((ratio = flow["bondingRatio"][j]) > 0)) {
            return (ratio);
        }

        if ((flow["LBmode"] != BONDING_MODE) && (flow["wanNum"] == j))
            return (1 * PERCENTAGE);

        if (VERBOSE)
            console.log("isWanSoftflowNode(): returning 0\n");

        return (0);
    }

    function sortThroughput(a, b)
    {
        if (a.sendRate20s == b.sendRate20s)
            return 0;

        if (a.sendRate20s < b.sendRate20s)
            return 1;

        return -1;
    }

    function sortIndex(a, b)
    {
        var a = a.index * 1;
        var b = b.index * 1;

        if (a == b)
            return 0;

        if (a > b)
            return 1;

        return -1;
    }

    /*******************************************************************************/
    /*******************************************************************************/

</script>    
    
 
</body>
</html>
