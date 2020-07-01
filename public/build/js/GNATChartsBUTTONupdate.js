//This is the javascript file for updating via a button
//First we create the series of inital charts using the Charts.js library. For the button the data arrays are pre-populated. For the real-time data they should all read 0
//The same goes for the labels. It should be empty for the real-time data. Here is it is prepopulated 
//This will create 9 charts total: 3 related to Uplink data, 3 related to downlink data, and 3 related to delay data
//each category has a line chart, a pie chart, and a average line chart.

//First step creating the chart from the Charts.js library///////////////////////////////////////////////////////////////////////////////////////////////////
////Downlink related Charts////////////////////////////////////////////////////////
// create initial empty lineChart using the Chart.js library called lineChartAvgDLDataRate
                          var ctd1 = document.getElementById("lineChartAvgDLDataRate");
                          var lineChartAvgDLDataRate = new Chart(ctd1, {
                                type: 'line',
                                data: {
                                  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                                  datasets: [{
                                        label: "WAN_1",
                                        backgroundColor: "rgba(200, 0, 0, 0.31)",
                                        borderColor: "rgba(200, 10, 10, 0.7)",
                                        pointBorderColor: "rgba(200, 20, 20, 0.7)",
                                        pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [10, 10, 10, 10, 10, 60, 70, 80, 90, 100]
                                  }, {
                                        label: "WAN_2",
                                        backgroundColor: "rgba(0, 200, 0, 0.31)",
                                        borderColor: "rgba(10, 200, 10, 0.7)",
                                        pointBorderColor: "rgba(20, 200, 20, 0.7)",
                                        pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                                        pointHoverBackgroundColor: "#888",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [10, 20, 30, 50, 30, 60, 70, 40, 70, 30]
                                  }, {
                                        label: "WAN_3",
                                        backgroundColor: "rgba(0, 0, 200, 0.31)",
                                        borderColor: "rgba(10, 10, 200, 0.7)",
                                        pointBorderColor: "rgba(20, 20, 200, 0.7)",
                                        pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                                        pointHoverBackgroundColor: "#111",
                                        pointHoverBorderColor: "rgba(40,40,200,1)",
                                        pointBorderWidth: 1,
                                        data: [10, 30, 40, 10, 50, 60, 40, 40, 30, 70]
                                  }]
                                }, //closes data
                              
                                 // Configuration options go here
                                options: {
                                    animation: {
                                     duration: 0 // general animation time
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
                                  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                                  datasets: [{
                                        label: "Total DL data rate",
                                        backgroundColor: "rgba(200, 0, 0, 0.31)",
                                        borderColor: "rgba(200, 10, 10, 0.7)",
                                        pointBorderColor: "rgba(200, 20, 20, 0.7)",
                                        pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [5, 60, 20, 74, 58, 64, 20, 20, 60, 60]
                                  }]
                                }, //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     duration: 0 // general animation time
                                    },
                                },
                          });


////Uplink related Charts////////////////////////////////////////////////////////
// create initial empty lineChart from the Chart. js library called lineChartAvgULDataRate
                          var ctd2 = document.getElementById("lineChartAvgULDataRate");
                          var lineChartAvgULDataRate = new Chart(ctd2, {
                                type: 'line',
                                data: {
                                  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                                  datasets: [{
                                        label: "WAN_1",
                                        backgroundColor: "rgba(58, 123, 136, 0.31)",
                                        borderColor: "rgba(58, 128, 141, 0.7)",
                                        pointBorderColor: "rgba(58, 133, 146, 0.7)",
                                        pointBackgroundColor: "rgba(58, 138, 151, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [10, 5, 0, 20, 60, 8, 63, 92, 64, 1]
                                  }, {
                                        label: "WAN_2",
                                        backgroundColor: "rgba(0, 200, 0, 0.31)",
                                        borderColor: "rgba(10, 200, 10, 0.7)",
                                        pointBorderColor: "rgba(20, 200, 20, 0.7)",
                                        pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                                        pointHoverBackgroundColor: "#888",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [10, 50, 10, 5, 6, 80, 36, 75, 83, 3]
                                  }, {
                                        label: "WAN_3",
                                        backgroundColor: "rgba(0, 0, 200, 0.31)",
                                        borderColor: "rgba(10, 10, 200, 0.7)",
                                        pointBorderColor: "rgba(20, 20, 200, 0.7)",
                                        pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                                        pointHoverBackgroundColor: "#111",
                                        pointHoverBorderColor: "rgba(40,40,200,1)",
                                        pointBorderWidth: 1,
                                        data: [20, 40, 50, 55, 61, 8, 76, 5, 23, 36 ]
                                  }]
                                }, //closes data
                              
                                 // Configuration options go here
                                options: {
                                    animation: {
                                     duration: 0 // general animation time
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
                                  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                                  datasets: [{
                                        label: "Total DL data rate",
                                        backgroundColor: "rgba(200, 0, 0, 0.31)",
                                        borderColor: "rgba(200, 10, 10, 0.7)",
                                        pointBorderColor: "rgba(200, 20, 20, 0.7)",
                                        pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [10, 50, 0, 75, 64, 23, 84, 5, 13, 86]
                                  }]
                                }, //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     duration: 0 // general animation time
                                    },
                                },
                              
                          });


