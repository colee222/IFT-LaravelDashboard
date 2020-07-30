@extends('layouts.GNAT')

@section('content')
<!-- page content -->

<!-- top tiles: this is the upper portion before the cards -->
<!-- This is the title row -->

<div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Dashboard</h3>
            </div>

            <!--<div class="title_right">
              <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>-->
          </div>
          <div class="clearfix"></div>
<!-- This is the title row -->

<!-- /top tiles -->


<!-- Defines the main content with columns and the cards -->   
<!--<div class="row d-flex justify-content-center w-100 p-3" style="background-color: rgb(230,233,237);"> <!--This is the first row with 3 cards for DownLink Data -->
<div class="row d-flex justify-content-center" style="padding: 0;">
    <div class="col-md-12"> <!-- defines the column for the first card-->
        <div class="x_panel">
            <div class="x_title"> <!-- sets up the top menu of the card -->
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-sm-2">
                            <h2>Connection Status</h2> 
                        </div>
                        <div class="col-sm-3"> <h2><small><strong>WGS:</strong></small> &nbsp;</h2><h2 id="stat1">Status</h2></div>
                        <div class="col-sm-3"> <h2><small><strong>Iridium:</strong></small> &nbsp;</h2><h2 id="stat2">Status</h2></div>
                        <div class="col-sm-3"> <h2><small><strong>Mistar:</strong></small> &nbsp;</h2><h2 id="stat3">Status</h2></div>
                        <div class="col-sm"> 
                            <ul class="pull-right nav navbar-right ">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div> <!-- sets up the top menu of the card -->

            <!-- content of the card -->  
            <div class="row d-flex justify-content-center">
                <div class="x_content" style="display: none;">   
                    <div class="col-md-12 col-sm-12" style="position: relative;">
                        <div id="GNATconnection" class="row d-flex justify-content-center" style="width: 100%; height: 280px"></div>
                    </div>
                </div>
            </div>


            <!-- content of the card -->           
        </div><!-- closes the x-panel -->
    </div> <!-- closes the column for card 1-->


</div> <!-- Closes the first row -->  



<!-- Defines the main content with columns and the cards -->   
<!--<div class="row d-flex justify-content-center w-100 p-3" style="background-color: rgb(131,147,165);"> <!--This is the first row with 3 cards for DownLink Data -->
<div class="row d-flex justify-content-center"> 
    <div class="col-md-12"> <!-- defines the column for the first card-->
        <div class="x_panel">
            <div class="x_title"> <!-- sets up the top menu of the card -->
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-md-3 col-sm-3">
                            <h2>Down Link Data Rate (Kbps)</h2> 
                        </div>
                        <div class="col-sm-2"> <h2><small></small><strong>Total:</strong> &nbsp;</h2><h2 id="total">Total</h2></div>
                        <div class="col-sm-3"> <h2><strong>Avgerage:</strong> &nbsp;</h2><h2 id="p1">Avg value</h2></div>   
                        <div class="col-sm"> 
                            <ul class="nav navbar-right panel_toolbox">

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="fa fa-area-chart"></i>Views 
                                    </a>
                                    <div>
                                        <datalist id="chart" name="test" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <option id="temptest" class="dropdown-item" value="a" >Line</option> <!-- onclick="changetest();"-->
                                            <option id="temptest2" class="dropdown-item" value="b">Line and Pie</option>
                                            <option id="temptest3" class="dropdown-item" value="c">UpLink &amp; DownLink</option>     
                                        </datalist>                        
                                    </div>
                                </li>
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
            <!-- <div class="row d-flex justify-content-center">
