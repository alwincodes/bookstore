<?php
  ////fn to insert book review from the user 
  require "../../templates/storenav.php";
  include "../../backend/dbh.inc.php";
  include "../../backend/function.inc.php";

  $uid = $_SESSION["uid"];
  if(isset($_POST['reviewbt']) && isset($_GET['bid'])){
      $review = $_POST["review"];
      $bid = $_GET['bid'];
      if(!empty($review)){
          if(strlen($review)>100){
            if(postMyReviewCustomer($conn,$uid,$bid,$review)) {
                header("location:/store/books-display-buy/displaypage.php?bid=".$bid."");
            }else{
              header("location:/store/books-display-buy/displaypage.php?bid=".$bid."");
            }
          }else{
            header("location:/store/books-display-buy/displaypage.php?bid=".$bid."");
          }
      }else{
        header("location:/store/books-display-buy/displaypage.php?bid=".$bid."");
      }
  }else{
    header("location:/store");
  }
 if(isset($_GET["deleterev"]) && isset($_GET['bid'])){
     $bid=$_GET['bid'];
     $deleteid = $_GET['deleterev'];
     if(customerDeleteReview($conn,$deleteid)) {
        header("location:/store/books-display-buy/displaypage.php?bid=".$bid."");
     }
 }