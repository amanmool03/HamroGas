<?php 
ob_start();
include "include/dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Bootstrap Css -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <title>ShopWithUs</title>
    <!--Favicon-->
    <link
      rel="icon"
      href="images/gas-cylinder.png"
      type="image/gif"
      sizes="16x16"
    />
    <!-- Custom css -->
    <link rel="stylesheet" href="css/shop_style.css" />
    <!--GoogleFonts-->
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet"> 
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Dancing+Script|Fredoka+One|Rajdhani|Roboto|Roboto+Condensed|Satisfy&display=swap"
      rel="stylesheet"
    />

    <!--Font Awsome Kit-->
    <script
      src="https://kit.fontawesome.com/c11802deb6.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>

  <body>
    <div class="popupalert" style="display: block; ">
      <div class="pop">
        <!-- <img src="images/logoLight.JPG" alt="advertise ho hai" /> -->
        <button class="close">X</button>
      </div>
    </div>
    <header>
    <?php include('include/nav.php');?>
    </header>

    <!--Banner Section-->
    	<section class="banner">
		<div class="container">
			<div class="row">
				<!-- <div class="col-sm-6">
					<h2>HAMRO GAS</h2>
					<p>Making Your Life Easier</p>
					
				
			</div> -->
			<div></div>
	</section>


    <div class="container">
    </div>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">Shop > Gas Cylinder</div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div
            id="carouselExampleControls"
            class="carousel slide"
            data-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <a href="https://bit.ly/2wp64vW">
                  <img
                    class="d-block w-100"
                    src="images/products/red.jpg"
                    alt="First slide"
                  />
                </a>
              </div>
              <div class="carousel-item">
                <a href="https://bit.ly/2wp64vW">
                  <img
                    class="d-block w-100"
                    src="images/products/product3.jpg"
                    alt="Second slide"
                /></a>
              </div>
            </div>
            <a
              class="carousel-control-prev"
              href="#carouselExampleControls"
              role="button"
              data-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="sr-only">Previous</span>
            </a>
            <a
              class="carousel-control-next"
              href="#carouselExampleControls"
              role="button"
              data-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <h2>Everest Gas 13.5L</h2>
          </div>
          <div class="row">
            <h1>रू 1350</h1>
            &nbsp; &nbsp;
            <h3><del>1500</del></h3>
            &nbsp; &nbsp;
            <h2 class="text-success">30% off</h2>
          </div>
          <div class="row">
            <h3 class="text-warning">
              <i class="fa fa-star" aria-hidden="true"></i
              ><i class="fa fa-star" aria-hidden="true"></i
              ><i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i
              ><i class="fa fa-star-o" aria-hidden="true"></i>
            </h3>
            &nbsp; &nbsp;
            <h5>1200 star rating and 250 reviews</h5>
          </div>
          <div class="row">
            <p>
              <i
                class="text-success fa fa-check-square-o"
                aria-hidden="true"
              ></i>
              <strong>Bank Offer</strong> 20% Instant Discount on SBI Credit
              Cards
            </p>
            <p>
              <i
                class="text-success fa fa-check-square-o"
                aria-hidden="true"
              ></i>
              <strong>Bank Offer</strong> 5% Unlimited Cashback on eSewa
            </p>
            <p>
              <i
                class="text-success fa fa-check-square-o"
                aria-hidden="true"
              ></i>
              <strong>Bank Offer</strong> Extra 5% off* with NabilBank Credit
              Card
            </p>
            <p>
              <i
                class="text-success fa fa-check-square-o"
                aria-hidden="true"
              ></i>
              <strong>Bank Offer</strong>20% Instant Discount on pay with
              Khalti
            </p>
          </div>
          <div class="row mt-4">
            <h3 class="text-info">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
            </h3>
            <p style="font-size: 20px">
              &nbsp; Delivery by July 1, Wednesday | &nbsp;
              <span class="text-success">FREE</span>
            </p>
          </div>

          <div class="row mt-4">  
            <h4>Seller: &nbsp; &nbsp;</h4>
            <p style="font-size: 18px">Hamro Gas</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
    
      <div class="row mt-5">
        <h2>Our Partner Brands</h2>
      </div>

      <div class="row mt-5">
      <?php 
        $sql="select * from gas_cylinders order by id DESC";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0)
        {
          while($row=mysqli_fetch_assoc($res))
          {               
        ?>
        

        <div class="col-md-3">
        
          <div class="card card-body " style="height:80% !important">
          
            <img
              class="card-img-top img-fluid"
              src="images/products/<?= $row['featured_image'];?>"
            />
            <div class="card-title">
              <h4><?php echo $row['title']?></h4>
            </div>
            <div class="card-text">
             <?php echo $row['content']?>
              <br /><br />
              <h4 class="card-title">Rs.<?php echo $row['exc_price']?><font style="font-family: 'Maven Pro', sans-serif;font-size:10px;">/ Exchange cylinder</font></h5>
              <h6 class="card-title">Rs.<?php echo $row['new_price']?><font style="font-family: 'Maven Pro', sans-serif;font-size:10px;">/ NEW cylinder</font></h4>
              <?php 
              if($row['stock']>10)
              { ?>
              <a class="btn btn-success text-light" href="php/order/checkout.php"> Buy Now</a> &nbsp;
            
          <?php }
          ?>
          <?php if($row['stock']<10&&$row['stock']>0)
              { ?>
              <a class="btn btn-warning text-light" href="php/order/checkout.php" > Limited Stock! Buy Now </a> &nbsp;
              <?php 
              }
              ?>
              <?php if($row['stock']<=0)
              { ?>
              <a class="btn btn-danger text-light"> Out Of Stock</a> &nbsp;
              <?php 
              }
              ?>    
              
              <br /><br />
            </div>
          </div>
        </div>
        <?php 
          }
        }

        ?>          
      </div>
    </div>







    <!---Gas geaser's-->
    <div class="container">
      <div class="row mt-5">
        <h2>Gas Stove's We suggest</h2>
      </div>
      <div class="row mt-5">
      <?php 
        $sql="select * from stove order by id ASC";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0)
        {
          while($row=mysqli_fetch_assoc($res))
          {              
        ?>

        <div class="col-md-3">
          <div class="card card-body" style="height:75% !important">
            <img
              class="card-img-top img-fluid"
              src="images/products/<?= $row['featured_image'];?>"
            />
            <div class="card-title">
              <h4><?php echo $row['title']?></h4>
            </div>
            <div class="card-text">
              <?php echo $row['content']?>
              <br /><br /></br>
              <?php 
              if($row['stock']>10)
              { ?>
              <a class="btn btn-success text-light"> Buy Now</a> &nbsp;
            
          <?php }
          ?>
          <?php if($row['stock']<10&&$row['stock']>0)
              { ?>
              <a class="btn btn-warning text-light"> Limited Stock! Buy Now </a> &nbsp;
              <?php 
              }
              ?>
              <?php if($row['stock']<=0)
              { ?>
              <a class="btn btn-danger text-light"> Out Of Stock</a> &nbsp;
              <?php 
              }
              ?>
              
              <br /><br />
            </div>
          </div>
        </div>
        <?php 
          }
        }

        ?>    

        
                
      </div>
    </div>
    <!--Review Section-->
    <div class="container mt-5 mb-5">
      <div class="row">
        <h2>Ratings & Reviews</h2>
      </div>

      <div class="row mt-5 mb-5">
        <div class="media" >
          <img src="images/review/r2.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:80px;">
          <div class="media-body">
            <h5 class="mt-0">
              Really appreciated.
              <span class="text-warning"
                ><i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
              </span>
            </h5>
            "You won't regret it. Thanks to delivery, we've just launched our
            5th resturant! I would like to personally thank you for your
            outstanding product." - Manisha .
          </div>
        </div>
      </div>

      <div class="row mb-5">
        <div class="media">
          <img src="images/review/r1.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:80px;">
          <div class="media-body">
            <h5 class="mt-0">
              Best service.<span class="text-warning"
                ><i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </span>
            </h5>
            "Totaly Satisfied with the service. Due to the fear of CORONA VIRUS I'haven't seen the daylight in a week and yet they delivered it to my doorstep. Realy appreciate the effort team HAMROGAS. PS: Still not coming out."-Aman Mool
          </div>
        </div>
      </div>

      <div class="row mb-5">
        <div class="media">
          <img src="images/review/r3.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:80px;">
          <div class="media-body">
            <h5 class="mt-0">
              Bad product dont take this<span class="text-warning"
                ><i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
              </span>
            </h5>
            "Had a very bad experience,couldnt deliver at time and was delayed for a week"-Manish 
          </div>
        </div>
      </div>

      <div class="row mb-5">
        <div class="media">
          <img src="images/review/r4.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:80px;">
          <div class="media-body">
            <h5 class="mt-0">
             Value For money<span class="text-warning"
                ><i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
              </span>
            </h5>
           "This is what everyone needs , ease at its best"-Zenish Prajapati
          </div>
        </div>
      </div>

      <div class="row mb-5">
        <h2>Post Your Own Reviews</h2>
      </div>

      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Enter email"
          />
          <small id="emailHelp" class="form-text text-muted"
            >We'll never share your email with anyone else.</small
          >
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <textarea
            type="text"
            class="form-control"
            id="exampleInputtextarea"
            placeholder="write your own reviews"
            rows="3"
          ></textarea>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" />
          <label class="form-check-label" for="exampleCheck1"
            >Check me out</label
          >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Advertisement Css-->
    <script src="js/shop.js"></script>
    <!-- <script>
      // $(document).ready(function() {
      //   setTimeout(function() {
      //     $("#popupalert").css("display", "block");
      //   }, 1000);
      // });
      $(".close").click(function() {
        $(".popupalert").css("display", "none");
      });
    </script> -->
  </body>
</html>
