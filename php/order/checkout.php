<link rel="shortcut icon" href="fav.png" />
<?php
error_reporting(0);

if (isset($_POST['add_order'])) {
  // echo "Nepal";exit();
  $u = $_POST['first_name'];
  $e = $_POST['email'];
  $p = $_POST['last_name'];
  $a = $_POST['item'];
  $b = $_POST['purpose'];
  $c = $_POST['paymentMethod'];
  $d = $_POST['quantity'];
  $f = $_POST['phone_number'];
  $g = $_POST['image'];
  $h = $_POST['address'];

  $sql = "INSERT INTO `user` (`first_name`, `email`,`last_name`,`item`,`purpose`,`payment`,`quantity`,`phone_number`,`title`,`address`)
VALUES ('$u', '$e', '$p', '$a', '$b', '$c', '$d', '$f', '$g', '$h');";
//echo $sql;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hamrogas";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully.
  if($c=="COD")
     echo "<script>alert('COD');</script>";
  else
  {
// echo "<script>window.location:'../../stripe_integration_php';</script>";
header("Location: ../../stripe_integration_php"); 

  }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}


?>




<?php
error_reporting(0);
   if(isset($_FILES['image'])){
      // echo "<pre>";print_r($_FILES['image']);exit;
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be less than or equal to 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"files/".$file_name);  
         $sql = "INSERT INTO `user` (`title`) VALUES ('$file_name');";
         require_once("DBConnect.php");

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('File uploaded successfully!');</script>";
            echo "<script>window.location='checkout.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

         require_once("DBConnect.php");
        mysqli_close($conn);
         
      }else{
         print_r($errors);
      }
   }
?>
<?php
// echo "Nepal";exit();
require_once("DBConnect.php");

$sql = "SELECT * FROM `item` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM `item` WHERE 1 Limit 0, 10";
$result1 = mysqli_query($conn, $sql1);
 //$data = mysqli_num_rows($result);
 //echo "<pre>"; print_r($result); exit();
?>


<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/4.0/examples/checkout/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
       <link rel="stylesheet" href="css/bootstrap/bootstrap.css" />


    <title>Checkout example for Bootstrap</title>
     <!-- Bootstrap core CSS -->
    <link href="./Checkout example for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Checkout example for Bootstrap_files/form-validation.css" rel="stylesheet">
<!--Jquery link-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--Google Maps api-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyA3ovAd7G1vbAbnK40sYZid-zhBFmaf5rY"></script>
<script>
var searchInput = 'search_input';

$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
    });
	
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        document.getElementById('loc_lat').value = near_place.geometry.location.lat();
        document.getElementById('loc_long').value = near_place.geometry.location.lng();
		
        document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
        document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
    });
    $(document).on('change', '#'+searchInput, function () {
    document.getElementById('latitude_input').value = '';
    document.getElementById('longitude_input').value = '';
	
    document.getElementById('latitude_view').innerHTML = '';
    document.getElementById('longitude_view').innerHTML = '';
});
});
</script>  


  
  </head>

  <body class="bg-light">

    <div class="container">
 
 <div class="py-2 text-center">
        <h2>Checkout form</h2>
      </div>

      <div class="row"> 
        <div class="col-md-12 order-md-1">
          <form class="needs-validation" novalidate=""  method="POST" name="user" action="">
            <div class="row">
              <div class="col-md-12">
                 <label for="file"> <img class="mb-3 float-right" src="defaultimage.jpg" alt="" width="92" height="92" for="file" required="" border="2px">
                 <div class="invalid-feedback">
                  Valid photo is required.
                </div></label>
                 
                   <input type="file" name="image" required="required" style="visibility: hidden;" id="file" />
              </div>
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="first_name" placeholder="" value="" required="">
                <div class="invalid-feedback">
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="last_name" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <!-- <input type="text" class="form-control" name="address" placeholder="1234 Main St" required=""> -->
              <!-- <label>Location:</label> -->
    <input type="text" class="form-control" id="search_input" name="address" placeholder="Type address..." />
    <input type="hidden" id="loc_lat" />
    <input type="hidden" id="loc_long" />
    <br>
    <p>Click the button to get your current location.</p>
    <button onclick="getLocation()">Locate Me</button>
    <p id="demo"></p>
    <!--Pinning Location-->
<script>

var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script>
              
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="phone">Enter your phone number:</label>

<input type="tel" placeholder="98********" class="form-control" id="phone" name="phone_number"
       pattern="[0-9]{10}"
       required>
              <div class="invalid-feedback">
                Please enter your phone number.
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-4">
                <label for="item">Item</label>
                <select class="custom-select d-block w-100" name="item" required="">

            <?php
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    //$user_list = mysqli_fetch_assoc($result);
    // echo "<pre>"; print_r($user_list);exit;
    $i=0;
    while($row = mysqli_fetch_assoc($result1)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";

?>
                   
                   <option value="<?= $row["gas_name"];?>"><?= $row["gas_name"];?></option>
   <?php
    }   
} else {
    ?>
    <tr>
        <td colspan="3">No Record(s) found.</td>
    </tr>
    <?php
}
?>
<?php 
mysqli_close($conn);
?>

                </select>
             
              </div>
              <div class="col-md-4 mb-4">
                <label for="purpose">Purpose</label>
                <select class="custom-select d-block w-100" name="purpose" required="">

                  <?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    //$user_list = mysqli_fetch_assoc($result);
    // echo "<pre>"; print_r($user_list);exit;
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";

?>
                   
                   <option value="<?= $row["purpose"];?>"><?= $row["purpose"];?></option>
   <?php
    }   
} else {
    ?>
    <tr>
        <td colspan="3">No Record(s) found.</td>
    </tr>
    <?php
}
?>
<?php 
mysqli_close($conn);
?>                
                </select>
                <div class="invalid-feedback">
                  Please provide a purpose.
                </div>
              </div>
               <div class="col-md-4 mb-4">
              <label >Quantity <span class="text-muted"></span></label>
              <input type="number" class="form-control"  placeholder="1" required="" name="quantity" min="1" max="5">
              <div class="invalid-feedback">
                Please enter valid number.
              </div>
            </div>
            </div>
            
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            
              <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="COD" checked required>
            <label class="custom-control-label" for="credit">Cash On Delivery</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="Pay Online" required>
            <label class="custom-control-label" for="debit">Pay Online</label>
          </div>
           </div>

          
            <hr class="mb-4">
            <input class="btn btn-primary btn-lg btn-block mb-4" type="submit" name="add_order" value="Continue to checkout">
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Checkout example for Bootstrap_files/jquery-3.2.1.slim.min.js.download" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./Checkout example for Bootstrap_files/popper.min.js.download"></script>
    <script src="./Checkout example for Bootstrap_files/bootstrap.min.js.download"></script>
    <script src="./Checkout example for Bootstrap_files/holder.min.js.download"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  

</body></html>