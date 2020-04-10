
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
                <a href="map.php" style="background: #5343c7; padding:10px 35px; color: #fff;"> 
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

  <h1> Guide to embet the MAP</h1>

  <h4 style="font-weight: 200; margin-bottom: 25px;">&#8594; The map can be embeded using following steps:</h4>

  <p style="font-size: 18px; margin: 2px; margin-left: 50px;">
    1) Go to the link given <a href="https://www.google.com/maps/place/Khwopa+College+of+Engineering/@27.6709867,85.4370554,17z/data=!3m1!4b1!4m5!3m4!1s0x39eb055304880d2f:0x6bcd40f73cac409!8m2!3d27.670982!4d85.4392441"> click here!! </a>to go to the google map link.
  </p>
    <p style="font-size: 18px; margin-left: 50px; ">
    2) Search for the location and click on the share button as in the fig,
    <img src="images/help1.png" style="height: 400px; width: 60%; margin-top:10px;">
  </p>
      <p style="font-size: 18px;  margin-left: 50px;">
    3) Click on the embet option and copy only the http link as in fig and paste it in.
    <img src="images/help2.jpg" style="height: 400px; width: 60%; margin-top:10px;">
  </p>
   
 </div>

  </div>
</div>
  

<?= include("include/footer.php");?>



