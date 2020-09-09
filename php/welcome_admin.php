<?php 
  session_start();  
  if(!isset($_SESSION["admin"]))  
  {  
    session_destroy();
    header("location:index.php?action=login");  
  }  
  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="images/title-img.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="map.css">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    

    <!-- Head Data for Heatmap  -->
    
    <script src="for_times.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Map Stuff  -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"
    integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
    integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
    crossorigin="">
    </script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
    <link rel="stylesheet" href="map.css">
    <script src="QuadTree.js"></script>
    <script src="L.GridLayer.MaskCanvas.js"></script>

  <!-- Chart scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="./rand_colours.js" ></script>
    <script src="./usercharts.js"></script>

  </head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="container-fluid">
          <div class="row">
            <!-- sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
              <a href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">Admin Dashboard</a>
              <div class="bottom-border pb-3">
                
                <a class="text-white"><?php echo 'admin : '; echo $_SESSION["admin"]; ?></a>
                
              </div>
             <!-- - <ul class="navbar-nav flex-column mt-4">
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 current"><i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-chart-line text-light fa-lg mr-3"></i>Analytics</a></li>
                <li class="nav-item"><a href="Admin_DataOnMap\time.html" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-chart-bar text-light fa-lg mr-3"></i>Heatmap</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i>Charts</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas  text-light fa-lg mr-3"></i>Logout </a></li>
                  
              </ul> - -->
            </div>
            <!-- end of sidebar -->

           <!-- top-nav -->
           <div class="col-sm-12 d-flex justify-content-end">
            <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap  p-0">
              <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
      </ul>
    </nav>
            </div>
            </div>
            <!-- end of top-nav -->
          </div>
        </div>
      </div>
    </nav>
    <!-- end of navbar --> 
  </body>
<!-- Map Stuff  -->
  <body style="width:80%; float:right;">
    <div id="form_cont">
        <h3> Heatmap </h3>
        <form id="time_form">
            <div class="heatmap_row" >
                <div class ="form_col">
                    <label for="start-day"> Day </label>
                    <select name="start-day" id="start_day">
                        <!-- ! Note: 1=Sunday, 2=Monday, 3=Tuesday, 4=Wednesday, 5=Thursday, 6=Friday, 7=Saturday. SQL FUNCTION -->
                        <option value="" selected="None"></option>
                        <option value="2">Monday</option>
                        <option value="3">Tuesday</option>
                        <option value="4">Wednesday</option>
                        <option value="5">Thursday</option>
                        <option value="6">Friday</option>
                        <option value="7">Saturday</option>
                        <option value="1">Sunday</option>
                    </select>
                    <label for="end-day"> End Day (Optional) </label>
                    <select name="end-day" id="end_day">
                        <option value="" selected="None"></option>
                        <option value="2">Monday</option>
                        <option value="3">Tuesday</option>
                        <option value="4">Wednesday</option>
                        <option value="5">Thursday</option>
                        <option value="6">Friday</option>
                        <option value="7">Saturday</option>
                        <option value="1">Sunday</option>
                    </select>
                </div>
                <div class ="form_col">
                    <label for="start-month"> Month </label>
                    <select name="start-month" id="start_month">
                        <option value="" selected="None"></option>
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Aug</option>
                        <option value="9">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                    <label for="end-month"> End Month(Optional) </label>
                    <select name="end-month" id="end_month">
                        <option value="" selected="None"></option>
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Aug</option>
                        <option value="9">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                </div>
                <div class ="form_col">
                    <label for="start-year"> Year </label>
                    <select name="start-year" id="start_year">
                        <option value="" selected="None"></option>
                    </select>
                    <label for="end-year"> End Year (Optional) </label>
                    <select name="end-year" id="end_year">
                        <option value="" selected="None"></option>
                    </select>
                </div>
                <div class ="form_col">
                    <label for="start-time"> Time </label>
                    <select name="start-time" id="start_time">
                        <option value="" selected="None"></option>
                    </select>
                    <label for="end-time"> End Time (Optional) </label>
                    <select name="end-time" id="end_time">
                        <option value="" selected="None"></option>
                    </select>
                </div>
                <div class ="form_col">
                    <label for="activity-type"> Activity Types </label>
                    <select name="activity-type" class="selectpicker" id="activity_type" multiple>
                        <option value="EXITING_VEHICLE">EXITING_VEHICLE</option>
                        <option value="IN_BUS">IN_BUS</option>
                        <option value="IN_CAR">IN_CAR</option>
                        <option value="IN_FOUR_WHEELER_VEHICLE">IN_FOUR_WHEELER_VEHICLE</option>
                        <option value="IN_RAIL_VEHICLE">IN_RAIL_VEHICLE</option>
                        <option value="IN_ROAD_VEHICLE">IN_ROAD_VEHICLE</option>
                        <option value="IN_TWO_WHEELER_VEHICLE">IN_TWO_WHEELER_VEHICLE</option>
                        <option value="IN_VEHICLE">IN_VEHICLE</option>
                        <option value="ON_BICYCLE">ON_BICYCLE</option>
                        <option value="ON_FOOT">ON_FOOT</option>
                        <option value="RUNNING">RUNNING</option>
                        <option value="STILL">STILL</option>
                        <option value="TILTING">TILTING</option>
                        <option value="UNKNOWN">UNKNOWN</option>
                        <option value="WALKING">WALKING</option>
                    </select>
                </div>
            </div>
            <input id="query_submit" type="submit" value="Submit Query">
        </form>
        <!-- TODO in each admin login/logout delete the files. Or even in page refresh.  -->
        <a href="./results/results.json" download="query.json"> Download JSON </a>
        <a href="./results/results.xml" download="query.xml"> Download XML </a>
        <a href="./results/results.csv" download="query.csv"> Download CSV </a>
    </div>

    <div id="mapid" style="width:80%; float:right;">
        <script>
            var mymap = L.map('mapid').setView([38.230462, 21.753150], 13.2);
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXZyaXBpZGlzIiwiYSI6ImNrNm1sb25kZzBmdjQzaHJ1eDIzbWxscTUifQ.K0YS9MGl1aaZ8rnmlRAvmw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);
        </script>
    </div>
    <br style=line-height:34px;>
    <button onclick="deleting()"> Delete all data </button>
    <p id = "deleted"></p>
  </body>  
  <br style=line-height:600px; >
  <body>
    <h3 style= text-align:center;> Charts </h3>
    <div class="chart-container" style="float: left;  margin: auto; height:300px; width:500px">
        <canvas id="PerActType"></canvas>
    </div>
    
    <div class="chart-container" style="float: right; margin: auto; height:300px; width:500px">
        <canvas id="PerUserChart"></canvas>
    </div>
    
    <div class="chart-container" style=" float: left; margin : auto; height:300px; width:500px">
        <canvas id="PerMonthChart"></canvas>
    </div>

    <div class="chart-container" style=" float: right; margin: auto; height:300px; width:500px">
        <canvas id="PerDayChart"></canvas>
    </div>
    
    <div class="chart-container" style=" float: left; margin: auto; height:300px; width:500px">
        <canvas id="PerHourChart"></canvas>
    </div>

    <div class="chart-container" style=" float: right; margin: auto; height:300px; width:500px">
        <canvas id="PerYearChart"></canvas>
    </div>

  </body>

</body>
</html>






