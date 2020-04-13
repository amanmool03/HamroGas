<?php
// echo $_COOKIE["member_login"];exit;
if(empty($_SESSION)) // if the session not yet started
   session_start();

if(!isset($_SESSION['username'])) { 
	echo "<script>window.location='../../index.php';</script>";
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>project	</title>
		<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
		<link rel="stylesheet" type="text/css" href="css/a.css">
		<script type="text/javascript" src="js/try4.js"></script>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="css/form.css">
		
	
		 
		 <!-- <script type="text/javascript" href="js/js.js"></script> -->

		
</head>
<body>
	<div class="main">
<?php include ('header.php')	 ?>
<?php include ('body.php')  ?>


</div>

</body>
</html>
