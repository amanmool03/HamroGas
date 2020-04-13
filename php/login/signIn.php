
<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/signin.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
    function confirm(){
              Swal.fire({
                  title: 'Are you sure?',
                  text: "Do you sure want to go to recover page??",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Recover now'
                }).then((result) => {
                  if (result.value) {
                   // 
                    window.location.href = ('forget.php');
                  }
                   // 
                })

    }
  </script>

</head>
<body>


<?php
if(isset($_COOKIE["member_login"])){	
	if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $_COOKIE["member_login"];
	echo "<script>window.location='php/admin/index.php';</script>";
	exit;
}
if(isset($_POST['add_deliveryBoy'])){
	// echo "Nepal";exit;
	$u = $_POST['username'];
	$p = md5($_POST['password']);

// echo "$u.$p";exit();

	$sql = "SELECT * FROM `delivery_boy` WHERE (`username`='$u') AND `password`='$p' AND `status`=1 AND `is_verified`=1;";
	//echo $sql;
	require_once('../admin/Connection.php');
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// echo "Login Successful";exit;
		if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $u;
		$row = mysqli_fetch_assoc($result);
		//echo "<pre>"; print_r($row);exit;
		$_SESSION['u_id'] = $row['id'];
		if(!empty($_POST["remember_me"])) {
				setcookie ("member_login",$_POST["username"],time()+(60 * 60)); /* expire in 1 hour */
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
			}
		
    		if($row['user_type']=="admin")
   			 {
    			echo "<script>confirm();</script>";
    			echo "<script>window.location='../backend-admin/dashboard.php';</script>";
   			 }
        
          else
    		{
					echo "<script>Swal.fire(
            'Good job!',
            'Logged in succesfully',
            'success'
          ).then((result) => {
            if (result.value) {
             // 
              window.location.href = ('../backend-admin/dashboard.php');
            }
             // 
            })
      </script>";
			}		
       		
	}
	else{
		echo "<script>alert('Username or Password Incorrect!');</script>";
		echo "<script>window.location='signIn.php';</script>";
		exit;
	}


}
?>

  <img class="wave1" src="img/wave.png">
	<img class="wave" src="img/wave.png">
	<div class="container">

		<div class="login-content">
			<form action="" method="post">
				<img src="img/avatar.svg">
				<h2 class="title" id="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input"  required="" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" id="pwd"  required="" name="password">
            	   </div>
                  <div class="i">
                     <i class="fa fa-eye" id="eye"></i>
                   </div>
            	</div>

            	  <div class="forgot-remember">
                
                <label class="control control-checkbox">Remember me
                <input type="checkbox" name="remember_me" id="lf" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
                    <div class="control_indicator"></div>
                </label>
                    <div class="forgot">
                            <!-- <a href="" onclick="confirm();">Forgot Password?</a> -->
                            <p class="forgot" onclick="confirm();">Forgot Password</p>
                    </div> 
                </div>

            	
              <input type="submit" class="btn" value="Login" name="add_deliveryBoy">

             <span>Dont have an account?  <span><a href="signup.php" id="signupnow"> sign up now</a>
             <a href="../../index.php" id="signupnow">Back to Home</a>
            </form>
        </div>
            <div class="img">
      <img src="img/login.svg">
    </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>