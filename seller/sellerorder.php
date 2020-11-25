<?php
require "../templates/sellernav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
?>
  <?php
      $sql="select * from orders where uid = $sellerid;";
      $products=getBooks($conn,$sql);

      if($products!==false){
        echo('
        <h3>All your orders</h3>
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
          <td>'.$row['addr'].'</td>
          <td>'.$row['pincode'].'</td>
          <td>'.$row['city'].'</td>
          <td>'.$row['dist'].'</td>
          <td>'.$row['dist'].'</td>
          <td>Delete</td>
          <td>update</td>
        </tr>
        ');
        }
      }
      else{
          echo('
         <h4>You have no books</h4>
         ');
      }
       ?>
</table>