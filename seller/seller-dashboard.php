<?php
require "../templates/sellernav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
?>
  <?php
      $sql="select * from books where seller_id = $sellerid;";
      $products=getBooks($conn,$sql);

      if($products!==false){
        echo('
        <h3>All your books</h3>
        <table id="customers">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>isbn</th>
          <th>image</th>
          <th>Description</th>
          <th>price</th>
          <th>category</th>
          <th>Year</th>
          <th>Stock</th>
          <th>author</th>
          <th>Delete</th>
          <th>Update</th>
        </tr>
        ');
        while($row = mysqli_fetch_assoc($products)){
          echo('
          <tr>
          <td>'.$row['bid'].'</td>
          <td><a style="color:blue" href="/seller/book_info.php?bid='.$row['bid'].'">'.$row['book_name'].'</a></td>
          <td>'.$row['book_isbn'].'</td>
          <td><a style="color:blue" href="'.$row['book_img'].'">Click here</a></td>
          <td>'.substr($row['book_desc'],0,60).'...'.'</td>
          <td>'.$row['book_price'].'</td>
          <td>'.$row['category'].'</td>
          <td>'.$row['book_year'].'</td>
          <td>'.$row['book_stock'].'</td>
          <td>'.$row['book_author'].'</td>
          <td><a class = "button btn_red" href="./deletebook.php?img='.$row['book_img'].'&bookid='.$row['bid'].'">Delete</a></td>
          <td><a class = "button btn_green"href="./updatebook.php?img='.$row['book_img'].'&bookid='.$row['bid'].'">Update</a></td>
        </tr>
        ');
        }
      }
      else{
          echo('
         <h4>You have no books</h4>
         <a style="color:blue"href="/seller/addbook.php">Click here to add some books and get started</a>
         ');
      }
       ?>
</table>