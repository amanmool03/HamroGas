


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	
     <!-- <link rel="stylesheet" href="css/style.css"> -->
     <style type="text/css">
     	body{
				  background: #e8edf5;
				  width: 100%;
				  height: 100%;
				}
     	#center
			{
			  position: absolute;
			  top: 50%;
			  left: 50%;
			  transform: translate(-50%,-50%);

			}
     </style>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <title>Hello, world!</title>
  </head>
  <body>
   
   	<!-- <div class="container" id="center">
   		<div class="row">
   			<div class="col-sm-4"></div>
   			<div class="col-sm-4">
   				
   					<form action="" method="post">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Name</label>
						    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Type your name" name="name">
						  </div>
							<div class="form-group">
						    <label for="exampleFormControlTextarea1">Enter Message</label>
						    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="msg"></textarea>
						  </div>
						  <button type="submit" name="send" class="btn btn-primary" >Submit</button>
					</form>
						   				
   			</div>
   			<div class="col-sm-4"></div>

   		</div>
   		
   	</div> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  </body>
</html>

<?php 
	
		include_once('connection.php');

		if(isset($_POST['send']))
		{
			// echo "connect";
			// exit;
		$name = $_POST['name'];
		$email = $_POST['email'];
		$msg = $_POST['msg'];
		$date = date('y-m-d h:i:s');
		$sql = mysqli_query($conn,"INSERT INTO message(name,email,message,cr_date) VALUES ('$name' ,'$email', '$msg' , '$date')");
		if($sql){
			// echo "<script>alert('message send succesfully');</script>";
				echo "<script>Swal.fire(
							  'Good job!',
							  'Message send succesfully',
							  'success'
							).then((result) => {
								if (result.value) {
								 // 
								  window.location.href = ('../../index.php');
								}
								 // 
							  })
					</script>";
				
		}
		else
		{
			echo"<script> Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Something went wrong!',
				footer:  mysqli_error($conn);
			  }).then((result) => {
				if (result.value) {
				 // 
				  window.location.href = ('../../index.php');
				}
				 // 
			  })</script>";
			
			
		}
}


 ?>