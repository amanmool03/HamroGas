<?php 

 
// Stripe API configuration  
define('STRIPE_API_KEY', 'sk_test_bLuNu2qzeSYGD4ywtlZqOXFi00cfMEQPBJ'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_IZH7sHIUCP5uyD1uXVIqb2oI00NLbyPsKB'); 
  
// Database configuration  
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'hamrogas');

// Product Details 
// Minimum amount is $0.50 US 
$itemName = "GAS"; 
$itemNumber = "2"; 
$itemPrice = 1375; 
$currency = "NPR"; 