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








<!-- Defines the main content with columns and the cards -->   
<div class="row d-flex justify-content-center w-100 p-3" style="background-color: rgb(230,233,237);"> <!--This is the first row with 3 cards for DownLink Data -->

    <div class="col-md-12"> <!-- defines the column for the first card-->
        <div class="x_panel">
            <div class="x_title"> <!-- sets up the top menu of the card -->
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-sm-4">
                            <h3>Connection Status</h3> 
                        </div>
                        <div class="col-sm-2"> <h2><strong>WGS:</strong> &nbsp;</h2><h2 id="p1">Status</h2></div>
                        <div class="col-sm-2"> <h2><strong>Iridium:</strong> &nbsp;</h2><h2 id="p1">Status</h2></div>
                        <div class="col-sm-2"> <h2><strong>Mistar:</strong> &nbsp;</h2><h2 id="p1">Status</h2></div>
                        <div class="col-sm"> 
                            <ul class="nav navbar-right panel_toolbox">

                                <!--<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="fa fa-area-chart"></i>Views 
                                    </a>
                                    <div>
                                        <datalist id="chart" name="test" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <option id="temptest" class="dropdown-item" value="a" >Line</option>  onclick="changetest();"
                                            <option id="temptest2" class="dropdown-item" value="b">Line and Pie</option>
                                            <option id="temptest3" class="dropdown-item" value="c">Average</option>     
                                        </datalist>                        
                                    </div>
                                </li>-->
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <!--   <li><a class="close-link"><i class="fa fa-close"></i></a>
</li> -->
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div> <!-- sets up the top menu of the card -->

            <!-- content of the card -->  
            <div class="row d-flex justify-content-center">
                <div class="x_content">   
                    <div class="col-md-12 col-sm-12">
                        <div id="GNATconnection" class="row d-flex justify-content-center" style="width: 100%; height: 280px"></div>
                    </div>
                </div>
            </div>


            <!-- content of the card -->           
        </div><!-- closes the x-panel -->
    </div> <!-- closes the column for card 1-->


</div> <!-- Closes the first row -->  
<div class="clearfix"></div>
<br />















<!-- This is the Connection Status Animation-->  
<div class="row" > <!-- row with the main content-->

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
                        <div >
                            <datalist id="chart" name="test" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <option class="dropdown-item" value="chart1">Chart1</option>
                                <option class="dropdown-item" value="chart2">Chart2</option>    
                            </datalist>
                            <!--    <a class="dropdown-item" href="#">Settings 1</a>
<a class="dropdown-item" href="#">Settings 2</a>  -->
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div> <!-- sets up the top menu of the card -->

            <!-- content of the card -->  
            <div class="x_content">
                <canvas name="card1" class="dynamic" id="lineChartAvgDLDataRate"></canvas>
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


<script src="/vendors/Chart.js/dist/Chart.min.js"></script>        



