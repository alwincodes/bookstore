<?php
   require "../../templates/storenav.php";
   require "../../backend/dbh.inc.php";
   require "../../backend/function.inc.php";
   if(isset($_GET["bid"])){
      $bid=$_GET["bid"];
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
                    <div id="order">
                        <a class = "order_items"href="/store/books-display-buy/customer_createorder.php?bid='.$bookdata['bid'].'">Buy Now</a>
                    </div>
                    </div>
                </div>
                
                <div class="prodinfo">
                <h3 class="desc_final">Description</h3>
                <div class="bookdescription">
                '.$bookdata['book_desc'].'
                </div>
                    <h2 class="heading_final">Price ₹ '.$bookdata['book_price'].'/-</h2>
                    <div class="additional_info">
                    <p>seller: '.$bookdata['username'].' email: '.$bookdata['email'].'</p>
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

                        <a href="https://www.google.com/search?q='.$bookdata['book_name'].'">For more info</a>
                    </div>
                </div>
                    
            </body>
            ');
      }
    }
  ?>