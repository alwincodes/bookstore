<?php
require "../templates/sellernav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sid =$_SESSION["uid"];
 if(!isset($_GET["bid"])){
     echo("error");
     exit();
 }
     $bid=$_GET["bid"];
      $uid = $_SESSION["uid"];
      $bookdata = userBookData($conn,$bid);
      if($bookdata !== false){
        echo('
            <body>
            <div class="displaypage">
                <div class="proddisplay">
                    <h1 class="heading_final">'.$bookdata['book_name'].'</h1>
                    <p class="author_final">(<a href="https://www.google.com/search?q='.$bookdata['book_author'].'">'.$bookdata['book_author'].'</a>)</p>
                    <div id="product_final">
                    <img class="product_images_final"src="'.$bookdata['book_img'].'" alt="product image">
                   
                    </div>
                </div>
                
                <div class="prodinfo">
                <table id="customers">
                <tr>
                <th colspan="4">Book Info</th>
            </tr>
                <tr> 
                    <td>isbn: '.$bookdata['book_isbn'].'</td>
                    <td> Category: '.$bookdata['category'].'</td>
                    <td> Stock left: '.$bookdata['book_stock'].'</td>
                    <td>published year: '.$bookdata['book_year'].'</td>
                </tr>
            </table>
                <h3 class="desc_final">Description</h3>
                <div class="bookdescription">
                '.$bookdata['book_desc'].'
                </div>
                    <h2 class="heading_final">Price ₹ '.$bookdata['book_price'].'/-</h2>
                    <div class="additional_info">
                    <p>seller: '.$bookdata['username'].' email: '.$bookdata['email'].'</p>
                        <a href="https://www.google.com/search?q='.$bookdata['book_name'].'">For more info</a>
                    </div>
                </div>
                    
            ');
      } 
      ?>
      <div id="products">
      <?php
      //get all the reviews posted by other customers
      $reviews = getAllReviewCustomer($conn,0,$bid);
      if($reviews != false){
          echo("<h2>All reviews</h2>");
      foreach($reviews as $review){
      echo('
            <div class="cartitem">
            <div class="cartdesc" style="font-weight:bold">
            <p><i>'.$review["username"].'</i></p><hr>
            '.$review["book_review"].'
            </div>
            </div>
      ');
      }
    }else{
        echo("<h1>This book has no other reviews</h1>");
    }
  ?>
  </div>
