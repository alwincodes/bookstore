<?php
require "../templates/sellernav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
$auth =$_SESSION["auth"];
if(isset($_GET['bookid']) && isset($_GET['img'])){
    $bid=$_GET['bookid'];
    if(!sellerdelete($conn,$bid,$sellerid)) {
        echo("some error has occured can't delete please don't tamper with the url");
    }else{
        if(isset($_GET['img'])){
            $path="..".$_GET['img'];
            if(!unlink($path)){
               echo("unable to delete image");
            }else{
                echo("You're book has been deleted succesfully!");
            }
        }else{
            echo("error no image link");
        }
    }
}else{
    header("Location:./seller-dashboard.php");
}
