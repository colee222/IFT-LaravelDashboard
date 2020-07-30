//This is the javascript file for updating via a button
//First we create the series of inital charts using the Charts.js library. For the button the data arrays are pre-populated. For the real-time data they should all read 0
//The same goes for the labels. It should be empty for the real-time data. Here is it is prepopulated 
//This will create 9 charts total: 3 related to Uplink data, 3 related to downlink data, and 3 related to delay data
//each category has a line chart, a pie chart, and a average line chart.

//First step creating the chart from the Charts.js library///////////////////////////////////////////////////////////////////////////////////////////////////
////Downlink related Charts////////////////////////////////////////////////////////
// create initial empty lineChart using the Chart.js library called lineChartAvgDLDataRate


/////////////This will autoload any functions on the page loading. ///////////////////////////////////////////////////////////////////////////////////////
if( document.readyState !== 'loading' ) {
    //console.log( 'document is already ready, just execute code here' );
    //lineChartAvgDLDataRate();
} else {
    document.addEventListener('DOMContentLoaded', function () {
        //console.log( 'document was not ready, place code here' );
        initx();
    });
} 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////// This is the function called to load charts on demand. Stops js error if not referenced in the html///////////////////
(function($,sr){
    // debouncing function from John Hann
    // Used for You want to execute a function only once, coalescing multiple sequential calls into a single execution at the beginning or end.
    // https://coffeescript-cookbook.github.io/chapters/functions/debounce
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
        var timeout;

        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args); 
                timeout = null; 
            }

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100); 
        };
    };

    // smartresize 
    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');
/////////////////////////////////////////////////End of Debouncing////////////////////////////////////////////////////////////////////////////////////////


//////////////////This is the call to get the data from the json file/////////////////////////////////////////////////////////////////////////////////    
/****Global Variables*****/
var time = []; //this sets the labels for the charts globally
var inputJson
//var Statistics_QoS; //variable used for the data collected from the GNAT hardware
const VERBOSE = 1;
const HOSTADDRESS = "http://"+window.location.hostname+":8080/?getStatistics";


/*****************This gets the data******************************************/    
//var xhttp = new XMLHttpRequest();
/*NOTE!!! THIS WILL NEED TO BE UNCOMMENTED FOR REAL WORLD DEPLOYMENT*/
/*xhttp.onreadystatechange = function() {
                if (!((this.readyState == 4) && (this.status == 200))) {
                        console.log("getJSON(): returning: this.readyState: " +
                            this.readyState + "; this.status: " + this.status +
                            "\n");
                        return;
                }*/
/*THIS IS THE END OF THE UNCOMMENT*/

/*var hostAddress = HOSTADDRESS;
    xhttp.open("GET", hostAddress, true);
    xhttp.send(null);*/


/*NOTE THIS IS WHAT IS USED TO GENERATE A SAMPLE JSON FILE COMMENT OUT IN REAL DEPLOYMENT*/
/*Set global variables*/
Chart.defaults.global.plugins.datalabels.display = false
var myDiagram

var data = []; //this is for the dataset
var data2 = []; //this is for the dataset
var data3 = []; //this is for the dataset

var time2 = []; //this sets the labels globally
var data4 = []; //this is for the dataset
var data5 = []; //this is for the dataset
var data6 = []; //this is for the dataset

var data7 = []; //this is for the dataset
var data8 = []; //this is for the dataset
var data9 = []; //this is for the dataset

var time3 = []; //this sets the labels globally
var data10 = []; //this is for the dataset
var data11 = []; //this is for the dataset
var data12 = []; //this is for the dataset

var value1 = []; //this is for the dataset
var value2 = []; //this is for the dataset
var value3 = []; //this is for the dataset
var value4 = []; //this is for the dataset
var value5 = []; //this is for the dataset
var value6 = []; //this is for the dataset
var value7 = []; //this is for the dataset
var value8 = []; //this is for the dataset
var value9 = []; //this is for the dataset
var value10 = []; //this is for the dataset
var value11 = []; //this is for the dataset
var value12 = []; //this is for the dataset

////////////////////////////////////////////////////////////// Generates ramdom numbers: used for example purposes///////////////////////////////////////
function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

///////////////////////////////////////////////End of random number generation /////////////////////////////////////////////////////////////////////////

