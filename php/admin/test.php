<?php 

$conn = mysqli_connect('localhost','root','','notify');

$sql = "SELECT * FROM `delivery_boy`";

$result = mysqli_query($conn,$sql);

// if($conn)
// {
// 	echo "string";
// 	exit();
// }

if(mysqli_num_rows($result)>0)
{
	while($rows= mysqli_fetch_assoc($result))
	{
		
	?>
	<img src="images/<?= $rows['title']?>">
	<?php  
	}
}


?>
 