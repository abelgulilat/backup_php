<?php


include 'connect.php';
$password=12345;
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql="insert into adminsystem (username,password) values ('abel','$hashedPassword')";
if(mysqli_query($conn,$sql))
{
    echo "password set  ";
}
?>
