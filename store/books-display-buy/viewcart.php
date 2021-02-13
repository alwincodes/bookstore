<?php
   require "../../templates/storenav.php";
   require "../../backend/dbh.inc.php";
   require "../../backend/function.inc.php";
   ?>
   <div class="content">
    <h3 id ="results">Cart</h3>
    <div id="products">
    <?php
    $index=0;
   if( nOfElementsCart() > 0){
       $cartitems = displayCart();
       foreach ($cartitems as $items){
           $bookid = $items['bid'];
           $bookdata = userBookData($conn,$bookid);

        echo('
        <div class="cartitem">
          <a href="/store/books-display-buy/displaypage.php?bid='.$bookdata['bid'].'"><img class ="cartimg"src="'.$bookdata['book_img'].'"></a>
          <div class="cartinfo">
              <p>'.$bookdata['book_name'].'</p>
              <p>Price: '.$bookdata['book_price'].'/-</p>
              <p>Seller: '.$bookdata['username'].'</p>
              <p>'.$bookdata['category'].'</p>
              <p>isbn: '.$bookdata['book_isbn'].'</p>
         </div>
           <div class="cartdesc">
           '.substr($bookdata['book_desc'],0,300).'...
           </div>
           <div class="cartdelete" >
           <a class="cartfns" href="/store/books-display-buy/addtocart.php?cartdelete='.$index.'">delete</a>
           </div>
         </div>
         ');
         $index++;
       }
       echo('<a class="cartfns" href="/store/books-display-buy/cart_createorder.php?cart=buy">Order items</a>');
      // echo(' <button onClick="window.print();" class="dropbtn">Print</button>');
       }else{
        echo("<h1>No items in cart!!<h1>");
       }
    ?>
    </div>
  </div>
 </body>