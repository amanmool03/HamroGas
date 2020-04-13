<?php 


$conn = mysqli_connect('localhost','root','', 'hamrogas' );

if($conn)
{
	echo "";
}
else{
	echo "There is a error" . mysqli_error($conn);
}


 ?>