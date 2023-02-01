<?php
require_once "db.php";

$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$query="UPDATE  userdata SET name='$name', email='$email' ,username='$username',password='$password' WHERE id=$id";
mysqli_query($conn,$query);
mysqli_close($conn);
?>