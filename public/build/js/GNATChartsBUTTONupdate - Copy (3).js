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
    lineChartAvgDLDataRate();
} else {
    document.addEventListener('DOMContentLoaded', function () {
        //console.log( 'document was not ready, place code here' );
        //lineChartAvgDLDataRate();
    });
} 



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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Generates ramdom numbers: used for example purposes///////////////////////////////////////
function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
///////////////////////////////////////////////////////////////////


// Generates ramdom numbers: used for example purposes///////////////////////////////////////
function getRandomIntInclusive2(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
///////////////////////////////////////////////////////////////////

// Generates ramdom numbers: used for example purposes///////////////////////////////////////
function getRandomIntInclusive3(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
///////////////////////////////////////////////////////////////////


//?setting the a time coordinate to collected data (?) I think we should be collecting this via Statistics_QoS?
function getTime(){        
    var today = new Date();
    //var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(); // time is the variable used to push the updates of the x-axis on the line charts
    return time;
    console.log(time);

}
////////////////////////////////////////////////////////////////

var time = []; //this sets the labels globally
var data = []; //this is for the dataset
var data2 = []; //this is for the dataset
var data3 = []; //this is for the dataset

var time2 = []; //this sets the labels globally
var data4 = []; //this is for the dataset
var data5 = []; //this is for the dataset
var data6 = []; //this is for the dataset

if ($('#lineChartAvgDLDataRate').length) {
    var ctd1 = document.getElementById("lineChartAvgDLDataRate");
    var lineChartAvgDLDataRate = new Chart(ctd1, {
        type: 'line',
        data: {
            labels: time,
            datasets: [{
                label: "WAN_1",
                backgroundColor: "rgba(200, 0, 0, 0.31)",
                borderColor: "rgba(200, 10, 10, 0.7)",
                pointBorderColor: "rgba(200, 20, 20, 0.7)",
                pointBackgroundColor: "rgba(200, 30, 30, 0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: data,
            },{
                label: "WAN_2",
                backgroundColor: "rgba(0, 200, 0, 0.31)",
                borderColor: "rgba(10, 200, 10, 0.7)",
                pointBorderColor: "rgba(20, 200, 20, 0.7)",
                pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                pointHoverBackgroundColor: "#888",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: data2,
            }, {
                label: "WAN_3",
                backgroundColor: "rgba(0, 0, 200, 0.31)",
                borderColor: "rgba(10, 10, 200, 0.7)",
                pointBorderColor: "rgba(20, 20, 200, 0.7)",
                pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                pointHoverBackgroundColor: "#111",
                pointHoverBorderColor: "rgba(40,40,200,1)",
                pointBorderWidth: 1,
                data: data3,
            }]
        }, //closes data

        // Configuration options go here
        options: {
            animation: {
                easing: 'easeOutQuint', //https://www.chartjs.org/docs/master/configuration/animations/ https://easings.net/
                duration: 80 // general animation time
            },
            legend: {
                display: true,
            },
        },
    });
} // closes the if function


////Uplink related Charts////////////////////////////////////////////////////////
// create initial empty lineChart from the Chart. js library called lineChartAvgULDataRate

if ($('#lineChartAvgULDataRate').length) {
    var ctd2 = document.getElementById("lineChartAvgULDataRate");
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
                data: [data4]
            }, {
                label: "WAN_2",
                backgroundColor: "rgba(0, 200, 0, 0.31)",
                borderColor: "rgba(10, 200, 10, 0.7)",
                pointBorderColor: "rgba(20, 200, 20, 0.7)",
                pointBackgroundColor: "rgba(30, 200, 30, 0.7)",
                pointHoverBackgroundColor: "#888",
                pointHoverBorderColor: "rgba(200,40,40,1)",
                pointBorderWidth: 1,
                data: [data5]
            }, {
                label: "WAN_3",
                backgroundColor: "rgba(0, 0, 200, 0.31)",
                borderColor: "rgba(10, 10, 200, 0.7)",
                pointBorderColor: "rgba(20, 20, 200, 0.7)",
                pointBackgroundColor: "rgba(30, 30, 200, 0.7)",
                pointHoverBackgroundColor: "#111",
                pointHoverBorderColor: "rgba(40,40,200,1)",
                pointBorderWidth: 1,
                data: [data6]
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
        }, 

    });
}




///////////////This is the AJAX to get the random data for the charts/////////////////////////////////////////////////////////
var getData = function() {
    //console.log($('meta[name="_token"]').attr('content')); // log to see if the token is called
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    }); //closes ajax setup


    jQuery.ajax({
        url: "/home/post",
        type:"POST",
        success: function(data, data2, data3, data4, data5, data6) {
            console.log(data);
            //data = JSON.parse(data);


            // process your data to pull out what you plan to use to update the chart
            // e.g. new label and a new data point

            // add new label and data point to chart's underlying data structures
            //myChart.data.labels.push("ReadingID " + readingID++);

            lineChartAvgDLDataRate.data.labels.push(getTime());     
            lineChartAvgDLDataRate.data.datasets[0].data.push(getRandomIntInclusive(1, 25)); lineChartAvgDLDataRate.data.datasets[1].data.push(getRandomIntInclusive2(1, 25)); lineChartAvgDLDataRate.data.datasets[2].data.push(getRandomIntInclusive3(1, 25));
            //shift removes left data point
            var dataLength = 20;
            if (lineChartAvgDLDataRate.data.datasets[0].data.length > dataLength) { //logic for how long the x-axis is
                lineChartAvgDLDataRate.data.labels.shift();
                lineChartAvgDLDataRate.data.datasets[0].data.shift();
                lineChartAvgDLDataRate.data.datasets[1].data.shift();
                lineChartAvgDLDataRate.data.datasets[2].data.shift();
            }
/////////////////Uplink Related Charts///////////////////////////////////////////////////////////////////////////////////////  
//lineChartAvgULDataRate push adds new data to right            
            lineChartAvgULDataRate.data.labels.push(getTime());
            lineChartAvgULDataRate.data.datasets[0].data.push(getRandomIntInclusive(1, 25));
            lineChartAvgULDataRate.data.datasets[1].data.push(getRandomIntInclusive2(1, 25));
            lineChartAvgULDataRate.data.datasets[2].data.push(getRandomIntInclusive3(1, 25));
            var dataLength = 20;
            if (lineChartAvgULDataRate.data.datasets[0].data.length > dataLength) { //logic for how long the x-axis is
                lineChartAvgULDataRate.data.labels.shift();
                lineChartAvgULDataRate.data.datasets[0].data.shift();
                lineChartAvgULDataRate.data.datasets[1].data.shift();
                lineChartAvgULDataRate.data.datasets[2].data.shift();
            }
            // re-render the chart
            lineChartAvgDLDataRate.update();
            lineChartAvgULDataRate.update();
        }
    });
};             

// get new data every 3 seconds
setInterval(getData, 2000);




document.getElementById("jstest").addEventListener("click", function() {
    mychart();
});



function mychart(){
    //lineChartTotalAvgDLDataRate.clear();
    lineChartAvgULDataRate();
}
