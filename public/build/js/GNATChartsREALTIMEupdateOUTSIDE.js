//This is the javascript file for updating realtime data using inline javascript using only this script. This code is the same as what is in the INLINE file. If referenced properly this should work and be the better implmentation.
//First we create the series of inital charts using the Charts.js library. For the real-time data line charts should all read 0 and pie charts should all read 1
//The same goes for the labels. 
//This will create 9 charts total: 3 related to Uplink data, 3 related to downlink data, and 3 related to delay data
//each category has a line chart, a pie chart, and a average line chart.


//First step creating the chart from the Charts.js library///////////////////////////////////////////////////////////////////////////////////////////////////
////Downlink related Charts////////////////////////////////////////////////////////
// create initial empty lineChart using the Chart.js library called lineChartAvgDLDataRate
                          var ctd1 = document.getElementById("lineChartAvgDLDataRate");
                          var lineChartAvgDLDataRate = new Chart(ctd1, {
                                type: 'line',
                                data: {
                                  labels: [],
                                  datasets: [{
                                        label: "WAN_1",
                                        backgroundColor: "rgba(200, 0, 0, 0.31)",
                                        borderColor: "rgba(200, 10, 10, 0.7)",
                                        pointBorderColor: "rgba(200, 20, 20, 0.7)",
                                        pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }, {
                                        label: "WAN_2",
                                        backgroundColor: "rgba(0, 200, 0, 0.31)",
                                        borderColor: "rgba(10, 200, 10, 0.7)",
                                        pointBorderColor: "rgba(20, 200, 20, 0.7)",
                                        pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                                        pointHoverBackgroundColor: "#888",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }, {
                                        label: "WAN_3",
                                        backgroundColor: "rgba(0, 0, 200, 0.31)",
                                        borderColor: "rgba(10, 10, 200, 0.7)",
                                        pointBorderColor: "rgba(20, 20, 200, 0.7)",
                                        pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                                        pointHoverBackgroundColor: "#111",
                                        pointHoverBorderColor: "rgba(40,40,200,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }]
                                }, //closes data
                              
                                 // Configuration options go here
                                options: {
                                    animation: {
                                     easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                                     duration: 450 // general animation time
                                    },
                                },
                          });




// create initial empty pieChart using the Charts.js library called pieChartAvgDLDataRate
                          var ptd1 = document.getElementById("pieChartAvgDLDataRate");
                          var pieChartAvgDLDataRate = new Chart(ptd1, {
                                type: 'pie',
                                data: {
                                  //labels: [],
                                  datasets: [{
                                        data: [1, 1, 1],
                                        backgroundColor: [
                                                "#f00",
                                                "#0f0",
                                                "#00f"
                                        ],
                                        label: 'My dataset' // for legend
                                  }],
                                  labels: [
                                        "WAN_1",
                                        "WAN_2",
                                        "WAN_3"
                                  ]
                                }, //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     duration: 0 // general animation time
                                    },
                                },
                              
                          });



// create initial empty lineChart using the Charts.js library called lineChartTotalAvgDLDataRate
                          var ctd11 = document.getElementById("lineChartTotalAvgDLDataRate");
                          var lineChartTotalAvgDLDataRate = new Chart(ctd11, {
                                type: 'line',
                                data: {
                                  labels: [],
                                  datasets: [{
                                        label: "Total DL data rate",
                                        backgroundColor: "rgba(200, 0, 0, 0.31)",
                                        borderColor: "rgba(200, 10, 10, 0.7)",
                                        pointBorderColor: "rgba(200, 20, 20, 0.7)",
                                        pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }]
                                }, //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                                     duration: 450 // general animation time
                                    },
                                },
                          });


////Uplink related Charts////////////////////////////////////////////////////////
// create initial empty lineChart from the Chart. js library called lineChartAvgULDataRate
                          var ctd2 = document.getElementById("lineChartAvgULDataRate");
                          var lineChartAvgULDataRate = new Chart(ctd2, {
                                type: 'line',
                                data: {
                                  labels: [],
                                  datasets: [{
                                        label: "WAN_1",
                                        backgroundColor: "rgba(58, 123, 136, 0.31)",
                                        borderColor: "rgba(58, 128, 141, 0.7)",
                                        pointBorderColor: "rgba(58, 133, 146, 0.7)",
                                        pointBackgroundColor: "rgba(58, 138, 151, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }, {
                                        label: "WAN_2",
                                        backgroundColor: "rgba(0, 200, 0, 0.31)",
                                        borderColor: "rgba(10, 200, 10, 0.7)",
                                        pointBorderColor: "rgba(20, 200, 20, 0.7)",
                                        pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                                        pointHoverBackgroundColor: "#888",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }, {
                                        label: "WAN_3",
                                        backgroundColor: "rgba(0, 0, 200, 0.31)",
                                        borderColor: "rgba(10, 10, 200, 0.7)",
                                        pointBorderColor: "rgba(20, 20, 200, 0.7)",
                                        pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                                        pointHoverBackgroundColor: "#111",
                                        pointHoverBorderColor: "rgba(40,40,200,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }]
                                }, //closes data
                              
                                 // Configuration options go here
                                options: {
                                    animation: {
                                     easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                                     duration: 450 // general animation time
                                    },
                                }, 
                          
                          });


// create initial empty pieChart from Chart.js library called pieChartAvgULDataRate
                          var ptd2 = document.getElementById("pieChartAvgULDataRate");
                          var pieChartAvgULDataRate = new Chart(ptd2, {
                                type: 'pie',
                                data: {
                                  //labels: [],
                                  datasets: [{
                                        data: [1, 1, 1],
                                        backgroundColor: [
                                                "#f00",
                                                "#0f0",
                                                "#00f"
                                        ],
                                        label: 'My dataset' // for legend
                                  }],
                                  labels: [
                                        "WAN_1",
                                        "WAN_2",
                                        "WAN_3"
                                  ]
                                }, //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     duration: 0 // general animation time
                                    },
                                },
                          });

