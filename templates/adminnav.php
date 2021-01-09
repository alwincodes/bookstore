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
    else if ($auth!=0){
        header("location:/index.php");
    }
 }
else if(!isset($_SESSION["auth"] )){
    header("location:/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Admin</title>

    </script>
    <script src="../style/javascript/functions.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,200;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/style/styles.css">
</head>
<header class ="navigation">
        <ul>
        <h1 id="logo" style = "display:inline;"><a id="navlinks" href="./allbooks.php">Store Admin </a></h1>
          <li><a id="navlinks" href="../backend/logout.inc.php">Log out</a></li>
          <li><a id="navlinks" href="/admin/customers.php">Customers</a></li>
          <li><a id="navlinks" href="/admin/review.php">reviews</a></li>
          <li><a id="navlinks" href="/admin/unapprovedsellers.php">Un-approved Sellers</a></li>
          <li><a id="navlinks" href="/admin/sellers.php">Sellers</a></li>
          <li><a id="navlinks" href="/admin/allorders.php">Orders</a></li>
          <li><a id="navlinks" href="/admin/allbooks.php">All Books</a></li>
          </ul>  
</header>
<hr>
<body>
