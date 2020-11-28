<?php
   require "../templates/storenav.php";
   require "../backend/dbh.inc.php";
   require "../backend/function.inc.php";
  ?>
  <body>
  <div class="content">
  <h3 id ="results">All Books</h3>
    <div id="products">
     <?php
      $sql="select * from books;";
      $products=getBooks($conn,$sql);

      if($products!==false){
        while($row = mysqli_fetch_assoc($products)){
          echo('
          <div id="product">
           <img class="product_images"src="'.$row["book_img"].'" alt="product image">
           <div class="book_info"> <p>'.$row["book_name"].'</p> <p><i>('.$row["book_year"].')</i></p> <p>Price: ₹'.$row["book_price"].'/-</p></div>
           </div> ');
        }
      }
      else{
        echo("<h1>No Results!!<h1>");
      }
       ?>
    </div>
  </div>
 </body>
