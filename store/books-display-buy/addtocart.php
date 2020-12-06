<?php
   require "../../templates/storenav.php";
   require "../../backend/dbh.inc.php";
   require "../../backend/function.inc.php";
   if(isset($_GET["cartbid"])){
      $bid=$_GET["cartbid"];
      //check if the book is valid
      $bookdata = userBookData($conn,$bid);
      if($bookdata !== false){
        //adding the book to cart
        $book = ["bid" => $bookdata['bid']];
        addElementsCart($book);
        header("location:/store/books-display-buy/displaypage.php?bid=".$_GET["cartbid"]."");
      }else{
         header("location:/store/allbooks.php");
      }
   }
   if(isset($_GET['cartdelete'])){
      $index = $_GET['cartdelete'];
      if(deleteCartElement($index)) {
         header("location:/store/books-display-buy/viewcart.php?msg=success");
      }else{
         header("location:/store/books-display-buy/viewcart.php?msg=cantdelete");
      }
   }
   else{
      header("location:/store/books-display-buy/displaypage.php?bid=".$_GET["cartbid"]."");
   }
?>