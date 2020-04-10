<?php
// error_reporting(0);
   if(isset($_FILES['profileImage'])&&isset($_POST['add_deliveryStaff'])){

    // echo "<br><br><br>nepal".$p; exit();
      // echo "<pre>";print_r($_FILES['image']);exit;
      $errors= array();
      $file_name = $_FILES['profileImage']['name'];
      $file_size =$_FILES['profileImage']['size'];
      $file_tmp =$_FILES['profileImage']['tmp_name'];
      $file_type=$_FILES['profileImage']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['profileImage']['name'])));
      
// echo $n.$p;
      //     echo "<br><br><br>nepal".$p; 
      // echo "<pre>";print_r($_FILES['profileImage']);exit;

      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
          echo "<script>alert('Extension error');</script";
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";

      }
      
      if($file_size > 2097152){
         $errors[]='File size must be less than or equal to 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);

        include("connection.php");
         // echo "<br><br><br>nepal".$p; exit();
         $sql = "INSERT INTO `delivery_boy` (`title`) VALUES ('$file_name');";
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
