@extends('layouts.GNAT')

@section('content')
<!-- page content -->
        
<!-- top tiles: this is the upper portion before the cards -->
           <div class=""> <!-- This defines the title  -->

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1>GNAT Network Topology and Link Status</h1>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- Closes the title  -->


 <!-- This is the Connection Status Animation-->  
         <div class="row" > <!-- row with the main content-->
           <div class="col-md-12 col-sm-12">
              <div id="GNATconnection" style="background-color: whitesmoke; border: solid 1px black; width: 100%; height: 350px"></div>
            </div>
         </div><!-- row with the main content-->
         
            

            
<div class="clearfix"></div>
<br />

      <!-- /top tiles -->

<!-- Defines the main content with columns and the cards -->   
<div class="row"> <!--This is the first row with 3 cards for DownLink Data -->

              <div class="col-md-8 col-sm-12"> <!-- defines the column for the first card-->
                <div class="x_panel">
                  <div class="x_title"> <!-- sets up the top menu of the card -->
                    <h2>Average Down Link Data Rate (Kbps)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                 </div> <!-- sets up the top menu of the card -->
                    
                 <!-- content of the card -->  
                    <div class="x_content">
                      <canvas id="lineChartAvgDLDataRate"></canvas>
                    </div>
                <!-- content of the card -->   
                    
           </div>
        </div> <!-- closes the column for card 1-->


              <div class="col-md-4 col-sm-12"> <!-- This colum contains two cards-->
                <div class="row"> <!-- row with second card-->
                  <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                      <div class="x_title">  <!-- sets up the top menu of the card -->
                         <h2>Average Down Link Data Rate (Kbps)</h2>
                         <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Settings 1</a>
                                  <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>   <!-- sets up the top menu of the card -->
                      
                            <!-- content of the card -->
                              <div class="x_content">
                               <canvas id="pieChartAvgDLDataRate"></canvas>
                              </div>
                            <!-- content of the card -->
                        
                    </div>
                  </div>
                </div> <!-- closes row with second card-->

              <div class="row"> <!-- rpw with thrid card-->
                <div class="col-md-12 col-sm-12">
                  <div class="x_panel">
                    <div class="x_title">  <!-- sets up the top menu of the card -->
                      <h2>Total Average Down Link Data Rate (Kbps)</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div> <!-- sets up the top menu of the card -->
                      
                            <!-- content of the card -->
                                <div class="x_content">
                                    <canvas id="lineChartTotalAvgDLDataRate"></canvas>
                                </div>
                            <!-- content of the card -->
                      
               </div>
            </div>
        </div> <!-- closes row with third card-->
    </div> <!-- closes the column -->  
    
</div> <!-- Closes the first row -->  
<div class="clearfix"></div>
<br />



<div class="row"> <!--This is the second row with 3 cards for UpLink Data -->

              <div class="col-md-8 col-sm-12"> <!-- defines the column for the first card-->
                <div class="x_panel">
                  <div class="x_title"> <!-- sets up the top menu of the card -->
                    <h2>Average Up Link Data Rate (Kbps)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>                      
                 </div> <!-- sets up the top menu of the card -->
                    
                         <!-- content of the card -->
                            <div class="x_content">
                                <canvas id="lineChartAvgULDataRate"></canvas>
                            </div>
                         <!-- content of the card -->
                    
               </div>
             </div> <!-- colses the column for the first card-->



              <div class="col-md-4 col-sm-12">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                      <div class="x_title">
                         <h2>Average Up Link Data Rate (Kbps)</h2>
                         <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Settings 1</a>
                                  <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                         <canvas id="pieChartAvgULDataRate"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Total Average Up Link Data Rate (Kbps)</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <canvas id="lineChartTotalAvgULDelay"></canvas>
                  </div>
               </div>
            </div>
        </div>

    </div>
    
</div>  <!-- Closes the second row -->  
<div class="clearfix"></div>
<br />




<div class="row"> <!--This is the third row with 3 cards for Delay Data -->

              <div class="col-md-8 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Average Delay Rate (ms)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                 </div>
                    <div class="x_content">
                      <canvas id="lineChartAvgDelayRate"></canvas>
                    </div>
               </div>
             </div>



              <div class="col-md-4 col-sm-12">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                      <div class="x_title">
                         <h2>Average Delay Rate (ms)</h2>
                         <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Settings 1</a>
                                  <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                         <canvas id="pieChartAvgDelayDataRate"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Average of Average Delay Rate (ms)</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                      
                      <!-- content of the card -->
                        <div class="x_content">
                            <canvas id="lineChartTotalAvgDelayRate"></canvas>
                        </div>
                      <!-- content of the card -->
                      
               </div>
            </div>
        </div>
    </div>