/* Perform the animation only when the display is in the foreground.
 */

/*
 * delay is the rate at which new JSON data is processed
 * and the display is refreshed
 */
var delay = 5000;      // 5 seconds

var doVisualUpdates = true;

document.addEventListener('visibilitychange', function(){
    doVisualUpdates = !document.hidden;
});


process();
/* Refresh JSON data and perform the animation every "delay" seconds
 */
function process() {
    if (doVisualUpdates)
        refreshDisplay();

    setTimeout(process, delay);
}



function refreshDisplay() {
    var value1= getRandomIntInclusive(1, 50);
    var value2= getRandomIntInclusive(1, 25);
    var value3= getRandomIntInclusive(1, 25);
    var value4= getRandomIntInclusive(1, 10);
    var value5= getRandomIntInclusive(1, 10);
    var value6= getRandomIntInclusive(1, 10);
    var value7= getRandomIntInclusive(1, 5);
    var value8= getRandomIntInclusive(1, 5);
    var value9= getRandomIntInclusive(1, 5);
    var value10= getRandomIntInclusive(1, 5);
    var value11= getRandomIntInclusive(1, 5);
    var value12= getRandomIntInclusive(1, 5);

    var testVar ={"connStatus":[
        1,
        1,
        0,
        0,
        0,
        0],

                  "avgDLDataRate":[
                      value1,
                      value2,
                      value3],

                  "avgULDataRate":[
                      value4,
                      value5,
                      value6],

                  "avgDelay":[
                      value7,
                      value8,
                      value9],

                  "avgULDelay":[
                      value10,
                      value11,
                      value12],                        
                 };


    if ((inputJson = JSON.parse( JSON.stringify(testVar))) == undefined) {
        console.log("getJSON(): No valid input\n");
        return;
    }  
    if (VERBOSE) {
        //console.log(inputJson.avgULDataRate[0]);
        return;
    }

    outputJson = convertJson(inputJson);
    if (Object.keys(outputJson).length == 0) {
        console.log("getJSON(): Object length: 0\n");
        return;
    } 
    getData();    
}



///////////////////////////////////////////////////////Collects the Current Time//////////////////////////////////////////////////////////////////////////
//?setting the a time coordinate to collected data (?) I think we should be collecting this via Statistics_QoS?
function getTime(){        
    var today = new Date();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(); // time is the variable used to push the updates of the x-axis on the line charts
    return time;
    console.log(time);

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



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



////////////////////////////////////////////Define the Global Constants//////////////////////////////////////////////////////////////////////////////////
var Avg = [];
var conn1 = [];
var conn2 = [];
var conn3 = [];











//function lineChartAvgDLDataRate(time, data, data2, data3) {
if ($('#lineChartAvgDLDataRate').length) {
    var ctd1 = document.getElementById("lineChartAvgDLDataRate");
    ctd1.height = 100;
    var lineChartAvgDLDataRate = new Chart(ctd1, {
        type: 'line',
        data: {
            labels: time,
            datasets: [{
                label: "WGS",
                backgroundColor: "rgba(200, 0, 0, 0.31)",
                borderColor: "rgba(200, 10, 10, 0.7)",
                pointBorderColor: "rgba(200, 20, 20, 0.7)",
                pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: data,
            },{
                label: "Iridium",
                backgroundColor: "rgba(0, 200, 0, 0.31)",
                borderColor: "rgba(10, 200, 10, 0.7)",
                pointBorderColor: "rgba(20, 200, 20, 0.7)",
                pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                pointHoverBackgroundColor: "#888",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: data2,
            }, {
                label: "Milstar",
                backgroundColor: "rgba(0, 0, 200, 0.31)",
                borderColor: "rgba(10, 10, 200, 0.7)",
                pointBorderColor: "rgba(20, 20, 200, 0.7)",
                pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                pointHoverBackgroundColor: "#111",
                pointHoverBorderColor: "rgba(40,40,200,1)",
                pointBorderWidth: 1,
                data: data3,
            },{
                label: "Total",
                backgroundColor: "rgba(229,229,229,0.5)",
                borderColor: "rgba(131,147,165,0.7)",
                pointBorderColor: "rgba(42,63,84,0.7)",
                pointBackgroundColor: "rgba(42,63,84,0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgb(42,63,84,1)",
                pointBorderWidth: 1,
                data: data11,
            }]
        }, //closes data

        // Configuration options go here
        options: {
            responsive: true,
            //maintainAspectRatio: true,
            aspectRatio: 4,
            animation: {
                easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                duration: 80 // general animation time
            },
            legend: {
                display: true,
                onClick: function(e, legendItem) {
                    var index = legendItem.datasetIndex;
                    var ci = this.chart;
                    var alreadyHidden = (ci.getDatasetMeta(index).hidden === null) ? false : ci.getDatasetMeta(index).hidden;

                    ci.data.datasets.forEach(function(e, i) {
                        var meta = ci.getDatasetMeta(i);

                        if (i !== index) {
                            if (!alreadyHidden) {
                                meta.hidden = meta.hidden === null ? !meta.hidden : null;
                            } else if (meta.hidden === null) {
                                meta.hidden = true;
                            }
                        } else if (i === index) {
                            meta.hidden = null;
                        }
                    });

                    ci.update();
                },
            },
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Rate',
                        fontSize: 16,
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Time',
                        fontSize: 16,
                    }
                }]
            },
            title: {
                //display: true,
                text: 'Per Connection'
            },
        },
    });
} // closes the if function
//}