// create initial empty lineChart using the Chart.js library called lineChartTotalAvgULDelay
                          var ctd21 = document.getElementById("lineChartTotalAvgULDelay");
                          var lineChartTotalAvgULDelay = new Chart(ctd21, {
                                type: 'line',
                                data: {
                                  labels: [],
                                  datasets: [{
                                        label: "Total DL data rate",
                                        backgroundColor: "rgba(200, 0, 0, 0.31)",
                                        borderColor: "rgba(200, 10, 10, 0.7)",
                                        pointBorderColor: "rgba(200, 20, 20, 0.7)",
                                        pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }]
                                }, //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                                     duration: 450 // general animation time
                                    },
                                },
                              
                          });


////Delay related Charts////////////////////////////////////////////////////////
    // create initial empty lineChartAvgDelayRate line chart via Charts.js library 
                          var ctd3 = document.getElementById("lineChartAvgDelayRate");
                          var lineChartAvgDelayRate = new Chart(ctd3, {
                                type: 'line',
                                data: {
                                  labels: [],
                                  datasets: [{
                                        label: "WAN_1",
                                        backgroundColor: "rgba(200, 0, 0, 0.31)",
                                        borderColor: "rgba(200, 10, 10, 0.7)",
                                        pointBorderColor: "rgba(200, 20, 20, 0.7)",
                                        pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }, {
                                        label: "WAN_2",
                                        backgroundColor: "rgba(0, 200, 0, 0.31)",
                                        borderColor: "rgba(10, 200, 10, 0.7)",
                                        pointBorderColor: "rgba(20, 200, 20, 0.7)",
                                        pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                                        pointHoverBackgroundColor: "#888",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }, {
                                        label: "WAN_3",
                                        backgroundColor: "rgba(0, 0, 200, 0.31)",
                                        borderColor: "rgba(10, 10, 200, 0.7)",
                                        pointBorderColor: "rgba(20, 20, 200, 0.7)",
                                        pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                                        pointHoverBackgroundColor: "#111",
                                        pointHoverBorderColor: "rgba(40,40,200,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }]
                                },  //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                                     duration: 450 // general animation time
                                    },
                                },
                              
                              
                          });
    



// create initial empty pieChart using the chart.js library called pieChartAvgDelayDataRate
                          var ptd3 = document.getElementById("pieChartAvgDelayDataRate");
                          var pieChartAvgDelayDataRate = new Chart(ptd3, {
                                type: 'pie',
                                data: {
                                  //labels: [],
                                  datasets: [{
                                        data: [1, 1, 1],
                                        backgroundColor: [
                                                "#f00",
                                                "#0f0",
                                                "#00f"
                                        ],
                                        label: 'My dataset' // for legend
                                  }],
                                  labels: [
                                        "WAN_1",
                                        "WAN_2",
                                        "WAN_3"
                                  ]
                                },  //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     duration: 0 // general animation time
                                    },
                                },
                              
                              
                          });




// create initial empty lineChart using the Charts.js library called lineChartTotalAvgDelayRate
                          var ctd31 = document.getElementById("lineChartTotalAvgDelayRate");
                          var lineChartTotalAvgDelayRate = new Chart(ctd31, {
                                type: 'line',
                                data: {
                                  labels: [],
                                  datasets: [{
                                        label: "Total DL data rate",
                                        backgroundColor: "rgba(200, 0, 0, 0.31)",
                                        borderColor: "rgba(200, 10, 10, 0.7)",
                                        pointBorderColor: "rgba(200, 20, 20, 0.7)",
                                        pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [0, 0, 0]
                                  }]
                                },  //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                                     duration: 450 // general animation time
                                    },
                                },
                              
                          });





/////////////This is the second step that collects and pushes the data from the hardware/////////////////////////////////////////////////////////////////////////////////



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
 