</div> <!-- closed the third row-->
<div class="clearfix"></div>
<br />


          

          
          
<!------------------------------------------------------------- IFT js --------------------------------------------------------------------------------------------------->
<script>

const HOSTADDRESS = "http://"+window.location.hostname+":8080/?getStatistics";
var delay = 2000;

var Statistics_QoS; //variable used for the data collected from the GNAT hardware

    
    
    
//getStatisticsX this function gets json data from the hardwar and assigns in to Statics_QoS////////////////////////////////////////////////////////////////////////////// 
function getStatisticsX() { //this function is called by the process function below to do the updates

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (!((this.readyState == 4) && (this.status == 200))) {
      console.log("getStatisticsX(): returning: this.readyState: " +
                   this.readyState + "; this.status: " + this.status + "\n");
      return;
    } // a check in the console 
    Statistics_QoS = JSON.parse(this.responseText); //This assigns the parsed data to the var
    getData(Statistics_QoS); //This gets the data: JavaScript method getData is used to get data in the specified format from the clipboard 
  }

  //automatically get the IP address
  var hostAddress = HOSTADDRESS;
  xhttp.open("GET", hostAddress, true);
  xhttp.send(null);
} //close of getStatisticsX function 


    
    
    
    
//GOJS GNAT topology and link status////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
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
}    
 
//Close Animation Chart ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    
    
///Chart updates//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    

