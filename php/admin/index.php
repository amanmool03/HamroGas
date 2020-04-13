<?php 
include_once('connection.php');
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Side Navigation Bar</title>
  
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


 <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
      margin-top:16px; 
    }
    .notify i{
      font-size: 22px;
      color: #2f2f2f;
    }
     .dropdown-toggle{
       color: #2f2f2f;
     }
  </style>
</head>
<body>

<div class="wrappers">

  <div class="top_navbar">
    <div class="logo">
      <a href="#">HamroGas</a>

    </div>
    <a href="#" class="nav-trigger"><span></span></a>
    <div class="top_menu">
      <div class="home_link">
        <a href="#">
          <span class="icon"><i class="fas fa-home"></i></span>
          <span>Home</span>
        </a>
      </div>
      <div class="right_info">
        <!-- <div class="icon_wrap">
          <div class="icon">
            <i class="fas fa-bell"></i>
          </div>
        </div>
        <div class="icon_wrap">
          <div class="icon">
            <i class="fas fa-cog"></i>
          </div>
        </div> -->

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
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      
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
      </div>
    </div>
  </div>

  <div class="main_body"> 
    <div class="sidebar_menu">
          <div class="inner__sidebar_menu">
            
            <ul>
              <li>
                <a href="#">
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
                <a href="#">
                  <span class="icon"><i class="fas fa-address-card"></i></span>
                  <span class="list">About</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fab fa-blogger"></i></span>
                  <span class="list">Messages</span>
                </a>
              </li>
              <li>
                <a href="#">
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
        <div class="item_wrap">
          <div class="item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum omnis nihil aut aperiam adipisci suscipit ullam sunt saepe cupiditate quam distinctio officiis tempore laudantium, animi amet corrupti ratione est commodi! Sunt tempora quod magnam optio, reiciendis veritatis, necessitatibus eos molestias facilis reprehenderit maiores ipsum quaerat placeat laborum, a aspernatur corporis.</div>
          <div class="item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum omnis nihil aut aperiam adipisci suscipit ullam sunt saepe cupiditate quam distinctio officiis tempore laudantium, animi amet corrupti ratione est commodi! Sunt tempora quod magnam optio, reiciendis veritatis, necessitatibus eos molestias facilis reprehenderit maiores ipsum quaerat placeat laborum, a aspernatur corporis.</div>
        </div>
        <div class="item_wrap">
          <div class="item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum omnis nihil aut aperiam adipisci suscipit ullam sunt saepe cupiditate quam distinctio officiis tempore laudantium, animi amet corrupti ratione est commodi! Sunt tempora quod magnam optio, reiciendis veritatis, necessitatibus eos molestias facilis reprehenderit maiores ipsum quaerat placeat laborum, a aspernatur corporis.</div>
          <div class="item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum omnis nihil aut aperiam adipisci suscipit ullam sunt saepe cupiditate quam distinctio officiis tempore laudantium, animi amet corrupti ratione est commodi! Sunt tempora quod magnam optio, reiciendis veritatis, necessitatibus eos molestias facilis reprehenderit maiores ipsum quaerat placeat laborum, a aspernatur corporis.</div>
        </div>
        <div class="item_wrap">
          <div class="item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum omnis nihil aut aperiam adipisci suscipit ullam sunt saepe cupiditate quam distinctio officiis tempore laudantium, animi amet corrupti ratione est commodi! Sunt tempora quod magnam optio, reiciendis veritatis, necessitatibus eos molestias facilis reprehenderit maiores ipsum quaerat placeat laborum, a aspernatur corporis.</div>
          <div class="item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum omnis nihil aut aperiam adipisci suscipit ullam sunt saepe cupiditate quam distinctio officiis tempore laudantium, animi amet corrupti ratione est commodi! Sunt tempora quod magnam optio, reiciendis veritatis, necessitatibus eos molestias facilis reprehenderit maiores ipsum quaerat placeat laborum, a aspernatur corporis.</div>
        </div>
        <div class="item_wrap">
          <div class="item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum omnis nihil aut aperiam adipisci suscipit ullam sunt saepe cupiditate quam distinctio officiis tempore laudantium, animi amet corrupti ratione est commodi! Sunt tempora quod magnam optio, reiciendis veritatis, necessitatibus eos molestias facilis reprehenderit maiores ipsum quaerat placeat laborum, a aspernatur corporis.</div>
          <div class="item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum omnis nihil aut aperiam adipisci suscipit ullam sunt saepe cupiditate quam distinctio officiis tempore laudantium, animi amet corrupti ratione est commodi! Sunt tempora quod magnam optio, reiciendis veritatis, necessitatibus eos molestias facilis reprehenderit maiores ipsum quaerat placeat laborum, a aspernatur corporis.</div>
        </div>
      </div>
  </div>
</div>
  

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>



</html>




