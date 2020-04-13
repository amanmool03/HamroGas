<?php
$server = "localhost";
$username = "root";
$pwd = "";
$db = "hamrogas";

// Create connection
$conn = mysqli_connect($server, $username, $pwd, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}