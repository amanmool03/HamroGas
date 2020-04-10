<?php 


$conn = mysqli_connect('localhost','root','','notify');

if(!$conn)
{
	die("couldnot connect").mysqli_error($conn);
}

$sql = "SELECT * FROM `view_stats`";

$result = mysqli_query($conn,$sql);
$total =0;
if(mysqli_num_rows($result)>0)
{
	while($row= mysqli_fetch_assoc($result))
	{
		$total = $total + $row['page_views'];
	}
	echo $total;
}
 ?>