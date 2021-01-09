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
 
}
//function to create seller account
function createSeller($conn,$fname,$lname,$uname,$email,$phno,$pass){
  $sql = "INSERT INTO users (username,fname,lname,email,phoneno,userpass,auth) VALUES (?,?,?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:/seller/sellersignup.php?error=stmtfailed");
    exit();
  }
  $hashedpwd = password_hash($pass,PASSWORD_DEFAULT);
  $auth = -1;
  mysqli_stmt_bind_param($stmt,"sssssss",$uname,$fname,$lname,$email,$phno,$hashedpwd,$auth);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  mkdir("../images/$uname");
  header("location:/index.php?error=signupdone");
 
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
   // header("location:/index.php?error=stmtfailed");
   echo("statement failed");
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
//getting a specific sellers order info based on order table
function getOrderSeller($conn,$sql,$sellerid){
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:/seller/seller-dashboard.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt,'s',$sellerid);
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
//for admins to delete books
function admin_deletebooks($conn,  $deleteid){
    $sql="delete  from books WHERE bid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
      return false;
      exit();
    }
    mysqli_stmt_bind_param($stmt,'s',$deleteid);
    if(mysqli_stmt_execute($stmt)){
      return true;
    }else{
      return false;
    }
}
//book input
function emptybookinfo($bookname,$isbn,$bookdescription,$bookprice,$bookcat,$bookauthor,$bookyear){
  $result;
  if(empty($bookname) || empty($isbn) || empty($bookdescription) || empty($bookprice) || empty($bookcat) || empty($bookauthor)|| empty($bookyear)){
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}
function isbncheck($isbn) {
  if((strlen($isbn) < 10) || (strlen($isbn) > 13)){
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}
function addBook($conn,$bookname,$isbn,$fileDestination,$bookdescription,$bookstock,$bookprice,$sellerid,$bookcat,$bookauthor,$bookyear) {
  $sql = "INSERT INTO books (book_name,book_isbn,book_img,book_desc,book_stock,book_price,seller_id,category,book_year,book_author) VALUES (?,?,?,?,?,?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ssssssssss",$bookname,$isbn,$fileDestination,$bookdescription,$bookstock,$bookprice,$sellerid,$bookcat,$bookyear,$bookauthor);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  return true;
}
function sellerdelete($conn,$bookid,$sellerid) {
  $sql="delete  from books WHERE bid = ? and seller_id = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }
  mysqli_stmt_bind_param($stmt,'ss',$bookid,$sellerid);
  if(mysqli_stmt_execute($stmt)){
    return true;
  }else{
    return false;
  }
}
//to get info about a book based on its bid
function singleBookInfo($conn,$bid,$sid){
  $sql = "SELECT * FROM books WHERE bid = ? AND seller_id = ? ;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }

  mysqli_stmt_bind_param($stmt,"ss",$bid,$sid);
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
 //a function to update book information based on user input
function sellerUpdateBook($conn,$bookname,$isbn,$bookdescription,$bookstock,$bookprice,$bookcat,$bookauthor,$bookyear,$bid,$sid){
  $sql = "UPDATE books SET book_name = ?,book_isbn = ?,book_desc =?,book_stock =?,book_price =?,category =?,book_year =?,book_author=? where bid = ? AND seller_id = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ssssssssss",$bookname,$isbn,$bookdescription,$bookstock,$bookprice,$bookcat,$bookyear,$bookauthor,$bid,$sid);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  return true;
}
//to get info about a book for customers
function userBookData($conn,$bid){
  $sql = "SELECT books.bid, books.book_name,  books.book_isbn, books.book_img, books.book_desc, books.book_stock, books.book_price, books.category, books.book_year, books.book_author,users.username,users.email
  FROM books
  INNER JOIN users
  ON books.seller_id=users.usersId Where books.bid=? ;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }

  mysqli_stmt_bind_param($stmt,"s",$bid);
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
 //function for users to create orderss
 function createOrder($conn,$bid,$uid,$pincode,$address,$city,$district,$state,$cname,$cphno,$cemail) {
    $sql ="INSERT INTO orders (bid,uid,pincode,addr,city,dist,state,c_fname,c_ph,c_email) 
    VALUES (?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
      return false;
      exit();
    }
  
    mysqli_stmt_bind_param($stmt,"ssssssssss",$bid,$uid,$pincode,$address,$city,$district,$state,$cname,$cphno,$cemail);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if(orderUpdateQuantity($conn, $bid)){
      return true;
    }else{
      return false;
    }
    
 }
 function orderUpdateQuantity($conn, $bid){
  $sql = "SELECT book_stock from books Where bid = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }

  mysqli_stmt_bind_param($stmt,"s",$bid);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if($row = mysqli_fetch_assoc($resultData)){
    //ie if the stock exist then reduce it by one else return false
    if($row['book_stock'] > 0) {
      print_r($row["book_stock"]);
      $sql1 = "UPDATE books set book_stock = book_stock - 1 Where bid = ?";
      $stmt1 = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt1,$sql1)){
        return false;
        exit();
      }
      mysqli_stmt_bind_param($stmt1,"s",$bid);
      if(mysqli_stmt_execute($stmt1)){
        return true;
      }
      
    }else{
      return false;
    }
  }
  else{
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
  mysqli_stmt_close($stmt1);
}

