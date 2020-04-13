<?php

include('connect.php');

if(isset($_POST['view'])){

// $con = mysqli_connect("localhost", "root", "", "notif");

if($_POST["view"] != '')

{
   $update_query = "UPDATE message SET status = 1 WHERE status=0";
   mysqli_query($conn, $update_query);
}

$query = "SELECT * FROM message ORDER BY id DESC LIMIT 5";
$result = mysqli_query($conn, $query);
$output = '';

if(mysqli_num_rows($result) > 0)
{

while($row = mysqli_fetch_array($result))

{

  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["name"].'</strong>:
  <small><em>'.$row["message"].'</em></small>
  </a>
  <hr>
  </li>

  ';
 
}
}

else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}


$status_query = "SELECT * FROM message WHERE status=0";
$result_query = mysqli_query($conn, $status_query);
$count = mysqli_num_rows($result_query);
 // echo 'Recent:';  echo ($count) echo '&nbsp&nbsp&nbspNotification';
 $data = array(
   'notification' => $output, 
   'unseen_notification'  => $count
);
echo json_encode($data);



}
?>