// create initial empty lineChart using the Charts.js library called lineChartTotalAvgDLDataRate
if ($('#lineChartTotalAvgDLDataRate').length) {
    var ctd11 = document.getElementById("lineChartTotalAvgDLDataRate");
    //ctd11.height = 80;
    var lineChartTotalAvgDLDataRate = new Chart(ctd11, {
        type: 'line',
        data: {
            labels: time3,
            datasets: [{
                label: "Total DL data rate",
                backgroundColor: "rgba(200, 0, 0, 0.31)",
                borderColor: "rgba(200, 10, 10, 0.7)",
                pointBorderColor: "rgba(200, 20, 20, 0.7)",
                pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: data10,
            }, {
                label: "Total UL data rate",
                backgroundColor: "rgba(0, 0, 200, 0.31)",
                borderColor: "rgba(10, 10, 200, 0.7)",
                pointBorderColor: "rgba(20, 20, 200, 0.7)",
                pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                pointHoverBackgroundColor: "#111",
                pointHoverBorderColor: "rgba(40,40,200,1)",
                pointBorderWidth: 1,
                data: data12,
            }]
        }, //closes data

        // Configuration options go here
        options: {
            responsive: true,
            aspectRatio: 5,
            animation: {
                easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                duration: 80 // general animation time
            },
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Rate',
                        fontSize: 16,
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Time',
                        fontSize: 16,
                    }
                }]
            },
        },
    });
}


////Uplink related Charts////////////////////////////////////////////////////////
// create initial empty lineChart from the Chart. js library called lineChartAvgULDataRate

if ($('#lineChartAvgULDataRate').length) {
    var ctd2 = document.getElementById("lineChartAvgULDataRate");
    ctd2.height = 100;
    var lineChartAvgULDataRate = new Chart(ctd2, {
        type: 'line',
        data: {
            labels: time2,
            datasets: [{
                label: "WAN_1",
                backgroundColor: "rgba(58, 123, 136, 0.31)",
                borderColor: "rgba(58, 128, 141, 0.7)",
                pointBorderColor: "rgba(58, 133, 146, 0.7)",
                pointBackgroundColor: "rgba(58, 138, 151, 0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: [data4],
            }, {
                label: "WAN_2",
                backgroundColor: "rgba(0, 200, 0, 0.31)",
                borderColor: "rgba(10, 200, 10, 0.7)",
                pointBorderColor: "rgba(20, 200, 20, 0.7)",
                pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                pointHoverBackgroundColor: "#888",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: [data5],
            }, {
                label: "WAN_3",
                backgroundColor: "rgba(0, 0, 200, 0.31)",
                borderColor: "rgba(10, 10, 200, 0.7)",
                pointBorderColor: "rgba(20, 20, 200, 0.7)",
                pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                pointHoverBackgroundColor: "#111",
                pointHoverBorderColor: "rgba(40,40,200,1)",
                pointBorderWidth: 1,
                data: [data6],
            }]
        }, //closes data

        // Configuration options go here
        options: {
            responsive: true,
            animation: {
                easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                duration: 80 // general animation time
            },
            legend: {
                display: true,
            },
            plugins: {
                datalabels: {
                    display: false,
                }
            },
        }, 

    });
}