<div  class="x_content">   
<canvas style="display: block;" id="lineChartAvgDLDataRate"></canvas>
</div>
</div>-->


            <div style="display: none;" class="x_content" >
                <div class="row d-flex justify-content-center">
                    <!-- This colum contains two cards-->

                    <div id="resize" class="col-md-12 col-sm-12" style="position: relative;" >
                        <canvas style="display: block;" id="lineChartAvgDLDataRate"></canvas>
                    </div>
                    <div class="col-md-4 col-sm-5" style="position: relative;">
                        <div class="row" style="position: relative;"> 
                            <canvas style="display: none;" id="pieChartAvgULDataRate"></canvas>
                        </div>

                        <div style="display: none;" id="avgValues" class="row" > 
                            <div  class="col-md-12 col-sm-4">
                                <div class="row align-items-end d-flex justify-content-center">   
                                    <h2><strong>WGS:</strong> &nbsp;</h2> <h2 id="conn1">Avg value</h2>
                                </div> 
                                <div class="row d-flex justify-content-center">   
                                    <h2><strong>Iridium:</strong> &nbsp;</h2><h2 id="conn2">Avg value</h2>
                                </div>
                                <div class="row d-flex justify-content-center">   
                                    <h2><strong>Milstar:</strong> &nbsp;</h2><h2 id="conn3">Avg value</h2>
                                </div>
                            </div> 

                        </div>

                    </div>
                </div> 
                
                <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-sm-12" style="position: relative;" >
                    <canvas style="display: none;" id="lineChartTotalAvgDLDataRate"></canvas>
                </div>
            </div> 
         </div>
                                 
        </div><!-- closes the x-panel -->
    </div> <!-- closes the column for card 1-->


</div> <!-- Closes the second row -->  
    
<div class="row d-flex justify-content-center"> 
    <div class="col-md-12"> <!-- defines the column for the first card-->
        <div class="x_panel">
            <div class="x_title"> <!-- sets up the top menu of the card -->
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-md-3 col-sm-3">
                            <h2>Up Link Data Rate (Kbps)</h2> 
                        </div>
                        <div class="col-sm-2"> <h2><small></small><strong>Total:</strong> &nbsp;</h2><h2 id="total">Total</h2></div>
                        <div class="col-sm-3"> <h2><strong>Avgerage:</strong> &nbsp;</h2><h2 id="p1">Avg value</h2></div>   
                        <div class="col-sm"> 
                            <ul class="nav navbar-right panel_toolbox">

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="fa fa-area-chart"></i>Views 
                                    </a>
                                    <div>
                                        <datalist id="chart" name="test" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <option id="temptest" class="dropdown-item" value="a" >Line</option> <!-- onclick="changetest();"-->
                                            <option id="temptest2" class="dropdown-item" value="b">Line and Pie</option>
                                            <option id="temptest3" class="dropdown-item" value="c">UpLink &amp; DownLink</option>     
                                        </datalist>                        
                                    </div>
                                </li>
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
            <!-- <div class="row d-flex justify-content-center">
<div  class="x_content">   
<canvas style="display: block;" id="lineChartAvgDLDataRate"></canvas>
</div>
</div>-->
            <div style="display: none;" class="x_content">
                <div class="row d-flex justify-content-center">
                    <!-- This colum contains two cards-->

                    <div id="resize" class="col-md-12 col-sm-12" style="position: relative;" >
                        <canvas style="display: block;" id=""></canvas>
                    </div>
                    <div class="col-md-4 col-sm-5" style="position: relative;">
                        <div class="row" style="position: relative;"> 
                            <canvas style="display: none;" id=""></canvas>
                        </div>

                        <div style="display: none;" id="avgValues" class="row" > 
                            <div  class="col-md-12 col-sm-4">
                                <div class="row align-items-end d-flex justify-content-center">   
                                    <h2><strong>WGS:</strong> &nbsp;</h2> <h2 id="conn1">Avg value</h2>
                                </div> 
                                <div class="row d-flex justify-content-center">   
                                    <h2><strong>Iridium:</strong> &nbsp;</h2><h2 id="conn2">Avg value</h2>
                                </div>
                                <div class="row d-flex justify-content-center">   
                                    <h2><strong>Milstar:</strong> &nbsp;</h2><h2 id="conn3">Avg value</h2>
                                </div>
                            </div> 

                        </div>

                    </div>
                </div> 
            </div>   

            <div class="row d-flex justify-content-center">
                <div style="position: relative;" class="col-md-12 col-sm-12">
                    <canvas style="display: none;" id="lineChartTotalAvgDLDataRate"></canvas>
                </div>
            </div>

            <!-- content of the card -->           
        </div><!-- closes the x-panel -->
    </div> <!-- closes the column for card 1-->


