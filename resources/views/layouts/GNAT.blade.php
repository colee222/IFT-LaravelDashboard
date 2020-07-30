<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{csrf_token()}}"> <!-- a token for ajax-->


        <!--header-->
        <title>GNAT - IFT</title>
        <!--header-->

        <link rel="icon" href="/images/favicon.ico" type="image/ico">

        <!-- Bootstrap -->
        <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="/build/css/custom.min.css" rel="stylesheet">

        <!-- Datatables 

<link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"> -->


    </head>



    <!--TODO this is loading the fcn for the animation. Not ideal. Needs Cleaning -->    
    <body class="nav-md"> <!--on load execute a script once a web page has completely loaded all content (including images, script files, CSS files, etc.). initx() function is called for the GOJS GNAT topology and link status-->
        <div class="container body"> <!-- the whole body -->
            <div class="main_container">

                <!-- side menu: references a mustache template in the views folder for the left side menu-->    
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">

                            <a href="home" style="text-align: center;" class="site_title"><span>Basic User</span></a>

                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="images/img.jpg" alt="User Profile" class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2>{{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3></h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="home">Dashboard</a></li>

                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> QoS Statics <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="statsINLINE">Softflows QoS Statistics Inline JS</a></li>    <!-- This uses the js file for inline data collection-->
                                            <li><a href="statsOUTSIDE">Softflows QoS Statistics Outside JS</a></li>  <!-- This uses the js file for data collection with an outside js file-->
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-table"></i> Traffic Flows <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="trafficFlow">Traffic Flow Table</a></li>
                                            <li><a href="TFAnimation">Traffic Flow Animation</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-desktop"></i> About <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="about">What is GNAT?</a></li>
                                            <li><a href="chartFig">Charts &amp; Figures</a></li>
                                            <li><a href="contact">Contact Us</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-gears"></i> Settings <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="usrAcct">User Account</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>


                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <div>
                                <img src="images/img2.jpg" style="border-radius: 4px;" alt="IFT Logo">
                                </div>
                            
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <!--        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
</a> -->
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>
                <!-- side menu --> 

                <!-- top navigation: references a mustache template in the views folder for the -->
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <div class="row">
                            <div style="text-align: center;" class="col-md-10 col-sm-10"><h3>GNAT <small>by Intelligent Fusion Technology, Inc.</small></h3></div>
                            <div class="col-md-2 col-sm-2">
                                <nav class="nav navbar-nav">
                                <ul class=" navbar-right">
                                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                                        
                                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                            <img src="images/img.jpg" alt="">{{ Auth::user()->name }} <!-- this calles the logged in user name-->
                                        </a>
                                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                            
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out pull-right"></i> 
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <!--   <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a> -->
                                            </div>
                                           
                                        
                                    </li>

                                    <li role="presentation" class="nav-item dropdown open">
                                        <!--<a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
<i class="fa fa-envelope-o"></i>
<span class="badge bg-green">6</span>
</a>-->

                                </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /top navigation -->



                <!-- page content -->          
                <div class="right_col" role="main">



                    @yield('content')


                </div>
                <!-- page content -->          



                <!-- footer content -->
                <footer>
                    <div  class="pull-right">
                        GNAT - by <a href="i-fusion-i.com/">Intelligent Fusion Technology, Inc.</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div> <!-- main container wraps everything: below footer-->
        </div> <!-- the whole body: below footer -->



        <!-- jQuery -->
        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="/vendors/fastclick/lib/fastclick.js"></script>  
        <!-- NProgress -->
        <script src="/vendors/nprogress/nprogress.js"></script>
        <!-- jQuery Sparklines -->
        <script src="/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jQuery Smart Wizard 
<script src="/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>-->
        <!-- JQVMap -->
        <!-- Chart.js  -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gojs/2.1.2/go-debug.js"></script>



        <!-- Custom Theme Scripts -->
        <script src="/build/js/custom.min.js"></script>  

        <!-- IFT Script for connection animation-->
        <!-- IFT Custom Script --> 
        <!--<script src="build/js/GNATChartsREALTIMEupdateINLINE.js"></script> <!-- javascript written for the realtime -->
        <!-- IFT Custom Script -->  
        <script src="/build/js/GNATChartsBUTTONupdate.js"></script><!--javascript written for the button update -->
        <script src="/build/js/test.js"></script>


        <script> //this is a test to see if the ajax library is running. 

            jQuery(document).ready(function(){

                jQuery('#chart option').click(function(e){ //this references the datalist with id 'chart and looks for a selected option.
                    e.preventDefault();
                    //console.log("preventDefaultWorks"); //just a log to see if it works
                    //console.log($('meta[name="_token"]').attr('content')); // log to see if the token is called
                    jQuery.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    var value= $(this).attr('value');
                    //console.log(jQuery(this).attr('value')); //log to see if the variable is being properly assigned.

                    jQuery.ajax({
                        url: "{{ url('/home/selection') }}",
                        method: 'post',
                        data: { 
                            chartvalue: jQuery(this).attr('value'), 
                        },
                        datatype: 'json',

                        success: function(result){

                            //  var json_x = $.parseJSON(result);
                            console.log(result.success);
                            if (result.success === "a") {
                                jQuery('#pieChartAvgULDataRate').hide();
                                jQuery('#lineChartAvgDLDataRate').show();
                                jQuery('#avgValues').hide();
                                jQuery('#lineChartTotalAvgDLDataRate').hide();
                                jQuery("#resize").removeClass("col-md-8 col-sm-8").addClass( "col-md-12 col-sm-12" );
                            }  

                            if (result.success === "b") {
                                jQuery('#pieChartAvgULDataRate').show();
                                jQuery('#lineChartAvgDLDataRate').show();
                                jQuery('#avgValues').show();
                                jQuery('#lineChartTotalAvgDLDataRate').hide();
                                jQuery("#resize").removeClass("col-md-12 col-sm-12").addClass( "col-md-8 col-sm-8" );
                            } 

                            if (result.success === "c") {
                                jQuery('#lineChartTotalAvgDLDataRate').show();
                                jQuery('#pieChartAvgULDataRate').hide();
                                jQuery('#lineChartAvgDLDataRate').hide();
                                jQuery('#avgValues').hide();
                            }

                            //console.log(result.success);

                            // console.log({{ $key ?? '' }});
                        }
                    });




                });

            })        
        </script>


    </body>
</html>

