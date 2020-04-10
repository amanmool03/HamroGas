<?php 

error_reporting(0);

$conn = mysqli_connect('localhost','root','','notify');

if(!$conn)
{
	die("couldnot connect to the server ").mysqli_error($conn);
}

$date = date("Y-m-d");
$sql = "SELECT * FROM `view_stats` WHERE `date`='$date' ";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0)
{
	$insert_sql = "INSERT INTO `view_stats` (`date`) VALUE ('$date') ";
	mysqli_query($conn,$insert_sql);
}
else
{	
	$sql = "SELECT * FROM `view_stats` WHERE `date`='$date' ";
	$result = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_assoc($result))
	{
		$current_count= $row['page_views'];
		// echo $current_count;
		$new_count=$current_count + 1;
		$update_sql = "UPDATE `view_stats` SET `page_views`=$new_count WHERE `date`='$date'";
		mysqli_query($conn,$update_sql);
	}
	
}
 ?>