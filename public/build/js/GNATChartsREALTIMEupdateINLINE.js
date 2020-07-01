//This is the javascript file for updating realtime data using inline javascript. This is to test if it is operating properly before calling the outside script
//First we create the series of inital charts using the Charts.js library. For the real-time data line charts should all read 0 and pie charts should all read 1
//The same goes for the labels. It should be empty for the real-time data. Here is it is prepopulated 
//This will create 9 charts total: 3 related to Uplink data, 3 related to downlink data, and 3 related to delay data
//each category has a line chart, a pie chart, and a average line chart.
//The data collection and Charts.js updates are done via a script inlie as the original prototype.

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
                                     duration: 0 // general animation time
                                    },
                                },
                              
                          });
