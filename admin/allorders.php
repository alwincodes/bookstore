<?php
require "../templates/adminnav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
?>
  <?php
      $sql="select * from orders;";
      $products=getBooks($conn,$sql);

      if($products!==false){
        echo('
        <h3>All  orders</h3>
        <table id="customers">
        <tr>
          <th>OrderId</th>
          <th>Id</th>
          <th>Name</th>
          <th>isbn</th>
          <th>Description</th>
          <th>price</th>
          <th>category</th>
          <th>Delete</th>

        </tr>
        ');
        while($row = mysqli_fetch_assoc($products)){
          echo('
          <tr>
          <td>'.$row['oid'].'</td>
          <td>'.$row['bid'].'</td>
          <td>'.$row['addr'].'</td>
          <td>'.$row['pincode'].'</td>
          <td>'.$row['city'].'</td>
          <td>'.$row['dist'].'</td>
          <td>'.$row['dist'].'</td>
          <td><a style="color:blue"href="./functions.php?orderid='.$row["oid"].'">Delete</a></td>

        </tr>
        ');
        }
      }
      else{
          echo('
         <h4>You have no orders :( </h4>
         ');
      }
       ?>
</table>