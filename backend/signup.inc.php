<?php

if(isset($_POST["signup"])){

   $fname = $_POST["firstname"];
   $lname = $_POST["lastname"];
   $uname = $_POST["username"];
   $email = $_POST["email"];
   $phno = $_POST["phno"];
   $pass = $_POST["password"];
   $rpass = $_POST["rpassword"];

   require_once "dbh.inc.php";
   require_once "function.inc.php";

   if(emptyInputSignup($fname,$lname,$uname,$email,$phno,$pass,$rpass) !== false){
    header("location:../signup.php?error=emptyinput");
    exit();
   }
   if(invalidUid($uname) !== false){
    header("location:../signup.php?error=invaliduid");
    exit();
   }
   if(invalidEmail($email) !== false){
    header("location:../signup.php?error=invalidemail");
    exit();
   }
   if(pwdMatch($pass,$rpass) !== false){
    header("location:../signup.php?error=passwordsdontmatch");
    exit();
   }
   if(uidExist($uname,$conn) !== false){
    header("location:../signup.php?error=usernametaken");
    exit();
   }

   createUser($conn,$fname,$lname,$uname,$email,$phno,$pass);

}else{

    header("location:../signup.php");
    exit();
}