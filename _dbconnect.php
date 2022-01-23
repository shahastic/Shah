<?php

$server= "us-cdbr-east-05.cleardb.net";
$email = "b571a25d0907f8";
$password = "7c4e15d8";
$database ="heroku_e7f776ae5144e2a";

//mysql:b571a25d0907f8:7c4e15d8@us-cdbr-east-05.cleardb.net/heroku_e7f776ae5144e2a?reconnect=true

$conn = mysqli_connect($server , $email, $password, $database);
 if(!$conn){
    
     die("Error". mysqli_connect_error());
 }

?>