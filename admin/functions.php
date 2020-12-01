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

else{
    echo("lol");
}
