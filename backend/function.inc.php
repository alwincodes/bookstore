<?php
//sign up validation functions
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

function invalidUid($uname){
  $result;
  if(!preg_match("/^[a-zA-Z0-9]*$/",$uname)){
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function invalidname($fname,$lname){
  $result;
  if(!preg_match("/^[a-zA-Z]*$/",$fname) && !preg_match("/^[a-zA-Z]*$/",$fname)){
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function invalidEmail($email){
  $result;
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function invalidphno($phno){
  $result;
  if(strlen($phno)!==10){
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function pwdMatch($pass,$rpass){
  $result;
  if($pass!==$rpass){
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}
// this fn return associative array if uname exists else it returns false
function uidExist($uname,$email,$conn){
  $sql = "SELECT * FROM users WHERE usersId = ? OR email = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt,"ss",$uname,$email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if($row = mysqli_fetch_assoc($resultData)){
    return $row;
  }
  else{
    $result = false;
    return $result;
  }
  return $result;
  mysqli_stmt_close($stmt);
}

function createUser($conn,$fname,$lname,$uname,$email,$phno,$pass){
  $sql = "INSERT INTO users (username,fname,lname,email,phoneno,userpass) VALUES (?,?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../signup.php?error=stmtfailed");
    exit();
  }
  $hashedpwd = password_hash($pwd,PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt,"ssssss",$uname,$fname,$lname,$email,$phno,$hashedpwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location:../index.php?error=signupdone");
}

//code to validate and login users

function emptyInputLogin($username,$password){
  $result;
  if(empty($username) || empty($password)){
   $result = true;
  }
  else{
   $result = false;
  }
  return $result;
}

function loginUser($conn,$username,$password){
  $uidExists = uidExist($username,$username,$conn);
   if($uidExists === false){
    header("location:../index.php?error=invalidlogin");
    exit();
  }
  $pwdhashed = $uidExists["userpass"];
  $checkPwd = password_verify($password,$pwdhashed);
  if($checkpwd === false){
    header("location:../index.php?error=invalidlogin2");
    exit();
  }
  else if($checkpwd === true){
     session_start();
     $_SESSION["uid"] = $uidExists["usersId"];
     $_SESSION["username"] = $uidExists["username"];
     header("location:../index.php?error=loginsuccess");
     exit();
  }
}