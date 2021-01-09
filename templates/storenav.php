<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT']."/backend/cartfunctions.inc.php");
if(isset($_SESSION["auth"])){
    $auth = $_SESSION["auth"];
    if($auth === 1 ){
        header("location:/seller/seller-dashboard.php");
    }
    if($auth === 0 ){
        header("location:/admin/allbooks.php");
    }
    else if($auth!=2){
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
    <title>Book Store</title>

    </script>
    <script src="/style/javascript/functions.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,200;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/style/styles.css">
</head>
<header class ="navigation">
          <div style="float:right" class="dropdown">
            <button class="dropbtn"><?php echo($_SESSION['username']); ?></button>
            <div class="dropdown-content">
                 <a id="navlinks" href="/store/books-display-buy/userorder.php"><b>Orders</b></a>
                 <a id="navlinks" href="/backend/logout.inc.php"><b>Log out</b></a>
              </div>
           </div>
        <ul>
        <h1 id="logo" style = "display:inline;"><a id="navlinks" href="/store/allbooks.php">Book Store </a></h1>
          <li><a id="navlinks" href="/store/books-display-buy/viewcart.php"><img style="width:30px" src="/images/assets/cart.png"><i style="text-align:center;display:inline-block;height:25px;width:25px;vertical-align: top;background-color:#bbb;border-radius:50%;padding:2px"><?php echo(nOfElementsCart()); ?></i></a></li>
          <li><a id="navlinks" href="/store/search.php">Search</a></li>
          <li><a id="navlinks" href="/store/categories.php">Categories</a></li>
          <li><a id="navlinks" href="/store/allbooks.php">All Books</a></li>
         </ul>  
</header>
<hr>
<body>