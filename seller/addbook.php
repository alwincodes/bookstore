<?php
require "../templates/sellernav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
$sellername=$_SESSION['username'];
$auth =$_SESSION["auth"];
?>

<form  action="" method="post" enctype = "multipart/form-data">
 <div class ="inputfield">
  <h4>Add Your Book</h4>
  <input class="login_text" type ="text" name="bname"placeholder="Book name">
  <input class="login_text" type ="text" name="isbn"placeholder="Book isbn">
  <textarea  class="login_text_area"rows="10" cols="30" name="description"placeholder="Book description"></textarea>
  <input class="login_text" type ="text" name="price"placeholder="Book price">
  <input class="login_text" type ="text" name="stock"placeholder="Book stock">
  <input class="login_text" type ="text" name="author"placeholder="Book author">
  <input class="login_text" type ="text" name="year"placeholder="Book year">
  
  <select class="select" id="bookcat" name="bookcat" >
     <option value="fantasy">fantasy</option>
     <option value="adventure">Adventure</option>
     <option value="romance">Romance</option>
     <option value="thriller">Thriller</option>
     <option value="horror">Horror</option>
     <option value="scifi">Sci-fi</option>
     <option value="humour">Humour</option>
     <option value="other">Other</option>
 </select>
 <input  class="file" type="file" name="bookimg" >

 <button class="button"type="submit" name="addbook">Add Book</button>
 </div>
</form>
<?php
 if(isset($_POST['addbook'])){
     $bookname = $_POST['bname'];
     $isbn = $_POST['isbn'];
     $bookdescription = $_POST['description'];
     $bookprice = $_POST['price'];
     $bookstock = $_POST['stock'];
     $bookcat = $_POST['bookcat'];
     $bookauthor = $_POST['author'];
     $bookyear = $_POST['year'];
     $bookimg = $_FILES['bookimg'];
    
     if(emptybookinfo($bookname,$isbn,$bookdescription,$bookprice,$bookcat,$bookauthor,$bookyear)!==false){
         echo("empty inputs");
         exit();
     }
     if(isbncheck($isbn)!==false){
         echo("isbn not correct");
         exit();
    }
    $fileName = $_FILES['bookimg']['name'];
    $fileType = $_FILES['bookimg']['type'];
    $fileTmpName = $_FILES['bookimg']['tmp_name'];
    $fileError = $_FILES['bookimg']['error'];
    $fileSize = $_FILES['bookimg']['size'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg');

    if (in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 2097152 ){
                   $fileNameNew = uniqid('',true).".".$fileActualExt;
                   $fileDestination = "../images/".$sellername."/".$fileNameNew;
                   
                   if(move_uploaded_file($fileTmpName,$fileDestination)) {
                    $fileDestination = "/images/".$sellername."/".$fileNameNew;
                    addBook($conn,$bookname,$isbn,$fileDestination,$bookdescription,$bookstock,$bookprice,$sellerid,$bookcat,$bookauthor,$bookyear);
                    header("Location:./seller-dashboard.php?status=bookadded");
                   }
            }else{
                echo("file too big! make sure file is less than 2 mb");
            }
        }else{
            echo("there was an error uploading");
        }
    }else{
        echo("Invalid file type .jpg, .jpeg allowed");
    }
 }
?>