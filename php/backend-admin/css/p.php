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
    $name = $_POST['name'];
    $content = $_POST['content'];
    $stock=$_POST['stock'];
    if(in_array($file_ext,$extensions)=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }

   if($file_size > 2097152){
     $errors[]='File size must be less than or equal to 2 MB';
   }

   if(empty($errors)==true){
     move_uploaded_file($file_tmp,"image/".$file_name);
     
     include('../connection.php');
     $sql = "INSERT INTO gas_cylinders (`title`,`content`,`featured_image`,`stock`) VALUES ('$name','$content','$file_name','$stock')";
     require_once('../connection.php');
      
       if (mysqli_query($conn,$sql)) {

      echo "<script>alert('File uploaded successfully!');</script>";
      echo "<script>window.location='../product.php';</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

  }else{
   print_r($errors);
 }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="form.css">
  <style type="text/css">
    input[type=number],input[type=text],input[type=submit]{padding-top: 0.8%;padding-bottom: 0.8%;}
    input[type=file]{padding-top: 0.5%;padding-bottom: 0.5%;}
  </style>
  
</head>
<body>
	      <div class="modal-bg">
		<div class="modal">
			   <form action="" method="POST" enctype="multipart/form-data" >
			  
        <div style="display: flex;">
        <input type="text" name="name" required="required" placeholder="Enter name" />
        <input type="file" name="image" required="required"  />
        </div>
        
       <input type="text" name="content"  placeholder="Add content">   
       <input type="number" name="stock" required="required" placeholder=" No of Gas ">

       <button type="submit">Upload</button>
       <span class="modal-close">X</span>
     </form>
     <script type="text/javascript" src="../p.js"></script>
 </div>
</div>
</body>
</html>