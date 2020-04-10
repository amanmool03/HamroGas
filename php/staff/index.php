  <?php
// echo $_COOKIE["member_login"];exit;
if(empty($_SESSION)) // if the session not yet started
   session_start();

if(!isset($_SESSION['username'])) { 
  echo "<script>window.location='../login/staff_signIn.php';</script>";
  exit;
}
?>


<?php
include("include/header.php");
?>

<style type="text/css">
    .night
    {
      background: url("images/night.jpg") !important;
      background-position: center!important;
      background-repeat: no-repeat!important;
      background-size: cover!important;
      color: #fff!important;
    }
       .day
    {
      background: url("images/day.jpg") !important;
      background-position: center!important;
      background-repeat: no-repeat!important;
      background-size: cover!important;
      color: #fff!important;
    }
       .morning
    {
      background: url("images/morning.jpg") !important;
      background-position: center!important;
      background-repeat: no-repeat!important;
      background-size: cover!important;
      color: #fff!important;
    }
       .evening
    {
      background: url("images/evening.jpg") !important;
      background-position: center!important;
      background-repeat: no-repeat!important;
      background-size: cover!important;
      color: #fff!important;
    }

    .item
    {
      position: relative;
      border-radius: 20px;
    }
    .divTime
    {
      position: absolute;
      right: 4%;
      top: 30%;
      color: #fff;
      font-size: 28px;
 /*     height: 30px;
      width: 30px;
      background-color: red;*/
    }


</style>


