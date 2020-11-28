<?php
require "../templates/sellernav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
$auth =$_SESSION["auth"];
?>
<?php
if(isset($_GET['bookid']) && isset($_GET['img'])){
    $ubookid = $_GET['bookid'];
    $uimage = $_GET['img'];
    $bookexist = singleBookInfo($conn,$ubookid);
    if($bookexist !== false) {
        $cat = $bookexist['category'];
    echo('
           <h4>Update Book Info</h4>
           <form  action="" method="post" enctype = "multipart/form-data">
             <input value="'.$bookexist['book_name'].'" type ="text" name="bname"placeholder="Book name">
             <input value="'.$bookexist['book_isbn'].'" type ="text" name="isbn"placeholder="Book isbn">
             <textarea  rows="10" cols="30" name="description"placeholder="Book description"> '.$bookexist['book_desc'].' </textarea>
             <input value="'.$bookexist['book_price'].'" type ="text" name="price"placeholder="Book price">
             <input value="'.$bookexist['book_stock'].'" type ="text" name="stock"placeholder="Book stock">
             <input value="'.$bookexist['book_author'].'" type ="text" name="author"placeholder="Book author">
             <input value="'.$bookexist['book_year'].'" type ="text" name="year"placeholder="Book year">
             <select id="bookcat" name="bookcat" >
                <option value="">Select an option to update</option>
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
            <button type="submit" name="updatebook">Update Book Info</button>
           </form> 
        ');

        if(isset($_POST['updatebook'])){
            $bookname = $_POST['bname'];
            $isbn = $_POST['isbn'];
            $bookdescription = $_POST['description'];
            $bookprice = $_POST['price'];
            $bookstock = $_POST['stock'];
            $bookcat = $_POST['bookcat'];
            $bookauthor = $_POST['author'];
            $bookyear = $_POST['year'];
            $bookimg = $_FILES['bookimg'];
            if($bookcat ==""){
                $bookcat = $cat;
            }

            if(isbncheck($isbn)!==false){
                echo("isbn not correct");
                exit();
        }
        if(!sellerUpdateBook($conn,$bookname,$isbn,$bookdescription,$bookstock,$bookprice,$bookcat,$bookauthor,$bookyear,$ubookid)) {
            echo("something went wrong cant update values");
        }
        else{
            echo("the data has been added");
        //need to check for the new upload and save it in the same name as the previous upload
        if(isset($_FILES['bookimg'])){
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
                        $fileDestination = ".."."$uimage";
                        
                        if(move_uploaded_file($fileTmpName,$fileDestination)) {
                        echo("Your image has been updated ");
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
        //above code to replace the book image
       }  
      }
    }
  }
}
?>