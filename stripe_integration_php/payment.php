<?php 
// Include configuration file  
require_once 'config.php'; 
 
$payment_id = $statusMsg = ''; 
$ordStatus = 'error'; 
 
// Check whether stripe token is not empty 
if(!empty($_POST['stripeToken'])){  
     
    // Retrieve stripe token, card and user info from the submitted form data 
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
     
    // Convert price to cents 
    $itemPrice = ($itemPrice*100); 
     
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
        include_once 'dbConnect.php'; 
         
        // Insert tansaction data into the database 
        $sql = "INSERT INTO orders(name,email,card_number,card_exp_month,card_exp_year,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('".$name."','".$email."','".$card_number."','".$card_exp_month."','".$card_exp_year."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$paidAmount."','".$paidCurrency."','".$transactionID."','".$payment_status."',NOW(),NOW())"; 
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

<div class="container">
    <div class="status">
        <?php if(!empty($payment_id)){ ?>
            <h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
			
            <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
            <p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
            <p><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?></p>
            <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
			
            <h4>Product Information</h4>
            <p><b>Name:</b> <?php echo $itemName; ?></p>
            <p><b>Price:</b> <?php echo $itemPrice.' '.$currency; ?></p>
        <?php }
        else{ ?>
            <h1 class="error">Your Payment has Failed</h1>
        <?php } ?>
    </div>
    <a href="../shop.php" class="btn-link">Back to HOME Page</a>
</div>