<!-- for different time background -->
<script type="text/javascript">
    function fxn()
    {
      var d = new Date();
       var m = d.getMinutes();
        var s = d.getSeconds();
      var hrs = d.getHours();
     
      var h= d.getHours();
        h =checkhrs(h);
       m = checkTime(m);
       s = checkTime(s);
      var element = document.getElementById('weather');
      var greet =  document.getElementById('greeting');
      
      if(hrs<12)
      {
      element.classList.add('morning');
      greet.innerHTML="Good morning working early in the morning??? Anyways,";
      }
      else if(hrs<17)
      {
      element.classList.add('day');
      greet.innerHTML="Good day to work dont forget to take break.. Anyways,";
      }
      else if (hrs<19) 
      {
      element.classList.add('evening');
      greet.innerHTML="Good evening, its nice seeing sunset... Anyways,";
      }
      else{
      element.classList.add('night');
      greet.innerHTML="Having a long work till night huh??? Anyways,";
      }

        document.getElementById('time').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(fxn, 500);
    }

      function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
      }
      function checkhrs(i)
      {
       if(i>12)
        {
          i=i-12;
        }
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
        return i;
      }
  </script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Views'],
          
            <?php

              $conn = mysqli_connect("localhost","root","","graphs"); 


              $sql = "SELECT * FROM `view_stats` order by id desc LIMIT 0,10";

              $result = mysqli_query($conn,$sql);

              if(mysqli_num_rows($result)>0)
              {
                while($row = mysqli_fetch_assoc($result))
                {
              ?> 
                  ['<?= $row['date'];?>', <?= $row['page_views'];?> ],  

              <?php
                }
              }
            ?>  
          // ['2004',  1000,      400],
          // ['2005',  1170,      460],
          // ['2006',  660,       1120],
          // ['2007',  1030,      540]
          
        ]);

        var options = {
          title: 'Company Performance',
          pointSize: 10,
          colors: ['#1f975b'],
          curveType: 'function',
          legend: { position: 'bottom' },

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

  <div class="main_body" > 
    <div class="sidebar_menu">
          <div class="inner__sidebar_menu">

            <ul>
              <li >
                <a href="#" style="background: #5343c7; color: #fff;">
                  <span class="icon">
                    <i class="fas fa-border-all"></i></span>
                  <span class="list">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="charts.php">
                  <span class="icon"><i class="fas fa-chart-pie"></i></span>
                  <span class="list">Charts</span>
                </a>
              </li>

              <li>
                <a href="#">
                  <span class="icon"><i class="fas fa-address-card"></i></span>
                  <span class="list">About</span>
                </a>
              </li>
         
            </ul>

            <div class="hamburger">
              <div class="inner_hamburger">
                  <span class="arrow">
                      <i class="fas fa-long-arrow-alt-left"></i>
                      <i class="fas fa-long-arrow-alt-right"></i>
                  </span>
              </div>
          </div>

          </div>
      </div>

      <div class="container">

        <div class="item_wrap">
          <div class="item" id="weather" style="margin: 0; width: 100%; padding: 30px;">
            <div ><p> <span id="greeting"></span></p></div>
            <div ><h1 style="font-weight: 400">Welcome to the Dashboard</h1></div>
            <div class="divTime" id="time" style="font-weight: bold"></div>
          </div>
        </div>

        <div class="item_wrap">
          <div class="item1">
             <div class="part">
                
                <span><i class="fas fa-eye" style="font-size: 50px;"></i></span>
                <span>
                  <p style="margin-right: 30px; color: #0ebeff; font-size: 18px;">[ VIEWS ]</p>
                  <?php 
                    $conn = mysqli_connect('localhost','root','','notify');

                    if(!$conn)
                    {
                      die("couldnot connect").mysqli_error($conn);
                    }

                    $sql = "SELECT * FROM `view_stats`";

                    $result = mysqli_query($conn,$sql);
                    $total =0;
                    if(mysqli_num_rows($result)>0)
                    {
                      while($row= mysqli_fetch_assoc($result))
                      {
                        $total = $total + $row['page_views'];
                      }
                       echo "<p style='margin-left:-30px; font-size:25px;'>".$total."</p>";
                    }
                     ?>
                </span>
                
             </div>

             <div class="part">
                <span><i class="fas fa-users" style="font-size: 50px;"></i></span>
                <span>
                  <p style="margin-right: 30px; color: #0ebeff; font-size: 18px;">[ Staff ] </p>
                  <?php 
                    $conn = mysqli_connect('localhost','root','','notify');

                    if(!$conn)
                    {
                      die("couldnot connect").mysqli_error($conn);
                    }

                    $sql = "SELECT * FROM `delivery_boy`";

                    $result = mysqli_query($conn,$sql);
                    $total =0;
                    if(mysqli_num_rows($result)>0)
                    {

                       echo "<p style='margin-left:-30px; font-size:25px;'>".mysqli_num_rows($result)."</p>";
                    }
                     ?>
                </span>
             </div>
          </div>

          <div class="item2" >
            <div class="part"> 
             <span><i class="fas fa-user-check" style="font-size: 50px;"></i></span>
                <span>
                  <p style="margin-right: 0px; color: #0ebeff; font-size: 18px;">[ Available Staff ]</p>
                  <?php 
                    $conn = mysqli_connect('localhost','root','','notify');

                    if(!$conn)
                    {
                      die("couldnot connect").mysqli_error($conn);
                    }

                    $sql = "SELECT * FROM `delivery_boy` WHERE `status`=1";

                    $result = mysqli_query($conn,$sql);
                   
                     if(mysqli_num_rows($result)>0)
                    {

                       echo "<p style='margin-left:-30px; font-size:25px;'>".mysqli_num_rows($result)."</p>";
                    }
                     ?>
                </span>
            </div>
            <div class="part">
                <span><i class="fas fa-eye" style="font-size: 50px;"></i></span>
                <span>
                  <p style="margin-right: 30px; color: #0ebeff; font-size: 18px;">[ VIEWS ]</p>
                  <?php 
                    $conn = mysqli_connect('localhost','root','','notify');

                    if(!$conn)
                    {
                      die("couldnot connect").mysqli_error($conn);
                    }

                    $sql = "SELECT * FROM `view_stats`";

                    $result = mysqli_query($conn,$sql);
                    $total =0;
                    if(mysqli_num_rows($result)>0)
                    {
                      while($row= mysqli_fetch_assoc($result))
                      {
                        $total = $total + $row['page_views'];
                      }
                       echo "<p style='margin-left:-30px; font-size:25px;'>".$total."</p>";
                    }
                     ?>
                </span>
            </div>
          </div>
        </div>


             <div class="item_wrap">
          <div class="item" style="margin: 0; width: 100%; padding: 1px; height: 50vh;">
                   <div id="curve_chart" style="height:100%; width:100%;"></div>
          </div>
        </div>


      </div>
  </div>
</div>
  
<?= include("include/footer.php");?>



