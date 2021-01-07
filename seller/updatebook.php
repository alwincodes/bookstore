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
    $bookexist = singleBookInfo($conn,$ubookid,$sellerid);
    if($bookexist !== false) {
        $cat = $bookexist['category'];
    echo('
           
           <form  action="" method="post" enctype = "multipart/form-data">
           <div class ="inputfield">
           <h4>Update Book Info</h4>
             <input  class="login_text" value="'.$bookexist['book_name'].'" type ="text" name="bname"placeholder="Book name">
             <input  class="login_text"value="'.$bookexist['book_isbn'].'" type ="text" name="isbn"placeholder="Book isbn">
             <textarea   class="login_text_area" rows="10" cols="30" name="description"placeholder="Book description">'.$bookexist['book_desc'].' </textarea>
             <input  class="login_text" value="'.$bookexist['book_price'].'" type ="text" name="price"placeholder="Book price">
             <input  class="login_text" value="'.$bookexist['book_stock'].'" type ="text" name="stock"placeholder="Book stock">
             <input  class="login_text" value="'.$bookexist['book_author'].'" type ="text" name="author"placeholder="Book author">
             <input  class="login_text" value="'.$bookexist['book_year'].'" type ="text" name="year"placeholder="Book year">
             <div>
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
            </div>
            <button  class="button" type="submit" name="updatebook">Update Book Info</button>
            </div>
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
        if(!sellerUpdateBook($conn,$bookname,$isbn,$bookdescription,$bookstock,$bookprice,$bookcat,$bookauthor,$bookyear,$ubookid,$sellerid)) {
            echo("something went wrong cant update values");
        }
        else{
            echo("the data has been added<br>");
        //need to check for the new upload and save it in the same name as the previous upload
        if($bookimg['name']!==""){
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
}else{
    header("Location:./seller-dashboard.php");
}
?>