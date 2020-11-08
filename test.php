<?php
require_once "backend/function.inc.php";
require_once "backend/dbh.inc.php";
$pass= "12345";
$fname ="alwin";
$lname ="mathew";
$uname ="alwin69";
$email ="alwinshoot0@gmail.com";
$phno = "9446547305";
$hpass = createUser($conn,$fname,$lname,$uname,$email,$phno,$pass);
/*
$tpass='$2y$10$OC1aP0T3VuyNaWX437Dkbeeuou46kkJK/FQvj8HRnhYA5nR6DOkxS';
$hpass='$2y$10$CW6x3zYzvDSeAZCLRrlRTemQMkI4CngxpIJZ4fAA8LSbgYSLCfaEm';
$hashing=password_hash($pass,PASSWORD_DEFAULT);
echo($hashing);
*/
echo($hpass."<br><br>");
$verify=password_verify($pass,$hpass);
if($verify){
    echo("true");
}else{
    echo("false");
}
//testwas a success
?>