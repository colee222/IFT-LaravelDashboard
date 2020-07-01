@extends('layouts.GNAT')

@section('content')
<!-- page content -->
            <div class="">
            <div class="page-title">
              <div class="title_left">
               <!-- <h3>Users <small>Some examples to get you started</small></h3>-->
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
              </div>
            </div>

            <div class="clearfix"></div>








            <div class="row">
              <div class="col-md-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input QoS threshold values to filter traffic flows</h2>
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
                    <br />
                    <form id="formTrafficFlow" class="form-label-left input_mask" action="http://192.168.7.5:8080/" method="post">
                      <div class="col-md-3 col-sm-6  form-group">Max No. of Traffic flow <span class="required">*</span>
                        <input type="text" class="form-control" name="MaxNoTraffifFlow" required="required" placeholder="10" value="10" data-inputmask="'mask': '99999'">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Flow ID
                        <input type="text" class="form-control" name="FlowID" placeholder="1000" value="1000" data-inputmask="'mask': '99999'" disabled="disabled">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Protocol Type
                        <input type="text" class="form-control" name="ProtocolType" placeholder="UDP" value="UDP" data-inputmask="'mask': 'ABCDEF'" disabled="disabled">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Source IP
                        <input type="text" class="form-control" name="SourceIP" placeholder="10.0.1.1" value="10.0.1.1" data-inputmask="'mask': '999.999.999.999'" disabled="disabled">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Destination IP
                        <input type="text" class="form-control" name="DestinationIP" placeholder="10.0.1.2" value="10.0.1.2" data-inputmask="'mask': '999.999.999.999'" disabled="disabled">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Source Port
                        <input type="text" class="form-control" name="SourcePort" placeholder="1000" value="1000" data-inputmask="'mask': '99999'" disabled="disabled">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Destination Port
                        <input type="text" class="form-control" name="DestinationPort" placeholder="1000" value="1000" data-inputmask="'mask': '99999'" disabled="disabled">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">WAN_No
                        <input type="text" class="form-control" name="WANNo" placeholder="1" value="1" data-inputmask="'mask': '9'" disabled="disabled">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Min sendRate1s (Kbps)
                        <input type="text" class="form-control" name="MinsendRate1s" placeholder="1" value="1" data-inputmask="'mask': '99999'">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Max sendRate1s (Kbps)
                        <input type="text" class="form-control" name="MaxsendRate1s" placeholder="1000" value="1000" data-inputmask="'mask': '99999'" disabled="disabled">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Min sendRate20s (Kbps)
                        <input type="text" class="form-control" name="MinsendRate20s" placeholder="1" value="1" data-inputmask="'mask': '99999'">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Max sendRate20s (Kbps)
                        <input type="text" class="form-control" name="MaxsendRate20s" placeholder="1000" value="1000" data-inputmask="'mask': '99999'" disabled="disabled">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Min recvRate1s (Kbps)
                        <input type="text" class="form-control" name="MinrecvRate1s" placeholder="1" value="1" data-inputmask="'mask': '99999'">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Max recvRate1s (Kbps)
                        <input type="text" class="form-control" name="MaxrecvRate1s" placeholder="1000" value="1000" data-inputmask="'mask': '99999'" disabled="disabled">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Min recvRate20s (Kbps)
                        <input type="text" class="form-control" name="MinrecvRate20s" placeholder="1" value="1" data-inputmask="'mask': '99999'">
                      </div>

                      <div class="col-md-3 col-sm-6  form-group">Max recvRate20s (Kbps)
                        <input type="text" class="form-control" name="MaxrecvRate20s" placeholder="1000" value="1000" data-inputmask="'mask': '99999'" disabled="disabled">
                      </div>

                      <div class="clearfix"></div>


                      <div class="ln_solid"></div>
                      <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                          <button type="button" class="btn btn-primary">Cancel</button>
                          <button type="reset"  class="btn btn-primary">Reset</button>
                          <button type="submit" class="btn btn-success" id="setTFQoS">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

             </div>
          </div>







          <div class="row">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Traffic Flow Info</h2>
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
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                      <thead>
                                        <tr>
                                          <th>Flow ID</th>
                                          <th>Protocol Type</th>
                                          <th>Source IP</th>
                                          <th>Destination IP</th>
                                          <th>Source Port</th>
                                          <th>Destination Port</th>
                                          <th>WAN_No</th>
                                          <th>sendRate1s (Mbps)</th>
                                          <th>sendRate20s (Mbps)</th>
                                          <th>recvRate1s (Mbps)</th>
                                          <th>recvRate20s (Mbps)</th>
                                        </tr>
                                        
                                      </thead>

                                      <tbody>

                                      </tbody>
                                    </table>
                              </div>
                          </div>
                       </div>
                   </div>
                </div>
          </div>
       </div>
          </div>



