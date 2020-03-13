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
  <img class="wave1" src="img/wave.png">
	<img class="wave" src="img/wave.png">
	<div class="container">

		<div class="login-content">
			<form action="index.html">
				<img src="img/avatar.svg">
				<h2 class="title" id="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input"  required="">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" id="pwd"  required="">
            	   </div>
                  <div class="i">
                     <i class="fa fa-eye" id="eye"></i>
                   </div>
            	</div>

            	  <div class="forgot-remember">
                
                <label class="control control-checkbox">Remember me
                        <input type="checkbox" />
                              <div class="control_indicator"></div>
                </label>
                    <div class="forgot">
                            <!-- <a href="" onclick="confirm();">Forgot Password?</a> -->
                            <p class="forgot" onclick="confirm();">Forgot Password</p>
                    </div> 
                </div>

            	
              <input type="submit" class="btn" value="Login">
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