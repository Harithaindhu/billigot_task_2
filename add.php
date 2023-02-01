<?php
require_once "conn.php";

$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$query="INSERT INTO userdata(name,email,username,password) VALUES('$name','$email','$username','$password')";
mysqli_query($conn,$query);
mysqli_close($conn);
?>