<?php 
include_once('connection.php');
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Side Navigation Bar</title>
  
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

 

  <script>
    $(document).ready(function(){
      $(".hamburger").click(function(){
        $(".wrappers").toggleClass("active")
      })
    });

    $(document).ready(function() {
  $('.nav-trigger').click(function() {
    $('.sidebar_menu').toggleClass('visible');
   });
     });
  </script>

  <style type="text/css">
  .wrappers a , span{
      text-decoration: none;
      list-style: none;
    }

    .notify{
      margin-top:28px; 
    }
    .admin{
       margin-top:16px; 
    }
    .notify i , .admin i{
      font-size: 22px;
      color: #2f2f2f;
    }
     .dropdown-toggle{
       color: #2f2f2f;
     }
     .dropdown-toggle::after
     {
      display: none;
     }

  </style>

  <style>

/* Fixed sidenav, full height */


/* Style the sidenav links and the dropdown button */
 .dropdown-btn {
   padding: 10px 35px ;
  text-decoration: none;
  list-style: none;
  font-size: 18px;
  color: #bbb;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}
.dropdown-btn:focus
{
  outline: none;
}



/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
  margin-top: 6px; 
}

</style>

<link rel="stylesheet" href="css/style.css">

</head>
<body onload="fxn();">

<div class="wrappers">

  <div class="top_navbar" style="z-index: 1;">
    <div class="logo">
      <a href="#">HamroGas</a>

    </div>
    <a href="#" class="nav-trigger"><span></span></a>
    <div class="top_menu">
      <div class="home_link">
        <a href="../../index.php">
          <span class="icon"><i class="fas fa-home"></i></span>
          <!-- <span>Home</span> -->
        </a>
      </div>
      <div class="right_info">

        <?php 
        $sql = mysqli_query($conn,"SELECT * FROM message WHERE status = 0");
        $count = mysqli_num_rows($sql);

         ?>


         <div class="notify">      
          <ul>
      <li class="dropdown">
        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell"></i> <span class="badge badge-danger" id="count"><?php echo $count; ?></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
      
             <?php 
                $sql = mysqli_query($conn,"SELECT * FROM message WHERE status = 0");
                if(mysqli_num_rows($sql)>0)
                {
                  while($result = mysqli_fetch_assoc($sql))
                  {
                       echo '<a class="dropdown-item text-primary text-center" href="read_msg.php?id='.$result['id'].'">'.$result['name'].' messaged you!'.'</a>';
                       echo ' <div class="dropdown-divider"></div>';
                  }
                }
                else
                {
                  echo '<a class="dropdown-item text-danger font-weight-bold" href="#">No messages</a>';
                }


             ?>

        </div>
      </li>
    </ul> 
        </div>



      <div class="admin" >      
      <ul>
      <li class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!-- <i class="fas fa-user-shield"></i> -->
          <img src="images/1585298137-ed.jpg" style="height: 30px; width: 30px; border-radius: 50%;">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
          <a class="dropdown-item"   href="#"><i class="fas fa-user" style="margin-right: 12px; font-size: 16px;" ></i>My Profile</a>
          <a class="dropdown-item" href="#"><i class="fas fa-file-invoice" style="margin-right: 12px; font-size: 16px;"></i>My Account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt" style="margin-right: 8px; font-size: 16px;"></i>Log out</a>
        </div>
      </li>
    </ul> 
        </div>


      </div>
    </div>
  </div>