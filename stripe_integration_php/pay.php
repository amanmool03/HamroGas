<?php
error_reporting(0);

if (isset($_POST['add_order'])) {
error_reporting(0);
   if(isset($_FILES['image'])){
     // echo "<pre>";print_r($_FILES['image']);echo "</pre>";
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }           
      
      if($file_size > 2097152){
         $errors[]='File size must be less than or equal to 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"files/".$file_name);

      }else{
         print_r($errors);
      }
   }

   if(isset($_FILES['image1'])){
      //echo "<pre>";print_r($_FILES['image1']);exit;
      $errors= array();
      $file_name1 = $_FILES['image1']['name'];
      $file_size1 =$_FILES['image1']['size'];
      $file_tmp1 =$_FILES['image1']['tmp_name'];
      $file_type1=$_FILES['image1']['type'];
      $file_ext1=strtolower(end(explode('.',$_FILES['image1']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext1,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size1 > 2097152){
         $errors[]='File size must be less than or equal to 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp1,"files/".$file_name1);

        
         
      }else{
         print_r($errors);
      }
   }
    $otp=random_int(100000, 999999); //This is one time password generator.

  // echo "Nepal";exit();
  $u = $_POST['first_name'];
  $e = $_POST['email'];
  $p = $_POST['last_name'];
  $a = $_POST['item'];
  $b = $_POST['purpose'];
  $c = $_POST['paymentMethod'];
  $d = $_POST['quantity'];
  $f = $_POST['phone_number'];
  $g = $file_name;
  $h = $_POST['address'];
  $i = $file_name1;
  $j = $otp;

  $sql = "INSERT INTO `user` (`first_name`, `email`,`last_name`,`item`,`purpose`,`payment`,`quantity`,`phone_number`,`profile`,`address`,`citizenship_card`,`code`)
  VALUES ('$u', '$e', '$p', '$a', '$b', '$c', '$d', '$f', '$g', '$h', '$i', '$j');";
//echo $sql;

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hamrogasm";

// Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully.


// // ---------To send an email-----------
// $message_body = "Use this code to confirm your order. :<br/><br/>" . $otp;
// require_once('phpmailer\otp-mail.php');
// $mail->MsgHTML($message_body);      

// // $mail->Body= "This is plain text email body";
// $mail->addAddress("manishagora52@gmail.com");
// $mail->SMTPDebug =0;

// if($mail->Send())
// {
//   echo "<script>alert('We have sent you an email to confirm your order.');</script>";
// }
// else
// {
//   echo "<script>alert('Error occured');</script>";
// }
// $mail->smtpClose();
// -----mail part close----



    if($c=="COD"){
     echo "<script>alert('Cash on delivery');</script>";
     header("Location: order_confirmcode.php?id=$e");
     //header("Location: Cash_on_delivery.php?id=$e");
   }
   else
   {
// echo "<script>window.location:'../../stripe_integration_php';</script>";
   //header("Location: ../../stripe_integration_php/index.php?id= $e"); 
     //header("Location: ../../stripe_integration_php/get_user.php?id= $e");
    // header("Location: orderpage.php?id=$e");
    header("Location: order_confirmcode.php?id=$e");
  }
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>

<?php
// echo "Nepal";exit();
require_once("DBConnect.php");

$sql = "SELECT * FROM `item` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM `item` WHERE 1 Limit 0, 10";
$result1 = mysqli_query($conn, $sql1);
$sql2 = "SELECT type FROM `item` WHERE 1 Limit 0, 10";
$result2 = mysqli_query($conn, $sql2);
 //$data = mysqli_num_rows($result);
 //echo "<pre>"; print_r($result); exit();
?>


<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/4.0/examples/checkout/ -->
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="sty.css">


  <title>Bootstrap</title>
  <style type="text/css">
    @media (max-width: 1992px)
{
   body{   
    background: url("images/statement1.jpg");
    background-size: cover;
    height: 110vh;
    width: 100%;
    z-index: -2;
    
}
}

@media (max-width: 768px)
{
   body{   
    background: url("images/statement1.jpg");
    background-size: cover;
    height: 110vh;
    width: 100%;
    z-index: -2;
    
}
}
@media (min-width: 0px) and (max-width: 576px)
{
   body{   
    background:none;
    }
}



</style>
</head>

<body class="bg-light">
  

  <div class="container padding bg-light my-5">

   <div class="py-2 text-center">
    <h2>Checkout form</h2>
    <hr class="mb-4 w-50">
  </div>

  
   <div class="col-md-12">
      <form class="needs-validation wow fadeInUp" data-wow-duration="2s" novalidate=""  method="POST" name="user" action="" enctype="multipart/form-data">
        <div class="row"> 
         <div class="col-md-4">
          <div class="mb-3 text-center" >
            <label for="file"> <img  id="preimage" class="img-fluid mt-3 rounded-circle" src="images/def.png" alt="" width="192" height="192" for="file" required="" border="2px" name="image">
            </label>
           
            <input type="file"  class="form-control" onchange="loadfile(event)" name="image" required="required" style="visibility: hidden;" id="file" />
            <div class="invalid-feedback">
              Valid photo is required.
            </div>
          </div>
          <hr class="mb-4 w-75">
          <div class="mb-3 text-center">
            <label for="file1"> <img  id="preimage1" class="mt-3 img-thumbnail" src="images/citi.png" alt="" width="222" height="142" for="file1" name="image1"required="" border="2px">
            </label>
            <input type="file"  class="form-control" onchange="loadfile1(event)" name="image1" required="required" style="visibility: hidden;" id="file1" />
            <div class="invalid-feedback">
              Valid citizenship photo is required.
            </div>
          </div>  

      </div>
      <div class="col-md-8 py-2 mb-4  mx-auto border border-light">
       <div class="container-sm bg-light px-5 py-2 border border-light rounded-lg shadow-lg"> 
        <div class="row text-muted">  
          <div class="col-md-6 mb-3">
            <label for="firstName" class="text-muted">First name</label>
            <input type="text" class="form-control form-control-sm" name="first_name" placeholder="" value="" required="">
            <div class="invalid-feedback">Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control form-control-sm" name="last_name" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
     
        <div class="col-md-12 mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control form-control-sm" name="email" placeholder="you@email.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class=" col-md-12 mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control form-control-sm" name="address" placeholder="1234 Main St" required="">
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>


        
          <div class=" col-md-6 mb-3">
            <label for="phone">Phone number:</label>

            <input type="tel" placeholder="98********" class="form-control form-control-sm" id="phone" name="phone_number"
            pattern="[0-9]{10}"
            required>
            <div class="invalid-feedback">
              Please enter your phone number.
            </div>
          </div>
          <div class=" col-md-6 mb-3">
           <label for="type">Type</label>
           <select class="custom-select-sm  form-control form-control-sm " name="type" required="">

            <?php
            if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    //$user_list = mysqli_fetch_assoc($result);
    // echo "<pre>"; print_r($user_list);exit;
            
              while($row = mysqli_fetch_assoc($result2)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";

                ?>

                <option value="<?= $row["type"];?>"  ><?= $row["type"];?></option>
                <?php
              }    
            } else {
              ?>
              <tr>
                <td colspan="3">No Record(s) found.</td>
              </tr>
              <?php
            }
            ?>
            <?php 
            mysqli_close($conn);
            ?>

          </select>
        </div>
      

      
        <div class="col-md-4 mb-4">
          <label for="item">Item</label>
          <select class="custom-select-sm  form-control form-control-sm" name="item" required="">
            <?php
            if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    //$user_list = mysqli_fetch_assoc($result);
    // echo "<pre>"; print_r($user_list);exit;
            
              while($row = mysqli_fetch_assoc($result1)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";

                ?>
               
                <option value="<?= $row["gas_name"];?>">
            
                 <?= $row["gas_name"];?>
             
                  </option>
              
                <?php
              }   
            } else {
              ?>
              <tr>
                <td colspan="3">No Record(s) found.</td>
              </tr>
              <?php
            }
            ?>
            <?php 
            mysqli_close($conn);
            ?>

          </select>

        </div>
        <div class="col-md-4 mb-4">
          <label for="purpose">Purpose</label>
          <select class="custom-select-sm  form-control" name="purpose" required="" id="purpose" onchange="purposeSelected(this.value);">

            <?php
            if (mysqli_num_rows($result) > 0) {
    // output data of each row
    //$user_list = mysqli_fetch_assoc($result);
    // echo "<pre>"; print_r($user_list);exit;
              
              while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";

                ?>

                <option value="<?= $row["purpose"];?>"><?= $row["purpose"];?></option>
                <?php
              }   
            } else {
              ?>
              <tr>
                <td colspan="3">No Record(s) found.</td>
              </tr>
              <?php
            }
            ?>
            <?php 
            mysqli_close($conn);
            ?>                
          </select>
        
          <div class="invalid-feedback">
            Please provide a purpose.
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <label >Quantity <span class="text-muted"></span></label>

              <!-- <input type="number" id="quantity" class="form-control form-control-sm"  placeholder="1" required="" name="quantity" min="1" max="5"> -->
              <select class="custom-select-sm form-control" name="quantity" required="" id="quantity" >
              </select>
             
              <div class="invalid-feedback">
                Please enter purpose first.
              </div>
            </div>
        </div>
         
    


          <hr class="mb-4 w-100">

          <h4 class="col-md-12 mb-3">Payment</h4>


          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="COD" checked required>
              <label class="custom-control-label" for="credit">COD</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="Pay Online" required>
              <label class="custom-control-label" for="debit">Pay Online</label>
            </div>
          </div>


          
          <hr class="mb-4"><center>
          <input class="btn btn-danger btn-lg mb-4 text-center" type="submit" name="add_order" value="Continue to checkout">
      </center>
      </div>
    </div>
  </div>
        </form>
    </div>
      
    </div>

  

    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
     
          <script src="../js/jquery.js"></script>
  
   
    <script src="../js/easing/jquery.easing.1.3.js"></script>
    <!-- wow Js -->
    <script src="../js/wow/wow.min.js"></script>
 
    <script src="../js/app.js"></script>
    
      <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
     
      //Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
 
 <!-- --To pre-load images-- -->
    <script type="text/javascript">
      function loadfile(event)
      {
        var output=document.getElementById('preimage');
        output.src=URL.createObjectURL(event.target.files[0]);
      }
    </script>
    <script type="text/javascript">
      function loadfile1(event)
      {
        var output=document.getElementById('preimage1');
        output.src=URL.createObjectURL(event.target.files[0]);
      }
    </script>
  
  <!-- To manage the quantites of domestic and commercial purpose   -->
  <script type="text/javascript">
    var data = 
    {
        "domestic":[
            "2"
        ], 
        "comercial":[
            "2",
            "3",
            "4",
            "5"
        ]
    };

    var purposes = [ "domestic","comercial"];

    function purposeSelected(selected){       
        // get placeholder
        var quantity = document.getElementById("quantity");

        // first clear everything
        while(quantity.firstChild)
        {
            quantity.removeChild(quantity.firstChild);
        }

        // first node is always select individual
        createOption("1");

        // here we need to generate listbox
        for(i=0; i<data[selected].length;i++)
        {
            var a = data[selected][i];

            createOption(a);
        }
    }

    function createOption(value){
            // attribute storing color value
            c = document.createAttribute("value");
            c.value=value;

            // textnode for storing color value
            cText = document.createTextNode(value);

            // append attribute node
            option = document.createElement("option");
            option.setAttributeNode(c);

            option.appendChild(cText);

            // append child
            quantity.appendChild(option);
    }
</script>

<!-- ....To alert.... -->
<script>
  
  document.getElementById("demo").innerHTML = txt;

</script>  



  


  </body></html>