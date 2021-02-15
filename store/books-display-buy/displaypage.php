<?php
   require "../../templates/storenav.php";
   require "../../backend/dbh.inc.php";
   require "../../backend/function.inc.php";
   if(isset($_GET["bid"])){
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
                    <div id="order">');
                    if($bookdata['book_stock'] > 0){
                        echo('
                        <a class = "order_items"href="/store/books-display-buy/customer_createorder.php?bid='.$bookdata['bid'].'">Buy</a>

                        <a class = "cart_items"href="/store/books-display-buy/addtocart.php?cartbid='.$bookdata['bid'].'">Cart</a>
                        ');
                    }else{
                        echo('<a class = "out_items" href="#">Out Of Stock !</a>');
                    }
        echo(' </div>
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
            //to display the users review or allow them to post a review
            $myreview = getMyReviewCustomer($conn,$uid,$bid);
            if($myreview == false){
                
                echo('
             <h2>Post your review! (100 words)</h2>
             
             <div class="reviewitem" >
                   <form action="/store/books-display-buy/review.php?bid='.$bid.'" method="post" style="height:200px">
                       <textarea placeholder="Post your review!" class="review_text_area" name="review" id="" cols="30" rows="10"></textarea>
                       <div class="reviewbtn"><input type="submit" name="reviewbt"class="button" value="Post review"></div>
                   </form>
             </div> ');
               
            }else{
                echo('
                <h2>Your review</h2>
                <div class="cartitem">
                   <div class="cartdesc" style="font-weight:bold">
                   <p><i>'.$myreview[0]["username"].'</i></p><hr>
                   '.$myreview[0]["book_review"].'
                   
                   </div>
                   <div class="cartdelete" >
                   <a class="cartfns" href="/store/books-display-buy/review.php?deleterev='.$myreview[0]["rid"].'&bid='.$bid.'">delete</a>
                   </div>
                 </div>
                 ');
            }
            ?>

      </div>
      <div id="products">
      <?php
      //get all the reviews posted by other customers
      $reviews = getAllReviewCustomer($conn,$uid,$bid);
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
    }
    //closes the main isset fn ( was confusing for me too)
    else{
        header("location:/store/allbooks.php");
    }
  ?>
  </div>
