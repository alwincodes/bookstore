<?php
   require "../templates/storenav.php";
   require "../backend/function.inc.php";
   require "../backend/dbh.inc.php";
  ?>
  <body>
  <div class="content">
  <h3 id ="results"> 
      Search Books
  </h3>
  <div class="searchfield"><form action="" method ="post">
        <input type="text" class="login_text" name="bookname" placeholder="Enter book names">
        <input type="submit" name="book_search" value="Search"class="button">
    </form></div>
    <div id="products">
    <?php
      if(isset($_POST["book_search"])){
      $searchterm = "%{$_POST['bookname']}%";
      $products=searchBooks($conn,$searchterm);

      if($products!==false){
        while($row = mysqli_fetch_assoc($products)){
          echo('
          <a href="/store/books-display-buy/displaypage.php?bid='.$row["bid"].'">
          <div id="product">
           <img class="product_images"src="'.$row["book_img"].'" alt="product image">
           <div class="book_info"> <p>'.$row["book_name"].'</p> <p><i>(2010)</i></p> <p>Price: ₹'.$row["book_price"].'/-</p></div>
           </div> 

           ');
        }
      }
      else{
        echo("<h1>No Results!!<h1>");
      }
    }
       ?>
    </div>
  </div>
 </body>