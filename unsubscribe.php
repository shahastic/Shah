<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>TheMailer</title>
 
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
.only{
    width: 430px;
    height: 510px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.only .shape{
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
.button{
    margin-top: 30px;
    margin-left: 80%;
    width: 10%;
    background-color: #ffffff;
    color: #080710;
    padding: 10px 0;
    font-size: 20px;
    font-weight: 600;
    border-radius: 15px;
    cursor: pointer;
    
}

.container
{
    color: white;
    text-align: center;
    margin-top:240px;
}


body{
     padding: 0;
     margin: 0;
}
    </style>
</head>
<body>
    <div class="only">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
<h2> Ohhhh!! You have Unsubscribed Our Comic.</h2><br>
<h2> Now you are not able to read it again....</h2><br>
<h2> Subscribe again if you want to read it!....</h2><br>
<h3>Thank You!</h3>   

</div>
<a href="/mail-xkcd/index.php/"><button type="subscribe" class="button">Subscribe</button></a>
</body>
</html>