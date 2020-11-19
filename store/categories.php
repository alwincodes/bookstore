<?php
   require "../templates/storenav.php";
   require "../backend/dbh.inc.php";
   require "../backend/function.inc.php";
  ?>
  <body>
  <div class="content">
    <div id="products">
    <div id="product">
        <a class = "cat_items"href="./categories.php?cat=Fantasy">Fantasy</a>
       </div> 
       <div id="product">
        <a class = "cat_items"href="./categories.php?cat=adventure">Adventure</a>
       </div> 
       <div id="product">
        <a class = "cat_items"href="./categories.php?cat=romance">Romance</a>
       </div> 
       <div id="product">
        <a class = "cat_items"href="./categories.php?cat=thriller">Thriller</a>
       </div> 
       <div id="product">
        <a class = "cat_items"href="./categories.php?cat=horror">Horror</a>
       </div> 
       <div id="product">
        <a class = "cat_items"href="./categories.php?cat=scifi">Sci-fi</a>
       </div> 
       <div id="product">
        <a class = "cat_items"href="./categories.php?cat=humour">Humour</a>
       </div> 
       <div id="product">
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
          <div id="product">
           <img class="product_images"src="'.$row["book_img"].'" alt="product image">
           <div class="book_info"> <p>'.$row["book_name"].'</p> <p><i>(2010)</i></p> <p>Price: ₹'.$row["book_price"].'/-</p></div>
           </div> ');
        }
      }
      else{
        echo("<h1>No Results!!<h1>");
      }
    }
  ?>
    </div>
 </body>
