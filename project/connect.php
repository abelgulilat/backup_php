<?php
// session_start();

$host = 'localhost';  
$username = 'php';   
$password = '123456789';       
$database = 'php'; 

$conn= mysqli_connect($host,$username,$password,$database);

if(!$conn)
{
    die("connection faild!".mysqli_connect_error());
}
else{
    echo "connected";
}

?>