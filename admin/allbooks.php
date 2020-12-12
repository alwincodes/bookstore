<?php
require "../templates/adminnav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
?>
  <?php
      $sql="SELECT books.bid,books.book_name,books.book_isbn,books.book_desc,books.book_price,books.category,books.book_img,books.book_stock,
      users.username,users.phoneno,users.email
      from books
      INNER JOIN users
      ON books.seller_id = users.usersId;";
      $products=getBooks($conn,$sql);

      if($products!==false){
        echo('
        <h3>All  books</h3>
        <table id="customers">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>isbn</th>
          <th>Description</th>
          <th>price</th>
          <th>Stock</th>
          <th>category</th>
          <th>seller Name</th>
          <th>seller Contact</th>
          <th>Delete</th>
        </tr>
        ');
        while($row = mysqli_fetch_assoc($products)){
          echo('
          <tr>
          <td>'.$row['bid'].'</td>
          <td>'.$row['book_name'].'</td>
          <td>'.$row['book_isbn'].'</td>
          <td>'.substr($row['book_desc'],0,60).'.....'.'('.strlen($row['book_desc']).') <i>Words</i></td>
          <td>'.$row['book_price'].'</td>
          <td>'.$row['book_stock'].'</td>
          <td>'.$row['category'].'</td>
          <td>'.$row['username'].'</td>
          <td>'.$row['phoneno'].', '.$row['email'].'</td>
          <td ><a class = "button btn_red" href="./functions.php?deletebookid='.$row['bid'].'&img='.$row['book_img'].'">Delete</a></td>
        </tr>
        ');
        }
      }
      else{
          echo('
         <h4>You have no books :( </h4>
         ');
      }
       ?>
</table>