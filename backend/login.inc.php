<?php
 if(isset($_POST["login"])){
   $username = $_POST["username"];
   $password = $_POST["password"];

   require_once "dbh.inc.php";
   require_once "function.inc.php";

   if(emptyInputLogin($username,$password) !== false){
    header("location:../index.php?error=emptyinput");
    exit();
   }
   loginUser($conn,$username,$password);
 }
 else{
     header("location:../index.php");
     exit();
 }