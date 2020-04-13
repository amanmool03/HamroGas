<?php 
// Include configuration file  
require_once 'config.php'; 
?>
 <link rel="stylesheet" href="bootstrap/bootstrap.css" />
 <link href="./Checkout example for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Checkout example for Bootstrap_files/form-validation.css" rel="stylesheet">
<style type="text/css">
 .column
 {
    width: 50%;
 }  

</style>
<div class="container">
    <div class="py-2 text-center">
        <h2>Payment form</h2>
      </div>
  
        <!-- Display errors returned by createToken -->
        <div class="payment-status"></div>
		
        <!-- Payment form -->
        <form action="payment.php" method="POST" id="paymentFrm" class="border mx-5">
            <div class="row">
                      <div class="column pt-5 pl-5 pr-5 text-center">
                        <div class="">
                     <img class="text-center" src="visa.jpg" alt="" width="450" height="280" for="file" required="" border="2px">
                 </div>
    <div class="panel-heading">
        <h3 class="panel-title">Charge <?php echo '$'.$itemPrice; ?> with Stripe</h3>
        
        <!-- Product Info -->
        <p><b>Item Name:</b> <?php echo $itemName; ?></p>
        <p><b>Price:</b> <?php echo '$'.$itemPrice.' '.$currency; ?></p>
    </div>
</div>
              <div class="column">
            <div class="mb-3 ml-4 mr-4">
                <label >NAME</label>
                <input type="text" class="form-control"  name="name" id="name" placeholder="Enter name" required="" autofocus="">
            </div>
       
       
            <div class="mb-3 ml-4 mr-4">
                <label>EMAIL</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="">
            </div>
             
            <div class="mb-3 ml-4 mr-4">
                <label>CARD NUMBER</label>
                <input type="text" class="form-control" name="card_number" id="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" required="">
            </div>
          
                
                    <div class="mb-3 ml-4 mr-4">
                        <label>EXPIRY DATE</label>
                        <div class="mb-1">
                            <input type="text" class="form-control" name="card_exp_month" id="card_exp_month" placeholder="MM" required="">
                        </div>
                        <div class="mb-1">
                            <input type="text" class="form-control" name="card_exp_year" id="card_exp_year" placeholder="YYYY" required="">
                        </div>
                    </div>
               
                
                    <div class="mb-3 ml-4 mr-4">
                        <label>CVC CODE</label>
                        <input type="text" class="form-control" name="card_cvc" id="card_cvc" placeholder="CVC" autocomplete="off" required="">
                    </div>
                     <center> <button type="submit" class="btn btn-success" id="payBtn">Submit Payment</button></center>
        </form>
                </div>
                </div>
               
            
          


</div>
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