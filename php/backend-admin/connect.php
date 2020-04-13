<?php
	$conn=mysqli_connect('localhost','root','','hamrogas');
	if($conn)
	{
		echo " ";	
	}
	else
	{
		echo "connection failed".mysql_error($conn);
	}



  ?>