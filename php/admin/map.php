
<?php include("include/header.php"); ?>

  <div class="main_body"> 
    <div class="sidebar_menu">
          <div class="inner__sidebar_menu">

            <ul>
              <li>
                <a href="index.php">
                  <span class="icon">
                    <i class="fas fa-border-all"></i></span>
                  <span class="list">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="#" class="">
                  <span class="icon"><i class="fas fa-chart-pie"></i></span>
                  <span class="list">Charts</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fas fa-address-book"></i></span>
                  <span class="list">Contact</span>
                </a>
              </li>
              <li>
                 <button class="dropdown-btn" >   
                    <span class="icon"><i class="fas fa-truck-loading"></i></span>
                    <span class="list">Delivery staff</span>
                    <span class="down"><i class="fa fa-caret-down"></i></span>
                    
                  </button>

                  <div class="dropdown-container" >
                     <a href="add_deliveryStaff.php">
                      <span class="icon"><i class="fas fa-plus"></i></span>     
                      <span class="list">Add</span>
                    </a>
                      <a href="manage_deliveryStaff.php" >
                        <span class="icon"><i class="fas fa-cog"></i></span> 
                        <span class="list">Manage</span>
                      </a>
                  </div>
              </li>
                   <li>
                 <button class="dropdown-btn" >   
                    <span class="icon"><i class="far fa-comments"></i></span>
                    <span class="list">Message</span>
                    <span class="down"><i class="fa fa-caret-down"></i></span>
                    
                  </button>

                  <div class="dropdown-container activated"  >
                     <a href="displayMessage.php" >
                      <span class="icon"><i class="far fa-comments"></i></span>     
                      <span class="list">All messages</span>
                    </a>
                      <a href="unseenmsg.php"  >
                        <span class="icon"><i class="fas fa-cog"></i></span> 
                        <span class="list">Unseen Message</span>
                      </a>
                  </div>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fas fa-address-card"></i></span>
                  <span class="list">About</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fab fa-blogger"></i></span>
                  <span class="list">Blogs</span>
                </a>
              </li>
              <li>
                <a href="" style="background: #5343c7; padding:10px 35px; color: #fff;"> 
                  <span class="icon"><i class="fas fa-map-marked-alt"></i></span>
                  <span class="list">Maps</span>
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

  <!-- breadcrub ko lagi -->
  <nav aria-label="breadcrumb" style="margin-bottom: 25px;">
  <ol class="breadcrumb" style="background-color: #dce1e9;">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Maps</li>
  </ol>
</nav>

  <?php 
  error_reporting(0);
  if(isset($_POST['submit']))
  {
   $l = $_POST['location'];
   // echo $l;
   // exit();
     include('connection.php');
      $sql = "UPDATE map SET `location` = '$l'";
      $result = mysqli_query($conn,$sql);

      if($result)
      {
        header('location:map.php');
      }
      else
      {
        echo "error".mysqli_error($conn);
      }
  }

  ?>

  <div style="margin-bottom: 30px;">
    <p>Go to this link  <a href="">click here!!</a> and embet the location below to change <span><a href="map_embet_help.php" style="margin-left: 40%;">Need Help embedding</a></span></p>
    
    <form action="" method="POST">
    <input type="text" name="location" id="location" style="width: 50%; padding: 5px;">
    <input type="submit" name="submit" value="Change Location"  class="btn">

    </form>
  </div>
     <div class="google-map" id="g-map">
      <?php 
      include('connection.php');
      $sql = "SELECT * FROM map";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      echo $row['location'];
       ?>
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19987.121400533997!2d85.43470717174208!3d27.678442325326756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb055304880d2f%3A0x6bcd40f73cac409!2sKhwopa%20Engineering%20College!5e0!3m2!1sen!2snp!4v1579879608066!5m2!1sen!2snp" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen id="source"></iframe> -->
    </div>
   
 </div>

  </div>
</div>
  
<!--   <script type="text/javascript">
    var loc = 0 ;
    function fun()
    {

       loc = document.getElementById('location').value;
      // return loc;
      var element = document.getElementById('g-map');
      element.innerHTML = loc;
       document.getElementById('location').value = "";
    }
    function call()
    {
     return (loc);
    }
  </script> -->



  <style type="text/css">
    iframe{
      width: 100%;
      height: 650;
    }
      .btn {
  background-color: #4CAF50;
  color: white;
  padding: 5px;
  /*margin: 10px 0;*/
  border: none;
  margin-left: 1%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
  color: white;
}
  </style>

<?= include("include/footer.php");?>