<script>

const HOSTADDRESS = "http://"+window.location.hostname+":8080/?outFlowInfox";
var delay = 5000;

//submit QoS threshold value for traffic flow
function setTrafficFlowTH() {

  var formElement = document.querySelector("formTrafficFlow");
  var request = new XMLHttpRequest();
  //automatically get the IP address
  var hostAddress = "http://"+window.location.hostname+":8080/?setTrafficFlowTH";
  request.open("POST", hostAddress);
  request.send(new FormData(formElement));
}


//if(array_key_exists("setTFQoS",$_POST)){
//      setTrafficFlowTH();
//}

//get traffic flow
function getTrafficsX() {

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (!((this.readyState == 4) && (this.status == 200))) {
      console.log("getTrafficsX(): returning: this.readyState: " +
                   this.readyState + "; this.status: " + this.status + "\n");
      return;
    }

    traffic_Flow_QoS = JSON.parse(this.responseText);
    getData(traffic_Flow_QoS);
  }

  var hostAddress = HOSTADDRESS;
  xhttp.open("GET", hostAddress, true);
  xhttp.send(null);
}

var getData = function(trafficValue) {
        var outflowId;
        var protocol;
        var srcIP;
        var dstIP;
        var srcPort;
        var dstPort;
        var wanNum;
        var sendRate1s;
        var sendRate20s;
        var recvRate1s;
        var recvRate20s;
        var tableValues = [];

        //var a = (true)? "true" : "false";
        var numberOfTrafficFlows = ( Object.keys(trafficValue.outFlowTraffic).length );
        for (var i = 0; i < numberOfTrafficFlows; i++) {
                outflowId = trafficValue.outFlowTraffic[i].index;
                protocol = trafficValue.outFlowTraffic[i].protocol;
                srcIP = trafficValue.outFlowTraffic[i].srcIP;
                dstIP = trafficValue.outFlowTraffic[i].dstIP;
                srcPort = trafficValue.outFlowTraffic[i].srcPort;
                dstPort = trafficValue.outFlowTraffic[i].dstPort;
                wanNum = trafficValue.outFlowTraffic[i].wanNum;
                sendRate1s = trafficValue.outFlowTraffic[i].sendRate1s;
                sendRate20s = trafficValue.outFlowTraffic[i].sendRate20s;
                recvRate1s = trafficValue.outFlowTraffic[i].recvRate1s;
                recvRate20s = trafficValue.outFlowTraffic[i].recvRate20s;
                if (wanNum == -1) {
                        wanNum = "Bonding";
                }

                tableValues[i] = [outflowId, protocol, srcIP, dstIP, srcPort, dstPort, wanNum, sendRate1s, sendRate20s, recvRate1s, recvRate20s];
        }
//console.log(tableValues);

        var table = document.getElementById("datatable-buttons");
        //delete all rows from last time
        for(var i = table.rows.length - 1; i > 0; i--){
                table.deleteRow(i);
        }

        var numberOfRows = numberOfTrafficFlows;
        console.log(numberOfTrafficFlows);
        for (var row = 1; row < numberOfRows + 1 ; row++){
                var rowX = table.insertRow(row);
                for (var col = 0; col < 11; col++){
                        var cellX = rowX.insertCell(col);
                        cellX.innerHTML = tableValues[row-1][col];
                }
        }

};

// get new data and update charts every "delay" seconds
function process() {
        getTrafficsX();
        setTimeout(process, delay);
}

process();

</script>

        
            
     <!-- close page content -->
@endsection
