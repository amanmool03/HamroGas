<?php
include("include/header.php");

?>

</style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Views'],
          
          <?php

          $conn = mysqli_connect("localhost","root","","notify"); 

          $sql1= "SELECT * FROM `view_stats`";
          $result1 = mysqli_query($conn,$sql1);
          $total = mysqli_num_rows($result1);
          $total = $total - 7;
          if($total<0){$total=0;}
  
          // $sql = "SELECT * FROM `view_stats` order by id desc LIMIT $total,7";
          $sql = "SELECT * FROM `view_stats` LIMIT $total,7";

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
          title: 'Recent 7 days stat of website visits',
          pointSize: 10,
          colors: ['#1f975b'],
          curveType: 'function',
          legend: { position: 'bottom' },
         

        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
          colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6']
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>


  <div class="main_body"> 
    <div class="sidebar_menu">
          <div class="inner__sidebar_menu">

            <ul>
              <li >
                <a href="index.php" >
                  <span class="icon">
                    <i class="fas fa-border-all"></i></span>
                  <span class="list">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="#" style="background: #5343c7; color: #fff;">
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
        <div class="item_wrap" style="height: 50%;">
          <div class="item" style=" width: 100%; padding: 5px; height: 50vh; ">

            <div id="curve_chart" style=" 
                      height:100%;
                      width:100%;              
          "></div>
          </div>

      </div>

         <div class="item_wrap" style="height: 50%;">
        
          <div class="item1" style=" margin-right: 1%; width: 48%; height: 50vh; background: #fff;">
             <div id="donutchart" style="width: 100%; height: 100%; "></div>
           
        </div>
          <div class="item1" style=" margin-left:1%;width: 48.2%; padding: 5px; height: 50vh; background: #fff;">
           
        </div>
      </div>

  </div>
</div>
  
<?= include("include/footer.php");?>



