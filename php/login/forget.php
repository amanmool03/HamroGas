<!DOCTYPE html>
<html>
<head>
    <title>Animated Login Form</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">

     <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/signup.css">


</head>
<body>
    
   <img class="wave1" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/forgot-password.svg">
        </div>
        <div class="login-content">
            <form action="signin.html" style="width: 400px !important;">
                <img src="img/recover.png">
                <h2 class="title" style="text-transform: none; margin: 0">Recover Password</h2>
                <p style="margin: 0px 0px 30px 0px;">Add e-mail to send link to reset your password</p>
              
                <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Email</h5>
                    <input type="email" class="input" required="">
                 </div>
              </div>
               
                <input type="submit" class="btn" value="Send link">
              <a href="signin.php" id="signupnow">Back to login</a>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>
</html>