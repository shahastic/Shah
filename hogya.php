<?php
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
            

    <title>Unsubscribed
        </title>
    </head>
    
    <body>
        <?php
include '_dbconnect.php';
$email = $_SESSION['email'];
echo $email;
$emailV = $_GET['email'];
echo $emailV;
if ($email == $emailV) {
    // $indexPage = "https://shavi1111.herokuapp.com/index.php";
    $sql = "UPDATE `shavi` SET `active` = '0' WHERE `shavi`.`email` = '$email'";
    
    $sqldel = "DELETE * FROM `shavi` WHERE `shavi`.`email` = '$email'";
    
    $result = mysqli_query($conn, $sql);
    echo $result ;
    $resultDel = mysqli_query($conn, $sqldel);
    
    session_unset();
    session_destroy();
    if ($result) {
       echo ' <div>
       <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="index.php" method="POST">
        <h3>The Comic Mailer</h3>

        <div class="form-group">
            <h4> Ohhhh!! You have Unsubscribed Our Comic.</h4><br>
            <h4> Now you are not able to read it again....</h4><br>
            <h4> Subscribe it again if you want to read it!....</h4><br>
            <h3>Thank You!</h3>
        </div>
        <button type="submit" class="btn btn-primary">Subscribe</button>

    </form> </div>' ;   }
    else{
        
    }
   

}
else{
    
}
?>

</body>

</html>