<?php 

// Include configuration file  
require_once 'config.php'; 
#--------------To insert the total quantity amount---------------
$gmail= @$_GET['id'];

require_once("DBConnect.php");

$sql1 = "SELECT * FROM `customer` WHERE `email`= '$gmail'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);
    
    $quantity=$row1['quantity'];
    $cid=$row1['customer_id'];
    //echo $row1['quantity'];
    // Convert price to cents 
    $itemPrice = ($itemPrice*$quantity*100); 
 //--------------------------------------------------------------
 
//-------itemname------
 $itemName = $row1['item']; 
//---------------------
$payment_id = $statusMsg = ''; 
$ordStatus = 'error'; 
 
// Check whether stripe token is not empty A
if(!empty($_POST['stripeToken'])){  
     
    // Retrieve stripe token, card and customer info from the submitted form data 
    $token  = $_POST['stripeToken']; 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $card_number = $_POST['card_number']; 
    $card_exp_month = $_POST['card_exp_month']; 
    $card_exp_year = $_POST['card_exp_year']; 
    $card_cvc = $_POST['card_cvc']; 
     
    // Include Stripe PHP library 
    require_once 'stripe-php/init.php'; 
     
    // Set API key 
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
     
    // Add customer to stripe 
    $customer = \Stripe\Customer::create(array( 
        'email' => $email, 
        'source'  => $token 
    )); 
     
    // Unique order ID 
    $orderID = strtoupper(str_replace('.','',uniqid('', true))); 

     
    // Charge a credit or a debit card 
    $charge = \Stripe\Charge::create(array( 
        'customer' => $customer->id, 
        'amount'   => $itemPrice, 
        'currency' => $currency, 
        'description' => $itemName, 
        'metadata' => array( 
            'order_id' => $orderID 
        ) 
    )); 
     
    // Retrieve charge details 
    $chargeJson = $charge->jsonSerialize(); 
 
    // Check whether the charge is successful 
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 
        // Order details  
        $transactionID = $chargeJson['balance_transaction']; 
        $paidAmount = $chargeJson['amount']; 
        $paidCurrency = $chargeJson['currency']; 
        $payment_status = $chargeJson['status']; 
         
        // Include database connection file  
        include_once 'dConnect.php'; 
         
        // Insert tansaction data into the database 
        $sql = "INSERT INTO orders(customer_id,name,email,card_number,card_exp_month,card_exp_year,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('".$cid."','".$name."','".$email."','".$card_number."','".$card_exp_month."','".$card_exp_year."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$paidAmount."','".$paidCurrency."','".$transactionID."','".$payment_status."',NOW(),NOW())"; 
        $insert = $db->query($sql); 
        $payment_id = $db->insert_id; 
         
        // If the order is successful 
        if($payment_status == 'succeeded'){ 
            $ordStatus = 'success'; 
            $statusMsg = 'Your Payment has been Successful!'; 
        }else{ 
            $statusMsg = "Your Payment has Failed!"; 
        } 
    }else{ 
        //print '<pre>';print_r($chargeJson); 
        $statusMsg = "Transaction has been failed!"; 
    } 
}else{ 
    $statusMsg = "Error on form submission."; 
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="../css/animate/animate.css">
    <title>payday</title>
</head>
<body>

<div class="container">
    <div class="status">
        <?php if(empty(!$payment_id)){ ?>
            <div class="row p-5">
            <div class="text-center mx-auto border border-light rounded-lg shadow-lg p-4 mb-2 ">
                <div class="text-center">
                    <img  id="preimage" class="img-fluid mt-3 rounded-circle animated zoomIn" src="images/tick.png" alt="" width="60" height="60" for="file" required="" border="2px">
                <h2 class="text-success animated flash delay-1s">Payment succesful!
                </h2>
                  
                </div>
                <hr class="mb-4 w-75">
<div class="lead text-muted">
    <h4>Product Information</h4>
  </div>
  <hr class="text-center mb-4 w-75">
  <div class="d-flex justify-content-between text-muted mb-3">
    <div class="px-3">NAME</div>
    
    <div class="px-3 "><?php echo $itemName; ?></div>
  </div>
  <div class="d-flex justify-content-between text-muted mb-3">
    <div class="px-3">PRICE</div>
    
    <div class="px-3 "><?php echo $itemPrice.' '.$currency; ?></div>
  </div>
  <hr class="text-center mb-4 w-75">
    <div class="d-flex justify-content-between text-danger mb-3 animated flash delay-2s">
    <div class="px-3"><h4>Amount Paid</h4></div>
    
    <div class="px-3"><h4><?php echo $paidAmount.' '.$paidCurrency; ?></h4></div>
  </div>
  </div>
 </div>
  </div>
 <?php }
        else{ ?>
            <div class="container px-5 pt-5 pb-3 my-auto">
            <div class=" border border-light rounded-lg shadow-lg text-center  p-5 mb-4 bg-white mx-auto my-auto" style="width:500px">
                <div class="text-center">
                    <img  id="preimage" class="img-fluid mt-3 rounded-circle animated zoomIn" src="images/dislike.jpg" alt="" width="120" height="120" for="file" required="" border="2px">
                <h2 class="text-dark mb-4 animated flash delay-1s">Payment Failed!
                </h2>
                <div class="text-danger">
                    Payment Verification failed.Please contact your payment provider.
                </div>
                
        </div>
    </div>
</div>
        <?php } ?>
    </div>
    <a href="../shop.php">
    <center>
          <input class="btn btn-success btn-lg mb-4 text-center" type="submit" name="add_order" value="HOME">
      </center></a>
</div>
</body>

    <!-- wow Js -->
 <script src="../js/wow/wow.min.js"></script>
<script type="text/javascript">
    new WOW().init();
</script>