// ???? function name???? function to get new data poor naming since getData is also a JS method... I don't see where this is called anywhere in the page.
var getData = function(statValues) {


//?setting the a time coordinate to collected data (?) I think we should be collecting this via Statistics_QoS?
        var today = new Date();
        //var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var time = today.getMinutes() + ":" + today.getSeconds(); // time is the variable used to push the updates of the x-axis on the line charts
  
 
    
    
//pushing the collected Statistics_QoS to the appropiate charts//////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    
//////////////////Downlink Related Charts///////////////////////////////////////////////////////////////////////////////////////     
    
    //lineChartAvgDLDataRate
    lineChartAvgDLDataRate.data.labels.push(time); 
    lineChartAvgDLDataRate.data.datasets[0].data.push(statValues.avgDLDataRate[0]);
    lineChartAvgDLDataRate.data.datasets[1].data.push(statValues.avgDLDataRate[1]);
    lineChartAvgDLDataRate.data.datasets[2].data.push(statValues.avgDLDataRate[2]);
        var dataLength = 20;
        if (lineChartAvgDLDataRate.data.datasets[0].data.length > dataLength) {
                lineChartAvgDLDataRate.data.labels.shift();
                lineChartAvgDLDataRate.data.datasets[0].data.shift();
                lineChartAvgDLDataRate.data.datasets[1].data.shift();
                lineChartAvgDLDataRate.data.datasets[2].data.shift();
        }
  
    
    //pieChartAvgDLDataRate
        pieChartAvgDLDataRate.data.datasets[0].data.shift();
        pieChartAvgDLDataRate.data.datasets[0].data.shift();
        pieChartAvgDLDataRate.data.datasets[0].data.shift();
        pieChartAvgDLDataRate.data.datasets[0].data.push(statValues.avgDLDataRate[0]);
        pieChartAvgDLDataRate.data.datasets[0].data.push(statValues.avgDLDataRate[1]);
        pieChartAvgDLDataRate.data.datasets[0].data.push(statValues.avgDLDataRate[2]);
    
     
    
    //lineChartTotalAvgDLDataRate
        lineChartTotalAvgDLDataRate.data.labels.push(time);
        lineChartTotalAvgDLDataRate.data.datasets[0].data.push((statValues.avgDLDataRate[0]+statValues.avgDLDataRate[1]+statValues.avgDLDataRate[2])/3);
        if (lineChartTotalAvgDLDataRate.data.datasets[0].data.length > dataLength) {
                lineChartTotalAvgDLDataRate.data.labels.shift();
                lineChartTotalAvgDLDataRate.data.datasets[0].data.shift();
        }


    
//////////////////Uplink Related Charts///////////////////////////////////////////////////////////////////////////////////////    
    
    //lineChartAvgULDataRate
        lineChartAvgULDataRate.data.labels.push(time);
        lineChartAvgULDataRate.data.datasets[0].data.push(statValues.avgULDataRate[0]);
        lineChartAvgULDataRate.data.datasets[1].data.push(statValues.avgULDataRate[1]);
        lineChartAvgULDataRate.data.datasets[2].data.push(statValues.avgULDataRate[2]);
        if (lineChartAvgULDataRate.data.datasets[0].data.length > dataLength) {
        lineChartAvgULDataRate.data.labels.shift();
        lineChartAvgULDataRate.data.datasets[0].data.shift();
        lineChartAvgULDataRate.data.datasets[1].data.shift();
        lineChartAvgULDataRate.data.datasets[2].data.shift();
        }
 
    
    //pieChartAvgULDataRate
        pieChartAvgULDataRate.data.datasets[0].data.shift();
        pieChartAvgULDataRate.data.datasets[0].data.shift();
        pieChartAvgULDataRate.data.datasets[0].data.shift();
        pieChartAvgULDataRate.data.datasets[0].data.push(statValues.avgULDataRate[0]);
        pieChartAvgULDataRate.data.datasets[0].data.push(statValues.avgULDataRate[1]);
        pieChartAvgULDataRate.data.datasets[0].data.push(statValues.avgULDataRate[2]);

    //lineChartTotalAvgULDelay
        lineChartTotalAvgULDelay.data.labels.push(time);
        lineChartTotalAvgULDelay.data.datasets[0].data.push((statValues.avgULDataRate[0]+statValues.avgULDataRate[1]+statValues.avgULDataRate[2])/3);
        if (lineChartTotalAvgULDelay.data.datasets[0].data.length > dataLength) {
                lineChartTotalAvgULDelay.data.labels.shift();
                lineChartTotalAvgULDelay.data.datasets[0].data.shift();
        }


    
////////////////////////Delay Related Charts//////////////////////////////////////////////////////////////////////////////////////     
    
    //lineChartAvgDelayRate 
        lineChartAvgDelayRate.data.labels.push(time);
        lineChartAvgDelayRate.data.datasets[0].data.push(statValues.avgULDelay[0]);
        lineChartAvgDelayRate.data.datasets[1].data.push(statValues.avgULDelay[1]);
        lineChartAvgDelayRate.data.datasets[2].data.push(statValues.avgULDelay[2]);
        if (lineChartAvgDelayRate.data.datasets[0].data.length > dataLength) {
                lineChartAvgDelayRate.data.labels.shift();
                lineChartAvgDelayRate.data.datasets[0].data.shift();
                lineChartAvgDelayRate.data.datasets[1].data.shift();
                lineChartAvgDelayRate.data.datasets[2].data.shift();
        }
    
   
    //pieChartAvgDelayDataRate
        pieChartAvgDelayDataRate.data.datasets[0].data.shift();
        pieChartAvgDelayDataRate.data.datasets[0].data.shift();
        pieChartAvgDelayDataRate.data.datasets[0].data.shift();
        pieChartAvgDelayDataRate.data.datasets[0].data.push(statValues.avgULDelay[0]);
        pieChartAvgDelayDataRate.data.datasets[0].data.push(statValues.avgULDelay[1]);
        pieChartAvgDelayDataRate.data.datasets[0].data.push(statValues.avgULDelay[2]);
    


    //lineChartTotalAvgDelayRate
        lineChartTotalAvgDelayRate.data.labels.push(time);
        lineChartTotalAvgDelayRate.data.datasets[0].data.push((statValues.avgULDelay[0]+statValues.avgULDelay[1]+statValues.avgULDelay[2])/3);
        if (lineChartTotalAvgDelayRate.data.datasets[0].data.length > dataLength) {
                lineChartTotalAvgDelayRate.data.labels.shift();
                lineChartTotalAvgDelayRate.data.datasets[0].data.shift();
        }

    

    
///////////////// re-render the charts/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//This command updates the chart: Should be one for every chart
        lineChartAvgDLDataRate.update();
        pieChartAvgDLDataRate.update();
        lineChartTotalAvgDLDataRate.update();
    
        lineChartAvgULDataRate.update();
        pieChartAvgULDataRate.update();
        lineChartTotalAvgULDelay.update();
    
        lineChartAvgDelayRate.update();
        pieChartAvgDelayDataRate.update();
        lineChartTotalAvgDelayRate.update();


    
    
 //Related to the packet flow animation////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
      //update link color for GNAT topology
      WAN_1_Status = statValues.connStatus[0];
      WAN_2_Status = statValues.connStatus[1];
      WAN_3_Status = statValues.connStatus[2];
      WAN_4_Status = statValues.connStatus[3];
      WAN_5_Status = statValues.connStatus[4];
      WAN_6_Status = statValues.connStatus[5];

      if (WAN_1_Status == 0){
        var linkx = {from: "WAN_1"};
        var link1 = myDiagram.findLinksByExample(linkx).first();
        if (link1 !== null) myDiagram.model.setDataProperty(link1.data, "color", 0);
        }
        else if (WAN_1_Status == 1){
                var linkx = {from: "WAN_1"};
                var link1 = myDiagram.findLinksByExample(linkx).first();
                if (link1 !== null) myDiagram.model.setDataProperty(link1.data, "color", 1);
                }

      if (WAN_2_Status == 0){
        var linky = {from: "WAN_2"};
        var link2 = myDiagram.findLinksByExample(linky).first();
        if (link2 !== null) myDiagram.model.setDataProperty(link2.data, "color", 0);
        }
        else if (WAN_2_Status == 1){
                var linky = {from: "WAN_2"};
                var link2 = myDiagram.findLinksByExample(linky).first();
                if (link2 !== null) myDiagram.model.setDataProperty(link2.data, "color", 1);
                }

      if (WAN_3_Status == 0){
        var linkz = {from: "WAN_3"};
        var link3 = myDiagram.findLinksByExample(linkz).first();
        if (link3 !== null) myDiagram.model.setDataProperty(link3.data, "color", 0);
        }
        else if (WAN_3_Status == 1){
                var linkz = {from: "WAN_3"};
                var link3 = myDiagram.findLinksByExample(linkz).first();
                if (link3 !== null) myDiagram.model.setDataProperty(link3.data, "color", 1);
                }

        if (WAN_4_Status == 0){
        var linkx = {from: "WAN_1"};
        var link1 = myDiagram.findLinksByExample(linkx).first();
        if (link1 !== null) myDiagram.model.setDataProperty(link1.data, "color", 0);
        }
        else if (WAN_4_Status == 1){
                var linkx = {from: "WAN_1"};
                var link1 = myDiagram.findLinksByExample(linkx).first();
                if (link1 !== null) myDiagram.model.setDataProperty(link1.data, "color", 1);
                }

        if (WAN_5_Status == 0){
        var linky = {from: "WAN_2"};
        var link2 = myDiagram.findLinksByExample(linky).first();
        if (link2 !== null) myDiagram.model.setDataProperty(link2.data, "color", 0);
        }
        else if (WAN_5_Status == 1){
                var linky = {from: "WAN_2"};
                var link2 = myDiagram.findLinksByExample(linky).first();
                if (link2 !== null) myDiagram.model.setDataProperty(link2.data, "color", 1);
                }

      if (WAN_6_Status == 0){
        var linkz = {from: "WAN_3"};
        var link3 = myDiagram.findLinksByExample(linkz).first();
        if (link3 !== null) myDiagram.model.setDataProperty(link3.data, "color", 0);
        }
        else if (WAN_6_Status == 1){
                var linkz = {from: "WAN_3"};
                var link3 = myDiagram.findLinksByExample(linkz).first();
                if (link3 !== null) myDiagram.model.setDataProperty(link3.data, "color", 1);
                }

//end of packet flow animation///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    

}; //end of getData
    
    
    
// get new data and update charts every "delay" seconds: updates the data for real-time data//////////////////////////////////////////////////////////////////
function process() {
        getStatisticsX(); //getStatisticsX this function gets json data from the hardwar and assigns in to Statics_QoS 
        setTimeout(process, delay);
}
//This calls the function and update the charts
process();
 
    
</script>
<!------------------------------------------------------------- IFT js --------------------------------------------------------------------------------------------------->


            
     <!-- close page content -->

     
      
<!-- IFT Script for connection animation-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gojs/2.1.2/go-debug.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.2/Chart.min.js"></script>

      
      <!-- IFT Custom Script --> 
   <script src="build/js/GNATChartsREALTIMEupdateINLINE.js"></script> <!-- javascript written for the realtime -->
     <!-- IFT Custom Script -->  
@endsection
