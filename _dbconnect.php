<?php

$server= "localhost";
$email = "root";
$password = "";
$database ="user";

$conn = mysqli_connect($server , $email, $password, $database);
 if($conn){
     echo " ";
 }
 else {
     die("Error". mysqli_connect_error());
 }

?>