//This file contains the javascript that calls the link status animation. I believe this is just cosmetic. 
//GOJS GNAT topology and link status
    function initx() {
      var $ = go.GraphObject.make;
      myDiagram = $(go.Diagram, "GNATconnection");

      // define all of the gradient brushes
      var graygrad = $(go.Brush, "Linear", { 0: "#F5F5F5", 1: "#F1F1F1" });
      var bluegrad = $(go.Brush, "Linear", { 0: "#CDDAF0", 1: "#91ADDD" });
      var yellowgrad = $(go.Brush, "Linear", { 0: "#FEC901", 1: "#FEA200" });
      var lavgrad = $(go.Brush, "Linear", { 0: "#EF9EFA", 1: "#A570AD" });


      myDiagram.nodeTemplate =
        $(go.Node, "Auto",
          { fromSpot: go.Spot.RightSide,  // coming out from right side
            toSpot: go.Spot.LeftSide },   // going into at left side
          { isShadowed: true },
          // define the node's outer shape
          $(go.Shape, "RoundedRectangle",
            { fill: graygrad, stroke: "#D8D8D8" },  // default fill is gray
            new go.Binding("fill", "color")),
          // define the node's text
          $(go.TextBlock,
            { margin: 10, font: "bold 14px Helvetica, bold Arial, sans-serif" },
            new go.Binding("text", "key"))
        );


      myDiagram.layout =
        $(go.LayeredDigraphLayout,
          {
            direction: 0,
            layerSpacing: 120,
            columnSpacing: 35,
            setsPortSpots: false,
            layeringOption: go.LayeredDigraphLayout.LayerOptimalLinkLength
          }
        );


      // replace the default Link template in the linkTemplateMap
      myDiagram.linkTemplate =
        $(go.Link,  // the whole link panel
          // path animation works with these kinds of links too:
          //{ routing: go.Link.AvoidsNodes },
          //{ curve: go.Link.Bezier },
          $(go.Shape,  // the link shape
            //{ stroke: "black" }
            {strokeWidth: 7},
              new go.Binding("stroke",  "color", function(c) {
            if (c == 0) return "red";
            if (c == 1) return "lightgreen";
          })
        )
          //$(go.Shape,  // the arrowhead
          //{ toArrow: "standard", stroke: null }),
        );

      myDiagram.model = new go.GraphLinksModel(
          [
            {key: "User", color: bluegrad},
            {key: "LAN", color: bluegrad},
            {key: "WAN_1", color: yellowgrad},
            {key: "WAN_2", color: yellowgrad},
            {key: "WAN_3", color: yellowgrad},
            {key: "Softflow_1", color: lavgrad},
            {key: "Softflow_2", color: lavgrad},
            {key: "Softflow_3", color: lavgrad},
            {key: "Bonding_Server", color: graygrad}
          ],[
          { from: "User", to: "LAN", color: 1 },
          { from: "LAN", to: "WAN_1", color: 1 },
          { from: "LAN", to: "WAN_2", color: 1},
          { from: "LAN", to: "WAN_3", color: 1},
          { from: "WAN_1", to: "Softflow_1", color: 1},
          { from: "WAN_2", to: "Softflow_2", color: 1},
          { from: "WAN_3", to: "Softflow_3", color: 1},
          { from: "Softflow_1", to: "Bonding_Server", color: 1},
          { from: "Softflow_2", to: "Bonding_Server", color: 1},
          { from: "Softflow_3", to: "Bonding_Server", color: 1},
        ]);

      myDiagram.undoManager.isEnabled = true;

// this post id drives the example data
} //cloeses the initx function