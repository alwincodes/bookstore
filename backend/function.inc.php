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
  $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
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
  mysqli_stmt_close($stmt);
}

function createUser($conn,$fname,$lname,$uname,$email,$phno,$pass){
  $sql = "INSERT INTO users (username,fname,lname,email,phoneno,userpass) VALUES (?,?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../signup.php?error=stmtfailed");
    exit();
  }
  $hashedpwd = password_hash($pass,PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt,"ssssss",$uname,$fname,$lname,$email,$phno,$hashedpwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location:../index.php?error=signupdone");
  return $hashedpwd;
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
  $checkPwd = password_verify($password, $pwdhashed);

  if($checkPwd === false){
    header("location:../index.php?error=invalidlogin");
    exit();
  }
  else if($checkPwd === true){
     session_start();
     $_SESSION["uid"] = $uidExists["usersId"];
     $_SESSION["username"] = $uidExists["username"];
     $_SESSION["fname"] = $uidExists["fname"];
     $_SESSION["lname"] = $uidExists["lname"];
     $_SESSION["phno"] = $uidExists["phoneno"];
     $_SESSION["email"] = $uidExists["email"];
     $_SESSION["auth"] = $uidExists["auth"];
     header("location:/index.php");
     exit();
  }
}
//displaying books
function getBooks($conn,$sql){
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../store/allbooks.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if(mysqli_num_rows($resultData)>0){
    $result = $resultData;
    return $result;
  }
  else{
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}
//searching for book based on its name
function searchBooks($conn,$bookname){
  $sql="select * from books WHERE book_name LIKE  ? ;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../store/allbooks.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt,'s',$bookname);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if(mysqli_num_rows($resultData)>0){
    $result = $resultData;
    return $result;
  }
  else{
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}
//searching books based on categories
function searchCategories($conn,$bookcat){
  $sql="select * from books WHERE category = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../store/allbooks.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt,'s',$bookcat);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if(mysqli_num_rows($resultData)>0){
    $result = $resultData;
    return $result;
  }
  else{
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}