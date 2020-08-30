<?php 
// Include configuration file  
// Minimum amount is $0.50 US 
$gmail= @$_GET['id'];

require_once("dbConnect.php");

$sql = "SELECT * FROM `customer` WHERE `email`= '$gmail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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
	<style type="text/css">
		   a, a:hover
	     {  
	     	color: white;
	     	text-decoration:none;
	     }

	     @media (min-width: 0px) and (max-width: 576px)
{
   .container-sm{   
    width:300px;
    margin-left: auto;
    margin-right: auto;
    }
}

	</style>
			<body>
			<div class="text-center  p-5 mb-4 bg-white mx-auto" style="width:500px">	
				<div class="container-sm bg-light p-5 border border-light rounded-lg shadow-lg">
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
    <div class="p-2 "><span class="rounded border border-dark px-2 py-1"><?= $row['quantity']; ?></span></div>
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
			
  <div class="d-flex justify-content-between mb-3">
    <div class="p-2"><button class="btn btn-success mt-3 mb-3">
				<a href="checkout.php"> Ok</a></button></div>
    
    <div class="p-2"><button class="btn btn-danger mt-3 mb-3">
				<a href="checkout.php"> Cancel</a></button></div>
  </div>
		
				</div>
			</div>
			
		</body>
		</html>

