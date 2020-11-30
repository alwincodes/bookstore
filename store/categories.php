<?php
   require "../templates/storenav.php";
   require "../backend/dbh.inc.php";
   require "../backend/function.inc.php";
  ?>
  <body>
  <div class="content">
    <div id="products">
       <div id="category">
        <a class = "cat_items"href="./categories.php?cat=Fantasy">Fantasy</a>
       </div> 
       <div id="category">
        <a class = "cat_items"href="./categories.php?cat=adventure">Adventure</a>
       </div> 
       <div id="category">
        <a class = "cat_items"href="./categories.php?cat=romance">Romance</a>
       </div> 
       <div id="category">
        <a class = "cat_items"href="./categories.php?cat=thriller">Thriller</a>
       </div> 
       <div id="category">
        <a class = "cat_items"href="./categories.php?cat=horror">Horror</a>
       </div> 
       <div id="category">
        <a class = "cat_items"href="./categories.php?cat=scifi">Sci-fi</a>
       </div> 
       <div id="category">
        <a class = "cat_items"href="./categories.php?cat=humour">Humour</a>
       </div> 
       <div id="category">
        <a class = "cat_items"href="./categories.php?cat=other">Other</a>
       </div>
    </div>
  </div>
  <div id="products">
  <?php
    if(isset($_GET['cat'])){
      $searchterm =$_GET['cat'];
      $products=searchCategories($conn,$searchterm);

      if($products!==false){
        while($row = mysqli_fetch_assoc($products)){
          echo('
          <a href="/store/books-display-buy/displaypage.php?bid='.$row["bid"].'">
          <div id="product">
           <img class="product_images"src="'.$row["book_img"].'" alt="product image">
           <div class="book_info"> <p>'.$row["book_name"].'</p> <p><i>(2010)</i></p> <p>Price: ₹'.$row["book_price"].'/-</p></div>
           </div> 
           </a>
           ');
        }
      }
      else{
        echo("<h1>No Results!!<h1>");
      }
    }else{
      echo("<h1>click on a category<h1>");
    }
  ?>
    </div>
 </body>
