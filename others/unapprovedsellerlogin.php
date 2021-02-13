<?php
session_start();
if(isset($_SESSION["auth"])){
    $auth = $_SESSION["auth"];
    if($auth !== -1 ){
    header("location:/index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Seller</title>

    </script>
    <script src="../style/javascript/functions.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,200;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/style/styles.css">
</head>
<header class ="navigation">
        <ul>
        <h1 id="logo" style = "display:inline;"><a id="navlinks" href="./index.php">Book Store </a></h1>
          <li><a id="navlinks" href="">sorry!</a></li>
          <li><a id="navlinks" href="/backend/logout.inc.php">Log out</a></li>
          </ul>  
</header>
<hr>
<body>
<!--<img style = "height:300px;width:100%;text-align:center"src="/images/assets/dodge.jpg" alt=""> -->
<h2 style = "text-align:center">
 Looks like you have just created a seller account and its not yet verified by our admin panel so kindly wait, this will not take more than a day
</h2>