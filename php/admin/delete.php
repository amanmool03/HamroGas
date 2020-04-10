<?php 
include_once('connection.php');

if(isset($_GET['mask']))
{
	// echo "string";
	// exit();
	$delete_id = $_GET['mask'];

	$sql = mysqli_query($conn,"DELETE FROM message WHERE id = '$delete_id'");
	if($sql)
	{
		header('location: displayMessage.php');
	}
	else
	{
		echo mysqli_error($conn);
	}


}


 ?>