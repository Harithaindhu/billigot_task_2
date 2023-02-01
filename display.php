<?php
require_once "db.php";
$data="SELECT * FROM userdata";
$value=$conn->query($data);
$i=1;
if($value){
    while($row=$value->fetch_assoc()){
        $id=$row['ID'];
        $name=$row['name'];
        $email=$row['email'];
        $username=$row['username'];
        $password=$row['password'];
        echo "<tr>
        <td>".$i."</td>
        <td>".$name."</td>
        <td>".$email."</td>
        <td>".$username."</td>
        <td>".$password."</td>
        <td>
        <button type='button' class='btn btn-primary' onclick='edit(".$id.",this)'>Edit</button>&nbsp;
        <button type='button' class='btn btn-danger' onclick='delete_user(".$id.")'>Delete</button>
        </td>
        </tr>";
        $i = $i + 1;
    }
}
$conn->close();
?>