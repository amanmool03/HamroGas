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


   <img class="wave" src="img/wave.png">
   <img class="wave1" src="img/wave.png">
   <div class="container">
      <div class="img">
         <img src="img/bg.svg">
      </div>
      <div class="login-content">

         <form action="index.php">
      
            <img src="img/avatar.svg">
            <h2 class="title">Welcome</h2>

            <select id="country"  name="country" 
                     style="width:80%;
                     color:#999;
                              padding: 12px 20px;
                              margin: 8px 0;
                              display: inline-block;
                              border: 1px solid #ccc;
                              border-radius: 4px;
                              box-sizing: border-box;" >
                              
                     <option value="DB">Delivery Boy</option>
                     <option value="Admin">Admin</option>
            </select>

            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <h5>Username</h5>
                  <input type="text" class="input" required="">
                  
               </div>
               
            </div>
  

    
        
        
            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <h5>Email</h5>
                  <input type="email" class="input" required="">
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>Password</h5>
                  <input type="password" class="input" id="pwd" required="">
               </div>
               <div class="i">
                  <i class="fa fa-eye" id="eye"></i>
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>confirm-password</h5>
                  <input type="password" class="input" id="pwd" required="">
               </div>
               <div class="i">
                  <i class="fa fa-eye" id="eye"></i>
               </div>
            </div>

            <div id="message">
               <h4 style="margin:3% 0%; font-weight: 100;">Password must contain the following</h4>
               <div id="letter" class="invalid">A <b>lowercase</b> letter</div>
               <div id="capital" class="invalid">A <b>capital (uppercase)</b> letter</div>
               <div id="number" class="invalid">A <b>number</b></div>
               <div id="length" class="invalid">Minimum <b>8 characters</b></div>
               <!-- </div>-->
            </div>


            <input type="submit" class="btn" value="Create">
            <span>Already have an account? <span><a href="signin.php" id="signupnow"> sign in now</a>
                  <a href="../../index.php" id="signupnow">Back to Home</a>
         </form>
      </div>
   </div>
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
   <script type="text/javascript" src="js/main.js"></script>

</body>

</html>