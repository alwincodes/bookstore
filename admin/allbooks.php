<?php
require "../templates/adminnav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
?>
  <?php
      $sql="select * from books;";
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
          <th>category</th>
          <th>Delete</th>
          <th>Update</th>
        </tr>
        ');
        while($row = mysqli_fetch_assoc($products)){
          echo('
          <tr>
          <td>'.$row['bid'].'</td>
          <td>'.$row['book_name'].'</td>
          <td>'.$row['book_isbn'].'</td>
          <td>'.substr($row['book_desc'],0,60).'...'.'</td>
          <td>'.$row['book_price'].'</td>
          <td>'.$row['category'].'</td>
          <td><a href="./functions.php?deletebookid='.$row['bid'].'">Delete</a></td>
          <td><a href="./functions.php?updatebookid='.$row['bid'].'">update</a></td>
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