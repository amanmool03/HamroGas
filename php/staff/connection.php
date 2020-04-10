<?php 


$conn = mysqli_connect('localhost','root','', 'notify' );

if($conn)
{
	echo "";
}
else{
	echo "There is a error" . mysqli_error($conn);
}


 ?>