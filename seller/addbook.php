<?php
require "../templates/sellernav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
$auth =$_SESSION["auth"];
?>
<h4>Add Your Book</h4>
<form  action="" method="post" enctype = "multipart/form-data">
  <input type ="text" name="bname"placeholder="Book name">
  <input type ="text" name="isbn"placeholder="Book isbn">
  <textarea  rows="10" cols="30" name="description"placeholder="Book description"></textarea>
  <input type ="text" name="price"placeholder="Book price">
  <input type ="text" name="stock"placeholder="Book stock">
  <select id="bookcat" name="bookcat" >
     <option value="fantasy">fantasy</option>
     <option value="adventure">Adventure</option>
     <option value="romance">Romance</option>
     <option value="thriller">Thriller</option>
     <option value="horror">Horror</option>
     <option value="scifi">Sci-fi</option>
     <option value="humour">Humour</option>
     <option value="other">Other</option>
 </select>
 <input type="file" name="bookimg" >
 <button type="submit" name="addbook">Add Book</button>
</form>
<?php
 if(isset($_POST['addbook'])){
     $bookname = $_POST['bname'];
     $isbn = $_POST['isbn'];
     $bookdescription = $_POST['description'];
     $bookprice = $_POST['price'];
     $bookstock = $_POST['stock'];
     $bookcat = $_POST['bookcat'];
     $bookimg = $_FILES['bookimg'];
    
     if(emptybookinfo($bookname,$isbn,$bookdescription,$bookprice,$bookcat)!==false){
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
                   $fileDestination = "../images/".$fileNameNew;
                   if(addBook($conn,$bookname,$isbn,$fileDestination,$bookdescription,$bookstock,$bookprice,$sellerid,$bookcat)) {
                   move_uploaded_file($fileTmpName,$fileDestination);
                   echo("Your book has been added");
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