</div>
    
<div class="row d-flex justify-content-center"> 
    <div class="col-md-12"> <!-- defines the column for the first card-->
        <div class="x_panel">
            <div class="x_title"> <!-- sets up the top menu of the card -->
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-md-3 col-sm-3">
                            <h2>Delay Rate (ms)</h2> 
                        </div>
                        <div class="col-sm-2"> <h2><small></small><strong>Total:</strong> &nbsp;</h2><h2 id="total">Total</h2></div>
                        <div class="col-sm-3"> <h2><strong>Avgerage:</strong> &nbsp;</h2><h2 id="p1">Avg value</h2></div>   
                        <div class="col-sm"> 
                            <ul class="nav navbar-right panel_toolbox">

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="fa fa-area-chart"></i>Views 
                                    </a>
                                    <div>
                                        <datalist id="chart" name="test" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <option id="temptest" class="dropdown-item" value="a" >Line</option> <!-- onclick="changetest();"-->
                                            <option id="temptest2" class="dropdown-item" value="b">Line and Pie</option>
                                            <option id="temptest3" class="dropdown-item" value="c">UpLink &amp; DownLink</option>     
                                        </datalist>                        
                                    </div>
                                </li>
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
            <!-- <div class="row d-flex justify-content-center">
<div  class="x_content">   
<canvas style="display: block;" id="lineChartAvgDLDataRate"></canvas>
</div>
</div>-->
            <div class="x_content" style="display: none;">
                <div class="row d-flex justify-content-center">
                    <!-- This colum contains two cards-->

                    <div id="resize" class="col-md-12 col-sm-12" style="position: relative;" >
                        <canvas style="display: block;" id=""></canvas>
                    </div>
                    <div class="col-md-4 col-sm-5" style="position: relative;">
                        <div class="row" style="position: relative;"> 
                            <canvas style="display: none;" id=""></canvas>
                        </div>

                        <div style="display: none;" id="avgValues" class="row" > 
                            <div  class="col-md-12 col-sm-4">
                                <div class="row align-items-end d-flex justify-content-center">   
                                    <h2><strong>WGS:</strong> &nbsp;</h2> <h2 id="conn1">Avg value</h2>
                                </div> 
                                <div class="row d-flex justify-content-center">   
                                    <h2><strong>Iridium:</strong> &nbsp;</h2><h2 id="conn2">Avg value</h2>
                                </div>
                                <div class="row d-flex justify-content-center">   
                                    <h2><strong>Milstar:</strong> &nbsp;</h2><h2 id="conn3">Avg value</h2>
                                </div>
                            </div> 

                        </div>

                    </div>
                </div> 
            </div>   

            <div class="row d-flex justify-content-center">
                <div style="position: relative;" class="x_content">
                    <canvas style="display: none;" id="lineChartTotalAvgDLDataRate"></canvas>
                </div>
            </div>

            <!-- content of the card -->           
        </div><!-- closes the x-panel -->
    </div> <!-- closes the column for card 1-->


</div>   
    
    
<div class="clearfix"></div>
<br />
</div>



<!--This kinda works but without AJAX refreshes the entire page. But rather than ID this needs to be what is changed                     
<script type="text/javascript"> //This kinda works but without AJAX hnned to reload entire page.
function changetest()
{
console.log("test");
var x = document.getElementById("lineChartAvgULDataRate");
if (x.style.display === "none") {
x.style.display = "block";
} else {
x.style.display = "none";
}

var x = document.getElementById("pieChartAvgULDataRate");
if (x.style.display === "none") {
x.style.display = "block";
} else {
x.style.display = "none";
}

var x = document.getElementById("avgValues");
if (x.style.display === "none") {
x.style.display = "block";
} else {
x.style.display = "none";
}

var x = document.getElementById("lineChartAvgDLDataRate");
if (x.style.display === "block") {
x.style.display = "none";
} else {
x.style.display = "block";
}

}
</script>-->





<!-- close page content -->

@endsection
