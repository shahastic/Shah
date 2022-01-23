<?php
session_start();
include '_dbconnect.php';
require("vendor/autoload.php");
require_once("mailerphp/PHPMailer.php");
require_once("mailerphp/SMTP.php");
require_once("mailerphp/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
?>
  <?php
    $indexPage = "https://shavi1111.herokuapp.com/index.php";
	$email = $_SESSION['email'];
	$rand_comic = rand(0, 1000);
	$api_url    = 'http://xkcd.com/' . $rand_comic . '/info.0.json';
	$json_data = file_get_contents($api_url);
	$comic = json_decode($json_data);
	$title = 'Your New Comic : ' . $comic->safe_title;
	$name = $comic->title;
	$img = $comic->img;
	$subject = "$comic->title";
	$urlun = "https://shavi1111.herokuapp.com/unsubscribe.php?email=$email";
	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Host = "smtp.gmail.com";
	$mail->Port = "587";
	$mail->Username = "phpassignmail@gmail.com";
	$mail->Password = "php1123!!";
	$mail->setFrom("phpassignmail@gmail.com");
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject = "New Comic Arrived...";
	$mail->Body = '
  	          <p>Hello XKCDian</p>
  	          Here is your new comic.
  	          <h3>' . $comic->safe_title . "</h3>
  	          <img src='" . $comic->img . "' alt='some comic hehe'/>
			<br />
			To read the comic,  --> <a target='_blank' href='https://xkcd.com/" . $comic->num . "'>Click here</a><br /> 
			To Unsubscribe the Xkcd,  --> <a target='_blank' href='" . $urlun . "'>Click here</a><br />";
	$mail->addStringAttachment(file_get_contents($img), "$subject.jpg");
	if ($mail->send()) {
		header("Location: activate.php");
	} else {
		echo '<div class="container2">
        <div class="brand-title" style="color: red;">Error!!!</div>
        <br> <br> <br>
        <p>You have not subscribed to XKCD!!!</p>
        <br> <br> <br>
        <div class="inputs">
            <button type="submit" class="btn btn-primary"><a style="color: white; text-decoration: none;" href='.$indexPage.'>Subscribe</a></button>
        </div>
    </div>';
	}
	
	?>