
<?php
$gmail= @$_GET['id'];

//echo $gmail;
//echo $pay_type;

if (isset($_POST['add_code']))
{
    $u = $_POST['code'];
    //echo $u;

    require_once("DBConnect.php");
    $sql = "SELECT payment FROM `customer` WHERE `code`= '$u' and `email`='$gmail'";

  	$result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 // $data = mysqli_num_rows($result);
 // echo "<pre>"; print_r($result);


    if ($result->num_rows > 0) {
    // echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
  $p= $row["payment"];

  //echo $p;

  // output data of each row
      if($p=="COD")
      {
        header("Location: Cash_on_delivery.php?id=$gmail");
      }
      else{
    header("Location: orderpage.php?id=$gmail");
  }
  
} else {
    echo "<script>
        alert('Sorry,the code you provided is wrong.Please try again.');
        </script>";
         echo "<a href=demo.php?id=$gmail></a>";
}

  // setTimeout(window.location = 'demo.php?id=$gmail', 6000); 
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <!-- Trigger the modal with a button -->
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
           <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Please enter the code here.</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" novalidate="">
    <div class="form-group">
      <label for="code">Code:</label>
      <input type="number" class="form-control" id="code" placeholder="Enter code" name="code">
    </div>


    <center><button type="submit" class="btn btn-primary" name="add_code">Submit</button></center>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>

<script>
$(document).ready(function(){
   $("#myModal").modal();
});
</script>

</body>
</html>