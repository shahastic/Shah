<?php
// session_start();
?>

 <?php
include '_dbconnect.php';
// $email = $_SESSION['email'];

$emailV = $_GET['email'];
$tokken = $_GET['token'];

if ($email == $emailV && $tokken == $token) {
    // $indexPage = "https://shavi1111.herokuapp.com/index.php";
    $sql = "UPDATE `shavi` SET `active` = '0' WHERE `shavi`.`email` = '$email' AND `shavi` . `token` = '$token'";
    
    $sqldel = "DELETE  FROM `shavi` WHERE `shavi`.`email` = '$email' AND `shavi` . `token` = '$token'";
    
    $result = mysqli_query($conn, $sql);
    
    $resultDel = mysqli_query($conn, $sqldel);
    
    
    if ($result) {
       header("Location: abbbas.php");   }
    else{
        
    }
   

}
else{
    
}
?>
