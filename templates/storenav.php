<?php
session_start();
if(!isset($_SESSION["uid"] )){
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>

    </script>
    <script src="../style/javascript/functions.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,200;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/styles.css">
</head>
<header class ="navigation">
        <ul>
        <h1 id="logo" style = "display:inline;"><a id="navlinks" href="../index.php">Book Store </a></h1>
          <li><a id="navlinks" href="../backend/logout.inc.php">Log out</a></li>
          <li><a id="navlinks" href="">Search</a></li>
          <li><a id="navlinks" href="">Categories</a></li>
          <li><a id="navlinks" href="">All Books</a></li>
          </ul>  
</header>
<hr>