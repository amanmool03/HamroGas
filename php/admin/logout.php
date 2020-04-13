<?php
if(empty($_SESSION)){
	session_start();
}

// include('DBConnect.php');

// $sql = "SELECT *  FROM `billing` WHERE  `is_verified`=1" AND u_;
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result)>0)
// {
// 	// echo "helli"; exit();
// $sql="UPDATE `billing` set 'is_verified'=0";
// $result = mysqli_query($conn, $sql);


// }

unset($_SESSION['username']);
unset($_SESSION['u_id']);
setcookie ("member_login","");
session_destroy();




header("Location: ../../index.php");
exit;
?>