////Delay related Charts////////////////////////////////////////////////////////
    // create initial empty lineChartAvgDelayRate line chart via Charts.js library 
                          var ctd3 = document.getElementById("lineChartAvgDelayRate");
                          var lineChartAvgDelayRate = new Chart(ctd3, {
                                type: 'line',
                                data: {
                                  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                                  datasets: [{
                                        label: "WAN_1",
                                        backgroundColor: "rgba(200, 0, 0, 0.31)",
                                        borderColor: "rgba(200, 10, 10, 0.7)",
                                        pointBorderColor: "rgba(200, 20, 20, 0.7)",
                                        pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [10, 50, 60, 3, 83, 49, 23, 64, 2, 79]
                                  }, {
                                        label: "WAN_2",
                                        backgroundColor: "rgba(0, 200, 0, 0.31)",
                                        borderColor: "rgba(10, 200, 10, 0.7)",
                                        pointBorderColor: "rgba(20, 200, 20, 0.7)",
                                        pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                                        pointHoverBackgroundColor: "#888",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [50, 40, 30, 3, 33, 96, 33, 48, 29, 91]
                                  }, {
                                        label: "WAN_3",
                                        backgroundColor: "rgba(0, 0, 200, 0.31)",
                                        borderColor: "rgba(10, 10, 200, 0.7)",
                                        pointBorderColor: "rgba(20, 20, 200, 0.7)",
                                        pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                                        pointHoverBackgroundColor: "#111",
                                        pointHoverBorderColor: "rgba(40,40,200,1)",
                                        pointBorderWidth: 1,
                                        data: [20, 20, 20, 8, 38, 68, 83, 42, 99, 12]
                                  }]
                                },  //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     duration: 0 // general animation time
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
                                  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                                  datasets: [{
                                        label: "Total DL data rate",
                                        backgroundColor: "rgba(200, 0, 0, 0.31)",
                                        borderColor: "rgba(200, 10, 10, 0.7)",
                                        pointBorderColor: "rgba(200, 20, 20, 0.7)",
                                        pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                                        pointHoverBackgroundColor: "#fff",
                                        pointHoverBorderColor: "rgba(200,40,40,1)",
                                        pointBorderWidth: 1,
                                        data: [10, 10, 10, 67, 90, 5, 75, 23, 32, 60]
                                  }]
                                },  //closes data
                              
                               // Configuration options go here
                                options: {
                                    animation: {
                                     duration: 0 // general animation time
                                    },
                                },
                              
                          });





