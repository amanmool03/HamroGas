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
      $password = md5($_POST['password']);
      $repassword = md5($_POST['re-password']);
  //     echo "<br><br><br>string<br>";
  // exit();
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
     $file_ext=strtolower(end(explode('.',$_FILES['profileImage']['name'])));
    
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
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // echo "string";
    // exit();

    // Upload image only if no errors
    if (empty($msg)) {       
        
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {

        $conn = mysqli_connect("localhost", "root", "", "notify");
             $sql = "INSERT INTO `delivery_boy` (`title`,`name`,`username`,`email`,`address`,`city`,`zip`,`contact`,`password`) VALUES ('$profileImageName','$name','$u','$e','$address','$state','$zip','$phone','$password')";
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
  }
 
?>