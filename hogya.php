<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <script>
    </script>
    <title>Unsubscribed
    </title>
</head>

<body>
<?php
$email = $_SESSION['email'];
$emailV = $_GET['email'];
if ($email == $emailV) {
    $indexPage = "https://shavi1111.herokuapp.com/index.php";
    include '_dbconnect.php';
    $sql = "UPDATE `shavi` SET `active` = '0' WHERE `shavi`.`email` = '$email'";
    $sqldel = "DELETE FROM `shavi` WHERE `shavi`.`email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $resultDel = mysqli_query($conn, $sqldel);
    session_unset();
    session_destroy();
    if ($result) {
        header("Location : https://shavi1111.herokuapp.com/unsubscribe.php");
    }
    else {
        header("Location : https://shavi1111.herokuapp.com/index.php");
} 

}
?>

</body>

</html>