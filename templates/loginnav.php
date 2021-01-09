<?php
session_start();
if(isset($_SESSION["auth"])){
  $auth = $_SESSION["auth"];
  if($auth === 2 ){
  header("location:/store/allbooks.php");
  }
  if($auth === 1 ){
      header("location:/seller/seller-dashboard.php");
  }
  if($auth === 0 ){
      header("location:/admin/allbooks.php");
  }
  if($auth === -1){
    header("location:/others/unapprovedsellerlogin.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>

    </script>
    <script src="/style/javascript/functions.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,200;1,300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
     <!--<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="/style/styles.css">
</head>
<header class ="navigation">
        <ul>
        <h1 id="logo" style = "display:inline;"><a id="navlinks" href="./index.php">Book Store </a></h1>
          <li><a id="navlinks" href="/signup.php">Sign-Up</a></li>
          <li><a id="navlinks" href="/index.php">Login</a></li>
          </ul>  
</header>
<hr>
<body>
