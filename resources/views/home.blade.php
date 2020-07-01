@extends('layouts.GNAT')

@section('content')
      <!-- page content -->
        
        <!-- top tiles: this is the upper portion before the cards -->
          <div class=""> <!-- This is the title row -->
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1>GNAT Network Topology and Link Status <button class="btn btn-success" onclick="updateChart()">Update</button></h1>
                    <div class="clearfix"></div> <!-- adds a space so the line is below text -->
                  </div>

                </div>
              </div>
            </div>
          </div> <!-- This is the title row -->

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

              <div class="row"> <!-- row with thrid card-->
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
                        
                        <!-- content of the card -->    
                            <div class="x_content">
                                <canvas id="pieChartAvgULDataRate"></canvas>
                            </div>
                        <!-- content of the card -->
                        
                    </div>
                  </div>
                </div>

              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="x_panel">
                    <div class="x_title"> <!-- sets up the top menu of the card -->
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
                    </div> <!-- sets up the top menu of the card -->
                      
                   <!-- content of the card -->   
                        <div class="x_content">
                            <canvas id="lineChartTotalAvgULDelay"></canvas>
                        </div>
                  <!-- content of the card -->  
                      
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
                    
                <!-- content of the card -->    
                    <div class="x_content">
                      <canvas id="lineChartAvgDelayRate"></canvas>
                    </div>
                <!-- content of the card -->   
                    
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
                        
                            <!-- content of the card -->
                                <div class="x_content">
                                    <canvas id="pieChartAvgDelayDataRate"></canvas>
                                </div>
                            <!-- content of the card -->
                        
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
            
     <!-- close page content -->
<script src="build/js/GNATChartsBUTTONupdate.js"></script> <!--javascript written for the button update -->
@endsection
