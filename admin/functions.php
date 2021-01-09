<?php
require "../templates/adminnav.php";
require "../backend/function.inc.php";
require "../backend/dbh.inc.php";
if(isset($_GET["deletebookid"]) && isset($_GET['img'])){
    $deleteid = $_GET["deletebookid"];
    $imgid=$_GET['img'];
    $status = admin_deletebooks($conn,$deleteid);
    if($status){
        $path ="..".$imgid;
        unlink($path);
        header("location:./allbooks.php");
    }else{
        echo("<h4>something went wrong</h4>");
    }
}
 if (isset($_GET["orderid"])){
    $oid =$_GET["orderid"];
    if(adminDeletOrder($conn,$oid)){
        header("location:/admin/allorders.php");
    }else{
        echo("<h4>something went wrong</h4>");
    }
 }
 if(isset($_GET["customerid"])){
    $customerid = $_GET['customerid'];
    if(adminDeleteCustomer($conn,$customerid)){
        header("location:/admin/customers.php");
    }else{
        echo("<h4>something went wrong</h4>");
    }
 }
 if(isset($_GET["sellerid"]) && isset($_GET["sellername"])) {
    $sellerid = $_GET['sellerid'];
    $sellername = $_GET['sellername'];
    if(adminDeleteCustomer($conn,$sellerid)){
         rmdir("../images/".$sellername);
        header("location:/admin/sellers.php");
    }else{
        echo("<h4>something went wrong</h4>");
    }
 }
 if(isset($_GET["approvesellerid"])) {
    $sellerid = $_GET['approvesellerid'];
    if(approveSeller($conn,$sellerid)){
        header("location:/admin/unapprovedsellers.php");
    }else{
        echo("<h4>something went wrong</h4>");
    }
 }
 if(isset($_GET["rid"])) {
    $rid = $_GET['rid'];
    if(customerDeleteReview($conn,$rid)){
        header("location:/admin/review.php");
    }else{
        echo("<h4>something went wrong</h4>");
    }
 }

 else{
    echo("lol");
 }