// create initial empty pieChart from Chart.js library called pieChartAvgULDataRate
if ($('#pieChartAvgULDataRate').length) { 
    var ptd2 = document.getElementById("pieChartAvgULDataRate");
    var pieChartAvgULDataRate = new Chart(ptd2, {
        type: 'doughnut',
        data: {
            //labels: [],
            datasets: [{
                data: [data7, data8, data9],
                backgroundColor: [
                    "rgb(214,76,76)", //WAN1
                    "rgb(59,211,59)", //WAN2
                    "rgb(76,76,214)" //WAN3
                ],
                label: 'My dataset', // for legend
                //borderColor: "#fff"
            }],
            labels: [
                "WGS",
                "Iridium",
                "Milstar"
            ]
        }, //closes data

        // Configuration options go here
        options: {
            cutoutPercentage: 40,
            responsive: true,
            animation: {
                easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                duration: 0 // general animation time
            },
            legend: {
                display: false,
            },
            plugins: {
                datalabels: {
                    display: true,
                    formatter: (value, ctx) => {
                        let sum = 0;
                        let dataArr = ctx.chart.data.datasets[0].data;
                        dataArr.map(data => {
                            sum += data;
                        });
                        let percentage = (value*100 / sum).toFixed(2)+"%";
                        return percentage;
                    },
                    color: 'rgb(42,63,84)',
                    //anchor:'end',
                    backgroundColor: 'rgba(229,229,229,0.8)',
                    borderColor:'rgb(42,63,84)',
                    borderRadius:6,
                    borderWidth: 0.5,
                }
            },
        },
    });
}



