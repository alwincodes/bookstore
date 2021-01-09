<?php
require "../templates/adminnav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
?>
  <?php
      $sql="select * from reviews";
      $products=getBooks($conn,$sql);

      if($products!==false){
        echo('
        <h3>All  sellers</h3>
        <table id="customers">
        <tr>
          <th>rId</th>
          <th>bId</th>
          <th>uId</th>
          <th>Review</th>

          <th>Delete</th>

        </tr>
        ');
        while($row = mysqli_fetch_assoc($products)){
          echo('
          <tr>
          <td>'.$row['rid'].'</td>
          <td>'.$row['bid'].'</td>
          <td>'.$row['uid'].'</td>
          <td>'.$row['book_review'].'</td>

          <td><a class = "button btn_red" href="./functions.php?rid='.$row["rid"].'">Delete</a></td>

        </tr>
        ');
        }
      }
      else{
          echo('
         <h4>You have no sellers :( </h4>
         ');
      }
       ?>
</table>