<?php

$showAlert = false;
$showError = false;
require "_dbconnect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
$email = $_POST["email"];

//Generate a random string.
$token = openssl_random_pseudo_bytes(16);
//Convert the binary data into hexadecimal representation.
$token = bin2hex($token);

$existsql = "SELECT * FROM `user` WHERE email = '$email'";
$result = mysqli_query($conn, $existsql);
$numExistRows = mysqli_num_rows($result);
if($numExistRows>0)
{
 $showError = "Email is already present<br>";
}
else
{

$sql = "INSERT INTO `user` (`sno`, `email`, `token`, `tstamp`, `active`) VALUES (NULL, '$email', '$token', current_timestamp(), '0');";
$result = mysqli_query($conn, $sql);
echo $result;
$showAlert = true;

}

if($result){
// $email = "shavi12345789@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi User, Click the given link to activate your email.. http://localhost/mail-xkcd/activate.php?token=$token";
$headers = "From: phpassignmail@gmail.com";

if (mail($email, $subject, $body, $headers)) {
    echo " Email successfully sent to $email...";
} 
else  
{
    echo "Email sending failed...";
}
}
else {
  echo "HI";
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>Subscribe Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.container {
  color:white;
}
    </style>
  </head>
  <body>
    
  <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="/mail-xkcd/index.php" method ="POST">
        <h3>Subscribe This XKCD Challenge</h3>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email">
            <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
        <button type="submit" class="btn btn-primary">Subscribe</button>
        <?php

if($showAlert)
 {
 echo " <div class='container'>
 <b>You Email is Sent. Please Verify your Email Address...</b>
</div>";
}

if($showError)
{
 echo " <div class='container'>
 <b>You Email is Not Sent. Enter your correct Email Address...</b>
</div>.$showError.";
}


    ?>
    </form>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
    </script>
  </body>
</html>