var getData = function() {

    //Related to the packet flow animation////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
    //update link color for GNAT topology

    WAN_1_Status = inputJson.connStatus[0];
    WAN_2_Status = inputJson.connStatus[1];
    WAN_3_Status = inputJson.connStatus[2];
    WAN_4_Status = inputJson.connStatus[3];
    WAN_5_Status = inputJson.connStatus[4];
    WAN_6_Status = inputJson.connStatus[5];
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


    if ($('#stat1').length) {
        if(inputJson.connStatus[0] == 1){
            var x = document.getElementById("stat1")
            x.innerHTML = "Connected"
            x.style.color = 'green'
            x.style.fontWeight = '780';}
        else if (inputJson.connStatus[0] == 0){
            var y = document.getElementById("stat1")
            y.innerHTML = "Disconnected!"
            y.style.color = 'red'
            y.style.fontWeight = '800';}    
    }  
    if ($('#stat2').length) {
        if(inputJson.connStatus[1] == 1){
            var x = document.getElementById("stat2")
            x.innerHTML = "Connected"
            x.style.color = 'green'
            x.style.fontWeight = '780';}
        else if (inputJson.connStatus[1] == 0){
            var y = document.getElementById("stat2")
            y.innerHTML = "Disconnected!"
            y.style.color = 'red'
            y.style.fontWeight = '800';}    
    }
    if ($('#stat3').length) {
        if(inputJson.connStatus[2] == 1){
            var x = document.getElementById("stat3")
            x.innerHTML = "Connected"
            x.style.color = 'green'
            x.style.fontWeight = '780';}
        else if (inputJson.connStatus[2] == 0){
            var y = document.getElementById("stat3")
            y.innerHTML = "Disconnected!"
            y.style.color = 'red'
            y.style.fontWeight = '800';}    
    }



    Avg = (inputJson.avgULDataRate[0] + inputJson.avgULDataRate[1] + inputJson.avgULDataRate[2])/3;
    Total = inputJson.avgULDataRate[0] + inputJson.avgULDataRate[1] + inputJson.avgULDataRate[2]

    if ($('#total').length) {
        document.getElementById("total").innerHTML = Total.toFixed(2);
    }if ($('#p1').length) {
        document.getElementById("p1").innerHTML = Avg.toFixed(2);
    } if ($('#conn1').length) {
        document.getElementById("conn1").innerHTML = inputJson.avgULDataRate[0];
    } if ($('#conn2').length) {
        document.getElementById("conn2").innerHTML = inputJson.avgULDataRate[1];
    } if ($('#conn3').length) {
        document.getElementById("conn3").innerHTML = inputJson.avgULDataRate[2];
    }

    if ($('#lineChartAvgDLDataRate').length) {            
        lineChartAvgDLDataRate.data.labels.push(getTime());     
        lineChartAvgDLDataRate.data.datasets[0].data.push(inputJson.avgULDataRate[0]); 
        lineChartAvgDLDataRate.data.datasets[1].data.push(inputJson.avgULDataRate[1]); 
        lineChartAvgDLDataRate.data.datasets[2].data.push(inputJson.avgULDataRate[2]);
        lineChartAvgDLDataRate.data.datasets[3].data.push(Total);
        //shift removes left data point
        var dataLength = 20;
        if (lineChartAvgDLDataRate.data.datasets[0].data.length > dataLength) { //logic for how long the x-axis is
            lineChartAvgDLDataRate.data.labels.shift();
            lineChartAvgDLDataRate.data.datasets[0].data.shift();
            lineChartAvgDLDataRate.data.datasets[1].data.shift();
            lineChartAvgDLDataRate.data.datasets[2].data.shift();
            lineChartAvgDLDataRate.data.datasets[3].data.shift();
        }
        lineChartAvgDLDataRate.update();

    }

    /////////////////Uplink Related Charts///////////////////////////////////////////////////////////////////////////////////////  
    //lineChartAvgULDataRate push adds new data to right   
    if ($('#lineChartAvgULDataRate').length) {
        lineChartAvgULDataRate.data.labels.push(getTime());
        lineChartAvgULDataRate.data.datasets[0].data.push(inputJson.avgULDataRate[0]);
        lineChartAvgULDataRate.data.datasets[1].data.push(inputJson.avgULDataRate[1]);
        lineChartAvgULDataRate.data.datasets[2].data.push(inputJson.avgULDataRate[2]);
        //shift removes left data point

        if (lineChartAvgULDataRate.data.datasets[0].data.length > dataLength) { //logic for how long the x-axis is
            lineChartAvgULDataRate.data.labels.shift();
            lineChartAvgULDataRate.data.datasets[0].data.shift();
            lineChartAvgULDataRate.data.datasets[1].data.shift();
            lineChartAvgULDataRate.data.datasets[2].data.shift();
        }
        lineChartAvgULDataRate.update();
    }
    if ($('#lineChartTotalAvgDLDataRate').length) {
        //lineChartTotalAvgDLDataRate push adds new data to the right
        lineChartTotalAvgDLDataRate.data.labels.push(getTime());
        lineChartTotalAvgDLDataRate.data.datasets[0].data.push(Avg);
        lineChartTotalAvgDLDataRate.data.datasets[1].data.push(-Total);    
        //shift removes left data point
        if (lineChartTotalAvgDLDataRate.data.datasets[0].data.length > dataLength) { //logic for how long the x-axis is
            lineChartTotalAvgDLDataRate.data.labels.shift();
            lineChartTotalAvgDLDataRate.data.datasets[0].data.shift();
            lineChartTotalAvgDLDataRate.data.datasets[1].data.shift();    
        }

        lineChartTotalAvgDLDataRate.update();
    }

    if ($('#pieChartAvgULDataRate').length) {
        //pieChartAvgULDataRate push adds new data to the right
        pieChartAvgULDataRate.data.datasets[0].data.push(inputJson.avgULDataRate[0]);
        pieChartAvgULDataRate.data.datasets[0].data.push(inputJson.avgULDataRate[1]);
        pieChartAvgULDataRate.data.datasets[0].data.push(inputJson.avgULDataRate[0]);    
        //shift removes left data point
        pieChartAvgULDataRate.data.datasets[0].data.shift();
        pieChartAvgULDataRate.data.datasets[0].data.shift();
        pieChartAvgULDataRate.data.datasets[0].data.shift();
        pieChartAvgULDataRate.update();   
    }
    // re-render the chart
}             



// get new data every 2 seconds
setInterval(getData, 2000);