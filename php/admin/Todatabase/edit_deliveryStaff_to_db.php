   <?php
  $msg = "";
  $msg_class = "";
  $msg1="";
  $conn = mysqli_connect("localhost", "root", "", "notify");

 if($conn)
 {
  // echo "<br><br><br>string<br>";
  // exit();
 }

  if (isset($_POST['add_deliveryStaff'])) {
      
      $u= $_POST['user-name'];
      $name=$_POST['full-name'];
      $e = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $state = $_POST['state'];
      $zip = $_POST['zip_code'];
  //     echo "<br><br><br>string<br>";
  // exit();
        // print_r($_FILES["profileImage"];
        // exit();
        if (isset($_FILES["profileImage"]))
        {
          if($_FILES["profileImage"]["name"]==NULL)
          {
            $title = $prev_data['title'];
             $profileImageName = $title ;
             $flag=0;
            // echo "<br><br><br>".$title;
            // echo "<br><br><br>stringsad";
            // exit();
          }
          else
          {
            $title = $_FILES["profileImage"]["name"];
             $profileImageName = time() . '-' . $title ;
             $flag=1;
          }
          // echo "<br><br><br>string".$_FILES["profileImage"]["name"];
          // exit();
        }

   
    $file_ext=strtolower(end(explode('.',$title)));

    // echo "<br><br>".$profileImageName;
    // exit();
    
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
        $msg = "Image Extension should be either jpg or png";
        $msg_class = "alert-danger";

      }

    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 2097152) {
      $msg = "Image size should not be greated than 2mb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file) && $flag == 1) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // echo "string";
    // exit();

    // Upload image only if no errors
    if (empty($msg)) {       
       if($flag==1) 
       {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {

        $conn = mysqli_connect("localhost", "root", "", "notify");
             $sql = "UPDATE `delivery_boy` SET `title` = '$profileImageName',`name`='$name',`username`='$u',`email`='$e',`address`='$address',`city`='$state',`contact`='$phone' WHERE `id`='$user_id'";
// echo "<br><br >".$profileImageName;
// echo "<pre>";print_r($_FILES['profileImage']);exit;

        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          echo "<br><br>";
          die("Connection failed: " . mysqli_error($conn));
          $msg1 = "username or email already exist or unable to connect database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an error uploading the file";
        $msg = "alert-danger";
      }
    }
    else
    {
      $conn = mysqli_connect("localhost", "root", "", "notify");
             $sql = "UPDATE `delivery_boy` SET `title` = '$profileImageName',`name`='$name',`username`='$u',`email`='$e',`address`='$address',`city`='$state',`contact`='$phone' WHERE `id`='$user_id'";
// echo "<br><br >".$profileImageName;
// echo "<pre>";print_r($_FILES['profileImage']);exit;

        if(mysqli_query($conn, $sql)){
          $msg = "Profile updated pls refresh to see the updated results ";
          $msg_class = "alert-success";
          
        } else {
          echo "<br><br>";
          die("Connection failed: " . mysqli_error($conn));
          $msg1 = "username or email already exist or unable to connect database";
          $msg_class = "alert-danger";
        }
    }
    }
  }
 
?>