function updateOrderStatus($conn,$oid,$sellerid,$currentStatus) {
  $sql = " UPDATE orders
  INNER JOIN books ON orders.bid=books.bid
  
  SET orders.status=? WHERE books.seller_id =? AND orders.oid = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }

  mysqli_stmt_bind_param($stmt,"sss",$currentStatus,$sellerid,$oid);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  return true;
 }
 function getOrderUser($conn,$sql,$userid){
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../store/allbooks.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt,'s',$userid);
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
 //for admin operations
 function adminDeletOrder($conn,$oid){
  $sql="delete  from orders WHERE oid = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }
  mysqli_stmt_bind_param($stmt,'s',$oid);
  if(mysqli_stmt_execute($stmt)){
    return true;
  }else{
    return false;
  }
}
function adminDeleteCustomer($conn,$customerid){
  $sql="delete  from users WHERE usersID = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }
  mysqli_stmt_bind_param($stmt,'s',$customerid);
  if(mysqli_stmt_execute($stmt)){
    return true;
  }else{
    return false;
  }
}
 //for getting reviews for books
 function getAllReviewCustomer($conn,$customer,$bid){
  $result;
  $sql = "SELECT reviews.book_review,reviews.rid,users.username 
  FROM reviews 
  INNER JOIN users
  ON users.usersId = reviews.uid
  WHERE uid != ? AND bid = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$customer,$bid);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if(mysqli_num_rows($resultData)>0){
  while($row = mysqli_fetch_assoc($resultData)){
    $result[]=$row;
  }
  return $result;
 }
  else{
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
 }
 function getMyReviewCustomer($conn,$customer,$bid){
  $result;
  $sql = "SELECT reviews.book_review,reviews.rid,users.username 
  FROM reviews 
  INNER JOIN users
  ON users.usersId = reviews.uid
  WHERE uid = ? AND bid = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }
  mysqli_stmt_bind_param($stmt,"ss",$customer,$bid);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if(mysqli_num_rows($resultData)>0){
  while($row = mysqli_fetch_assoc($resultData)){
    $result[]=$row;
  }
  return $result;
 }
  else{
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
 }
 //customer posting reviews
 function postMyReviewCustomer($conn,$customer,$bid,$review){
  $result;
  $sql = "INSERT INTO reviews (bid,uid,book_review) VALUES (?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }
  mysqli_stmt_bind_param($stmt,"sss",$bid,$customer,$review);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  return true;
 }
 function customerDeleteReview($conn,$deleteid){
  $result;
  $sql = "DELETE FROM reviews WHERE rid = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }
  mysqli_stmt_bind_param($stmt,"s",$deleteid);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  return true;
 }
 //approve seller
 function approveSeller($conn,$sid){
  $result;
  $sql = "UPDATE users SET auth = 1 where usersId = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    return false;
    exit();
  }
  mysqli_stmt_bind_param($stmt,"s",$sid);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  return true;
 }