<!------------------------------------------------------------- IFT js --------------------------------------------------------------------------------------------------->
<script>

    var myDiagram

    /////////////////Call the charts


    // create initial empty lineChart1
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
                data: []
            }, {
                label: "WAN_2",
                backgroundColor: "rgba(0, 200, 0, 0.31)",
                borderColor: "rgba(10, 200, 10, 0.7)",
                pointBorderColor: "rgba(20, 200, 20, 0.7)",
                pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                pointHoverBackgroundColor: "#888",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: [0]
            }, {
                label: "WAN_3",
                backgroundColor: "rgba(0, 0, 200, 0.31)",
                borderColor: "rgba(10, 10, 200, 0.7)",
                pointBorderColor: "rgba(20, 20, 200, 0.7)",
                pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                pointHoverBackgroundColor: "#111",
                pointHoverBorderColor: "rgba(40,40,200,1)",
                pointBorderWidth: 1,
                data: [0],
            }]
        }, //closes data

        // Configuration options go here
        options: {
            animation: {
                easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                duration: 450 // general animation time
            },
            legend: {
                display: true,

                labels: {
                    // This more specific font property overrides the global property
                    fontSize: 12 //NOTE: IF YOU DON"T OVERWRITE FONSTSIZE THORWS AN ERROR
                }
            },
        },
    });


    // create initial empty pieChart1
    var ctd11 = document.getElementById("lineChartTotalAvgDLDataRate");
    var lineChartTotalAvgDLDataRate = new Chart(ctd11, {
        type: 'line',
        data: {
            labels: [0],
            datasets: [{
                label: "Total DL data rate",
                backgroundColor: "rgba(200, 0, 0, 0.31)",
                borderColor: "rgba(200, 10, 10, 0.7)",
                pointBorderColor: "rgba(200, 20, 20, 0.7)",
                pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: [0]
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
    // create initial empty lineChart11
    var ctd2 = document.getElementById("lineChartAvgULDataRate");
    var lineChartAvgULDataRate = new Chart(ctd2, {
        type: 'line',
        data: {
            labels: [0],
            datasets: [{
                label: "WAN_1",
                backgroundColor: "rgba(58, 123, 136, 0.31)",
                borderColor: "rgba(58, 128, 141, 0.7)",
                pointBorderColor: "rgba(58, 133, 146, 0.7)",
                pointBackgroundColor: "rgba(58, 138, 151, 0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: [0]
            }, {
                label: "WAN_2",
                backgroundColor: "rgba(0, 200, 0, 0.31)",
                borderColor: "rgba(10, 200, 10, 0.7)",
                pointBorderColor: "rgba(20, 200, 20, 0.7)",
                pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                pointHoverBackgroundColor: "#888",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: [0]
            }, {
                label: "WAN_3",
                backgroundColor: "rgba(0, 0, 200, 0.31)",
                borderColor: "rgba(10, 10, 200, 0.7)",
                pointBorderColor: "rgba(20, 20, 200, 0.7)",
                pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                pointHoverBackgroundColor: "#111",
                pointHoverBorderColor: "rgba(40,40,200,1)",
                pointBorderWidth: 1,
                data: [0]
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


    // create initial empty lineChart2
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
                easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
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
                easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
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
                data: []
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





    //////////////////This is the call to get the data from the json file/////////////    

    const HOSTADDRESS = "http://"+window.location.hostname+":8080/?getStatistics";
    var delay = 2000;

    var Statistics_QoS; //variable used for the data collected from the GNAT hardware




    //getStatisticsX this function gets json data from the hardwar and assigns in to Statics_QoS////////////////////////////////////////////////////////////////////////////// 
    //function getStatisticsX() { //this function is called by the process function below to do the updates

    var xhttp = new XMLHttpRequest();

    /*xhttp.onreadystatechange = function() {
    if (!((this.readyState == 4) && (this.status == 200))) {
      console.log("getStatisticsX(): returning: this.readyState: " +
                   this.readyState + "; this.status: " + this.status + "\n");
      return;

    } // a check in the console */

    var testVar ={"connStatus":[
        1,
        1,
        1,
        0,
        0,
        0],

                  "avgDLDataRate":[
                      50,
                      30,
                      35],

                  "avgULDataRate":[
                      6,
                      9,
                      10],

                  "avgDelay":[
                      1,
                      2,
                      4],    
                 };    



    var statValues = JSON.parse(JSON.stringify(testVar)); //This assigns the parsed data to the var
    //getData(Statistics_QoS); //This gets the data: JavaScript method getData is used to get data in the specified format from the clipboard 
    //}

    //console.log(statValues);



    //automatically get the IP address
    var hostAddress = HOSTADDRESS;
    xhttp.open("GET", hostAddress, true);
    xhttp.send(null);
    //} //close of getStatisticsX function 






    //GOJS GNAT topology and link status////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if( document.readyState !== 'loading' ) {
        //console.log( 'document is already ready, just execute code here' );
        initx();
    } else {
        document.addEventListener('DOMContentLoaded', function () {
            //console.log( 'document was not ready, place code here' );
            initx();
        });
    }   
function initx() {
        //create and empty diagram    
        var $ = go.GraphObject.make; // this defines a var as a $ Convetion of GoJS
        myDiagram = $(go.Diagram, "GNATconnection"); //GNATconnection corresponds to the the div id
        //Notice that go is the "namespace" in which all GoJS types reside. All code uses of GoJS classes such as Diagram or Node or Panel or Shape or TextBlock will be prefixed with "go.". 

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
                {key: "GNAT", color: bluegrad},
                {key: "WGS", color: '#eeb0b0'},
                {key: "Iridium", color: "#b0eeb0"},
                {key: "Milstar", color: '#b0b0ee'},
                //{key: "Softflow_1", color: lavgrad},
               // {key: "Softflow_2", color: lavgrad},
              // {key: "Softflow_3", color: lavgrad},
                {key: "Bonding Server", color: graygrad}
            ],[
                { from: "User", to: "GNAT", color: "#2a3f54"},
                { from: "GNAT", to: "WGS", color: 0},
                { from: "GNAT", to: "Iridium", color: 0},
                { from: "GNAT", to: "Milstar", color: 0},
                { from: "WGS", to: "Bonding Server", color: 0},
                { from: "Iridium", to: "Bonding Server", color: 0},
                { from: "Milstar", to: "Bonding Server", color: 0},
                //{ from: "Softflow_1", to: "Bonding_Server", color: 0},
               // { from: "Softflow_2", to: "Bonding_Server", color: 0},
              //  { from: "Softflow_3", to: "Bonding_Server", color: 0},
            ]);

        myDiagram.undoManager.isEnabled = true;

        return myDiagram;
    }


    var getData = function() {
        //Related to the packet flow animation////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
        //update link color for GNAT topology

        WAN_1_Status = statValues.connStatus[0];
        WAN_2_Status = statValues.connStatus[1];
        WAN_3_Status = statValues.connStatus[2];
        WAN_4_Status = statValues.connStatus[3];
        WAN_5_Status = statValues.connStatus[4];
        WAN_6_Status = statValues.connStatus[5];
        //console.log(WAN_1_Status);

        if (WAN_1_Status == 0){
            var linkx = {from: "WGS"};
            var linky = {from: "GNAT", to: "WGS",};
            //console.log('test');
            var link1 = myDiagram.findLinksByExample(linkx).first();
            var link2 = myDiagram.findLinksByExample(linky).first();
            if (link1 !== null) 
                myDiagram.model.setDataProperty(link1.data, "color", 0)
                myDiagram.model.setDataProperty(link2.data, "color", 0);
        }
        else if (WAN_1_Status == 1){
            var linkx = {from: "WGS"};
            var linky = {from: "GNAT", to: "WGS",};
            var link1 = myDiagram.findLinksByExample(linkx).first();
            var link2 = myDiagram.findLinksByExample(linky).first();
            //console.log(link2.data);
            if (link1 !== null) 
                myDiagram.model.setDataProperty(link1.data, "color", 1)
                myDiagram.model.setDataProperty(link2.data, "color", 1);
            //console.log(link1.data);
        }


        if (WAN_2_Status == 0){
            var linkx = {from: "Iridium"};
            var linky = {from: "GNAT", to: "Iridium",};
            var link1 = myDiagram.findLinksByExample(linkx).first();
            var link2 = myDiagram.findLinksByExample(linky).first();
            if (link1 !== null) 
                myDiagram.model.setDataProperty(link1.data, "color", 0)
                myDiagram.model.setDataProperty(link2.data, "color", 0);
        }
        else if (WAN_2_Status == 1){
            var linkx = {from: "Iridium"};
            var linky = {from: "GNAT", to: "Iridium",};
            var link1 = myDiagram.findLinksByExample(linkx).first();
            var link2 = myDiagram.findLinksByExample(linky).first();
            if (link1 !== null) 
                myDiagram.model.setDataProperty(link1.data, "color", 1)
                myDiagram.model.setDataProperty(link2.data, "color", 1);
        }

        if (WAN_3_Status == 0){
            var linkx = {from: "Milstar"};
            var linky = {from: "GNAT", to: "Milstar",};
            var link1 = myDiagram.findLinksByExample(linkx).first();
            var link2 = myDiagram.findLinksByExample(linky).first();
            if (link1 !== null) 
                myDiagram.model.setDataProperty(link1.data, "color", 0)
                myDiagram.model.setDataProperty(link2.data, "color", 0);
        }
        else if (WAN_3_Status == 1){
            var linkx = {from: "Milstar"};
            var linky = {from: "GNAT", to: "Milstar",};
            var link1 = myDiagram.findLinksByExample(linkx).first();
            var link2 = myDiagram.findLinksByExample(linky).first();
            if (link1 !== null) 
                myDiagram.model.setDataProperty(link1.data, "color", 1)
                myDiagram.model.setDataProperty(link2.data, "color", 1);
        }

        /*
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
*/

        //end of packet flow animation///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        // this post id drives the example data
    }    

    setInterval(getData, 5000);



    // get new data and update charts every "delay" seconds: updates the data for real-time data//////////////////////////////////////////////////////////////////
    /*function process() {
        getStatisticsX(); //getStatisticsX this function gets json data from the hardwar and assigns in to Statics_QoS 
        setTimeout(process, delay);
}
//This calls the function and update the charts
process();*/

    // getData(Statistics_QoS);

</script>
<!------------------------------------------------------------- IFT js --------------------------------------------------------------------------------------------------->



<!-- close page content -->




@endsection
