<?php
function emptyInputSignup($fname,$lname,$uname,$email,$phno,$pass,$rpass){
    $result;
    if(empty($fname) || empty($lname) || empty($uname) || empty($email) || empty($phno) || empty($pass) || empty($rpass)){
      $result = true;
    }
    else{
      $result = false;
    }
    return $result;
}