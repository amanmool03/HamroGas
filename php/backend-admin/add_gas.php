	<?php
// echo $_COOKIE["member_login"];exit;
if(empty($_SESSION)) // if the session not yet started
   session_start();

if(!isset($_SESSION['username'])) { 
	echo "<script>window.location='../php/form.php';</script>";
	exit;
}
?>
	
<?php
include("../php/DBConnect.php");
$sql="SELECT * FROM `files` WHERE 1 LIMIT 0,10";

$result=mysqli_query($conn,$sql);

 ?>



 <?php
error_reporting(0);
   if(isset($_FILES['image'])&&isset($_POST['add_car'])){

    $n=$_POST['name'];
    $p=$_POST['price'];
    $q=$_POST['quantity'];
    // echo "nepal".$p; exit();
      // echo "<pre>";print_r($_FILES['image']);exit;
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
        echo "<script>alert('Extension error');</script";
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";

      }
      
      if($file_size > 2097152){
         $errors[]='File size must be less than or equal to 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../files/".$file_name);

             include("../php/DBConnect.php");
            $sql = "INSERT INTO `files` (`title`,`name`,`price`,`quantity`) VALUES ('$file_name','$n','$p','$q');";
         

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('File uploaded successfully!');</script>";
            // echo "<script>window.location='upload_file.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        }
        mysqli_close($conn);
         
      }else{
         // print_r($errors);
        echo "<script>alert('Error uploading');</script";
      }
   }
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		
<style type="text/css">
  .content
  {
    width: 50%;
     

  }
  .content input,textarea
  {
    display: block;
    padding: 6px;
    margin: auto;
    margin-top: 12px;
    width: 90%;

  }
</style>



</head>


<body>

<div class="nav">
	<img src="../images/logo3.png" style="height: 68px; margin-left: 60px;">
	<h2>FOUR WHEEL RENTAL</h2>
		<span style="position: absolute; right: 1%;
			top: 8%;"><a href="../php/logout.php"><i class="fas fa-sign-out-alt" style="font-size: 25px; color: black;"></i></a><br>
			Welcome <?=ucwords($_SESSION['username']);?>!
				</span>
</div>

<div class="sidenav">
	<a href="#" style="background-color:#1b1e24; color: white; text-align: left; font-size: 13px; padding: 16px 5px;">MAIN NAVIGATION</a>
  <a href="index.php" ><i class="fas fa-home"></i>DashBoard</a>
    <button class="dropdown-btn"><i class="fas fa-users"></i>Users
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" >
    <a href="#"><i class="fas fa-user-plus"></i>Add users</a>
    <a href="manage_user.php" ><i class="fas fa-users-cog"></i>Manage users</a>
  </div>


<a href="manage_message.php" ><i class="fas fa-comments"></i>Messages</a>
    <button class="dropdown-btn" ><i class="fas fa-car"></i>Cars
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="display: block;">
   <a href="add_cars.php" id="active"><i class="fas fa-plus"  ></i>Add Cars</a>
    <a href="manage_cars.php" ><i class="fas fa-cog"></i>Manage Cars</a>
  </div>


  <a href="manage_clients.php"><i class="fas fa-users-cog"></i>Clients</a>


</div>

<div id="head">
	<h2>ADMIN | ADD CARS</h2>
	<p id="bread"><a href="index.php" style="padding-left: 10px;">Admin</a> &raquo; Add Cars</p>
</div>

<div class="main">
	<p style="color: #5b5b60 ; font-family: arial; font-size: 18px;">Add Cars</p>



<div style="overflow-x:auto;">
 
<div class="content">
<form action="" method="POST" enctype="multipart/form-data">

<input type="text" name="name" placeholder="Enter Car Name" required="required">

<input type="number" name="quantity" placeholder="Enter quantity of cars" required="required">
<input type="number" name="price" placeholder="Enter Price per hours" required="required">
<textarea placeholder="enter car description here...." style="height: 200px;"></textarea>

<p style="position: absolute; font-size: 13px; margin: 9px 28px;">(upload car photo)</p>
 <input type="file"  style="margin-top: 20px;" name="image" required="required" />
 <input type="submit" value="ADD CAR" name="add_car" />
</form>
</div>

</div>

</div>

<div class="foot">
	<p> &copy 2019 FWRS. All rights preserved </p>
</div>


<script src="index.js"></script>




</body>
</html>