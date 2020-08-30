<?php

if(isset($_POST["subject"]))

{

include("connect.php");

$name = mysqli_real_escape_string($conn, $_POST["subject"]);

$message = mysqli_real_escape_string($conn, $_POST["message"]);

$query = "INSERT INTO message(name,message)VALUES ('$name', '$message')";

mysqli_query($conn, $query);

}

?>