<?php
require_once "db.php";

$id=$_POST['id'];
$query="DELETE FROM userdata WHERE id=$id";
mysqli_query($conn,$query);
mysqli_close($conn);
?>