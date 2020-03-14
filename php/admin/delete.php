<?php 
include_once('connection.php');

if(isset($_GET['id']))
{
	$delete_id = $_GET['id'];

	$sql = mysqli_query($conn,"DELETE FROM message WHERE id = '$delete_id'");
	if($sql)
	{
		header('location: read_msg.php');
	}
	else
	{
		echo mysqli_error($conn);
	}


}


 ?>