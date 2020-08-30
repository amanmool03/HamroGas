<?php 
// Include configuration file  
// Minimum amount is $0.50 US 
$gmail= @$_GET['id'];

require_once("dbConnect.php");

$sql = "SELECT * FROM `customer` WHERE `email`= '$gmail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//$data = mysqli_num_rows($result);
 //echo "<pre>"; print_r($result); 

$itemName = $row['item'];
// echo $itemName;
// echo "what";

$sql1 = "SELECT * FROM `item` WHERE `gas_name`= '$itemName'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$itemNumber = $row1['purpose']; 
// echo $itemNumber;
$itemPrice = 1375; 
$currency = "NPR";
?>
 <?php
// Stripe API configuration  
define('STRIPE_API_KEY', 'sk_test_bLuNu2qzeSYGD4ywtlZqOXFi00cfMEQPBJ'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_IZH7sHIUCP5uyD1uXVIqb2oI00NLbyPsKB'); 
 
// Database configuration  
// define('DB_HOST', 'localhost'); 
// define('DB_USERNAME', 'root'); 
// define('DB_PASSWORD', ''); 
// define('DB_NAME', 'hamrogasm');

?>
<!DOCTYPE html>
<html>
<head>

 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Pay Online page</title>
	<link rel="stylesheet" href="bootstrap/bootstrap.css" />
	<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="sty.css">
	<style>
		
	     h6,label
	     {
	     	color: grey;
	     }
	     label
	     {
            font-size: 80%;
	     }
	     span
	     {
	     	font-size: 85%;
	     }
	     input
	     {
	     	padding: 2%;
	     }
	     a, a:hover
	     {  
	     	color: white;
	     	text-decoration:none;
	     	

	     }
	     
  	@media  (min-width: 768px) and (max-width: 1992px)
{
	 body{   
    background: url("images/bb2.jpg");
    background-size: cover;
    height: 100vh;
    width: 100%;
    z-index: -2;
    
}
}

@media (min-width: 576px) and(max-width: 768px)
{
	 body{   
    background: url("images/bb2.jpg");
    background-size: cover;
    height: 100vh;
    width: 100%;
    z-index: -2;
    
}
}
@media (min-width: 0px) and (max-width: 576px)
{
	 body{   
    }
    
    .media img
    {
    	display: none;
    }
}




	</style>
</head>
<body>
	
	<div class="container padding my-5 bg-light ">
		<h1 class="text-center p-3">Checkout</h1>
		<hr size="1" class="w-100 mb-3">
	      
			<div class="row">
			<div class="col-md-6">
				<div class="row mx-5">
				<h4 class="mb-0">SHIPPING DETAILS</h4>
				<hr size="1" class="w-100 mb-3">
				<div class="col-md-5">
						<p><?= $row['first_name']; ?> <?= $row['last_name']; ?>
							<br>
							<?= $row['address']; ?>
							<br>
							<?= $row['phone_number']; ?>
							<br>
						</p>
					</div>
						<div class="col-md-7">
							<span><?= $row['email']; ?>
							</span>
						</div>
				<hr size="1" class="w-100 mb-3">
			</div>

			<div class="row mx-5">
				<h4 class="mb-0">PAYMENT DETAILS</h4>
				<hr size="1" class="w-100 mb-3">
				
        <form action="payment.php?id=<?= $gmail ?>" class="needs-validation wow fadeInUp" data-wow-duration="1s" method="POST" id="paymentFrm" novalidate="">
				<div class="col-md-12 mb-3">
                <label for="name">NAME</label>
                <input type="text" class="form-control form-control-sm" name="name" id="name_card" placeholder="Enter name" required=""  autofocus="">
                <div class="invalid-feedback">Valid  name is required.
            </div>
            </div>
              <div class="col-md-12 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="you@gmail.com" required=""  autofocus="">
                <div class="invalid-feedback">Valid email is required.
            </div>
            </div>
       
             
            <div class="col-12 mb-3">
                <label for="card_number">CARD NUMBER</label>
                <input type="text" class="form-control form-control-sm" name="card_number" id="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" required="">
                  <div class="invalid-feedback">Valid card number is required.
            </div>
            </div>
          
                
                    <div class="col-12 mb-3">
                        <label for="">EXPIRY DATE</label>
                        <div class="row">

	                        <div class="col-md-3 ">
	                            <input type="text" class="form-control form-control-sm" name="card_exp_month" id="card_exp_month" placeholder="MM" required="">
	                              <div class="invalid-feedback">Valid expiry month is required.
            </div>
	                        </div>
	                        <div class=" col-md-9 ">
	                            <input type="text" class="form-control form-control-sm" name="card_exp_year" id="card_exp_year" placeholder="YYYY" required="">
	                              <div class="invalid-feedback">Valid expiry year is required.
            </div>
	                        </div>
	                    </div>
                    </div>
               
                
                    <div class="col-12 mb-3">
                        <label>CVC CODE</label>
                        <input type="text" class="form-control form-control-sm" name="card_cvc" id="card_cvc" placeholder="CVC" autocomplete="off" required="">
                          <div class="invalid-feedback">Valid  cvc code is required.
            </div>
                    </div>
                
                    
                     <center> <button type="submit" class="btn btn-success mb-5 text-center" id="payBtn">Submit Payment</button></center>
                     </form>
                      </div>
                
                
			</div>	
			<div class="col-md-6">
				<div class="container">
				<h4>YOUR ORDER</h4>
				<hr size="1" class="w-100 mb-3">
        <div class="d-flex justify-content-between  mb-3">
    <div class="p-2 ">
      
      <div class="media">
  <img src="files/<?= $row['profile'] ?>" alt="John Doe" class="mr-2 img-thumbnail" height="100" width="100">
  <div class="media-body">
    <p><?= $row['item']; ?></p>
  </div>

</div>

</div>
    <div class="p-2 "><span class="rounded border border-success px-2 py-1"><?= $row['quantity']; ?></span></div>
    <div class="p-2 ">Rs.1000</div>
  </div>
				    
					
					
          
				
				<hr size="1" class="w-100 mb-3">
 <div class="d-flex justify-content-between text-muted mb-3">
    <div class="px-3">Subtotal</div>
    
    <div class="px-3 "><?php 
                        $stotal=($row['quantity'])*1000;
                    echo $stotal ?></div>
  </div>
  <div class="d-flex justify-content-between text-muted mb-3">
    <div class="px-3">Shipping</div>
    
    <div class="px-3 ">0</div>
  </div>
  <div class="d-flex justify-content-between text-muted mb-3">
    <div class="px-3">Total</div>
    
    <div class="px-3 "><b><?php echo "Rs.".$stotal ?></b></div>
  </div>

				

				
				<hr size="1" class="w-100 mb-3">
			</div>

				<center><button class="btn btn-danger mt-3 mb-3">
				<a href="checkout.php"> NOT YOUR ORDER</a></button></center>
			</div>
			</div>
				   
	</div>		
</body>
</html>

          <script src="../js/jquery.js"></script>
  
   
    <script src="../js/easing/jquery.easing.1.3.js"></script>
    <!-- wow Js -->
    <script src="../js/wow/wow.min.js"></script>
 
    <script src="../js/app.js"></script>
    
      <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
     
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
    <!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v2/"></script>


<!-- jQuery is used only for this example; it isn't required to use Stripe -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
// Set your publishable key
Stripe.setPublishableKey('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        // Enable the submit button
        $('#payBtn').removeAttr("disabled");
        // Display the errors on the form
        $(".payment-status").html('<p>'+response.error.message+'</p>');
    } else {
        var form$ = $("#paymentFrm");
        // Get token id
        var token = response.id;
        // Insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        // Submit form to the server
        form$.get(0).submit();
    }
}

$(document).ready(function() {
    // On form submit
    $("#paymentFrm").submit(function() {
        // Disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
		
        // Create single-use token to charge the user
        Stripe.createToken({
            number: $('#card_number').val(),
            exp_month: $('#card_exp_month').val(),
            exp_year: $('#card_exp_year').val(),
            cvc: $('#card_cvc').val()
        }, stripeResponseHandler);
		
        // Submit from callback
        return false;
    });
});
</script>