// This is the second step, a function that pushes data to the charts. In the real time operations there is a previous step of calling the data.
//Here static values are pushed to the charts and updated via a button. 
//In the real-data streaming these values a parsed from a json file and dynamically updated.
function updateChart(){
//////////////////Downlink related Charts//////////////////////////////////////////////////////////////////////////////////// 
//lineChartAvgDLDataRate push adds new data to right        
        lineChartAvgDLDataRate.data.labels.push(5);
        lineChartAvgDLDataRate.data.datasets[0].data.push(20);
        lineChartAvgDLDataRate.data.datasets[1].data.push(60);
        lineChartAvgDLDataRate.data.datasets[2].data.push(30);
    //shift removes left data point
         lineChartAvgDLDataRate.data.labels.shift();
         lineChartAvgDLDataRate.data.datasets[0].data.shift();
         lineChartAvgDLDataRate.data.datasets[1].data.shift();
         lineChartAvgDLDataRate.data.datasets[2].data.shift();
    
//pieChartAvgDLDataRate push adds new data to right
        pieChartAvgDLDataRate.data.datasets[0].data.push(4);
        pieChartAvgDLDataRate.data.datasets[0].data.push(9);
        pieChartAvgDLDataRate.data.datasets[0].data.push(2);
     //shift removes left data point 
        pieChartAvgDLDataRate.data.datasets[0].data.shift();
        pieChartAvgDLDataRate.data.datasets[0].data.shift();
        pieChartAvgDLDataRate.data.datasets[0].data.shift();
    
//lineChartTotalAvgDLDataRate push adds new data to the right
        lineChartTotalAvgDLDataRate.data.labels.push(3);
        lineChartTotalAvgDLDataRate.data.datasets[0].data.push(56);
    //shift removes left data point    
        lineChartTotalAvgDLDataRate.data.labels.shift();
        lineChartTotalAvgDLDataRate.data.datasets[0].data.shift();
        
    
    
/////////////////Uplink Related Charts///////////////////////////////////////////////////////////////////////////////////////  
//lineChartAvgULDataRate push adds new data to right
          lineChartAvgULDataRate.data.labels.push(11);
          lineChartAvgULDataRate.data.datasets[0].data.push(20);
          lineChartAvgULDataRate.data.datasets[1].data.push(6);
          lineChartAvgULDataRate.data.datasets[2].data.push(60);
    //shift removes left data point    
          lineChartAvgULDataRate.data.labels.shift();
          lineChartAvgULDataRate.data.datasets[0].data.shift();
          lineChartAvgULDataRate.data.datasets[1].data.shift();
          lineChartAvgULDataRate.data.datasets[2].data.shift();

//pieChartAvgULDataRate push adds new data to the right
        pieChartAvgULDataRate.data.datasets[0].data.push(1);
        pieChartAvgULDataRate.data.datasets[0].data.push(6);
        pieChartAvgULDataRate.data.datasets[0].data.push(3);    
    //shift removes left data point
        pieChartAvgULDataRate.data.datasets[0].data.shift();
        pieChartAvgULDataRate.data.datasets[0].data.shift();
        pieChartAvgULDataRate.data.datasets[0].data.shift();

//lineChartTotalAvgULDelay push adds new data to right
        lineChartTotalAvgULDelay.data.labels.push(4);
        lineChartTotalAvgULDelay.data.datasets[0].data.push(57);
      //shift removes left data point  
        lineChartTotalAvgULDelay.data.labels.shift();
        lineChartTotalAvgULDelay.data.datasets[0].data.shift();

//////////////////Delay related Charts////////////////////////////////////////////////////////////////////////////////////    
//lineChartAvgDelayRate push adds new data to right
        lineChartAvgDelayRate.data.labels.push(15);
        lineChartAvgDelayRate.data.datasets[0].data.push(7);
        lineChartAvgDelayRate.data.datasets[1].data.push(50);
        lineChartAvgDelayRate.data.datasets[2].data.push(20);
    //shift removes left data point
         lineChartAvgDelayRate.data.labels.shift();
         lineChartAvgDelayRate.data.datasets[0].data.shift();
         lineChartAvgDelayRate.data.datasets[1].data.shift();
         lineChartAvgDelayRate.data.datasets[2].data.shift();

//pieChartAvgULDataRate push adds new data to the right
        pieChartAvgDelayDataRate.data.datasets[0].data.push(5);
        pieChartAvgDelayDataRate.data.datasets[0].data.push(7);
        pieChartAvgDelayDataRate.data.datasets[0].data.push(9);    
    //shift removes left data point
        pieChartAvgDelayDataRate.data.datasets[0].data.shift();
        pieChartAvgDelayDataRate.data.datasets[0].data.shift();
        pieChartAvgDelayDataRate.data.datasets[0].data.shift();
    
//lineChartTotalAvgDelayRate push adds new data to the right
        lineChartTotalAvgDelayRate.data.labels.push(15);
        lineChartTotalAvgDelayRate.data.datasets[0].data.push(65);
     //shift removes left data point    
        lineChartTotalAvgDelayRate.data.labels.shift();
        lineChartTotalAvgDelayRate.data.datasets[0].data.shift();

    
    

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
     
}