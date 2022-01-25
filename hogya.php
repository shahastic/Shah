<?php
// session_start();
?>

 <?php
include '_dbconnect.php';
// $email = $_SESSION['email'];

$emailV = $_GET['email'];

if ($email == $emailV) {
    // $indexPage = "https://shavi1111.herokuapp.com/index.php";
    $sql = "UPDATE `shavi` SET `active` = '0' WHERE `shavi`.`email` = '$email'";
    
    $sqldel = "DELETE  FROM `shavi` WHERE `shavi`.`email` = '$email'";
    
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
