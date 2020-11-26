<?php
require "../templates/adminnav.php";
require "../backend/function.inc.php";
require "../backend/dbh.inc.php";
if(isset($_GET["deletebookid"])){
    $deleteid = $_GET["deletebookid"];
    $status = admin_deletebooks($conn,$deleteid);
    if($status){
        header("location:./allbooks.php");
    }else{
        echo("<h4>something went wrong</h4>");
    }
}

else{
    echo("lol");
}
