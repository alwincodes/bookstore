<?php
require "../templates/sellernav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
?>
  <?php
      $sql="SELECT orders.oid, orders.bid,orders.uid,orders.pincode, orders.addr, orders.city, orders.dist, orders.state, orders.status,books.book_name,books.book_isbn,users.fname,users.lname,users.email,users.phoneno
      FROM orders
      INNER JOIN books
      ON books.bid=orders.bid
      INNER JOIN users
      ON orders.uid=users.usersId Where books.seller_id=?  ORDER BY oid DESC;";
      $products=getOrderSeller($conn,$sql,$sellerid);

      if($products!==false){
        echo('
        <h3>All your orders</h3>
        <table id="customers">
        <tr>
          <th>Id</th>
          <th>Book Id</th>
          <th>Book Name</th>
          <th>Book Isbn</th>
          <th>Customer Id</th>
          <th>Customer Name</th>
          <th>Customer Email</th>
          <th>Customer Phone</th>
          <th>Address</th>
          <th>Pincode</th>
          <th>City</th>
          <th>District</th>
          <th>State</th>
          <th>Status</th>
          <th>Change Order Status</th>
        </tr>
        ');
        while($row = mysqli_fetch_assoc($products)){
          $state =$row['status'];
          if("$state" === "pending"){$colordef ='orange';}
          else if("$state" === "cancelled"){$colordef ='#dc143c';}
          else{$colordef ='green';}
          
          echo('
          <tr>
          <td>'.$row['oid'].'</td>
          <td>'.$row['bid'].'</td>
          <td>'.$row['book_name'].'</td>
          <td>'.$row['book_isbn'].'</td>
          <td>'.$row['uid'].'</td>
          <td>'.$row['fname'].''." ".''.$row['lname'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['phoneno'].'</td>
          <td>'.$row['addr'].'</td>
          <td>'.$row['pincode'].'</td>
          <td>'.$row['city'].'</td>
          <td>'.$row['dist'].'</td>
          <td>'.$row['state'].'</td>
          <td style="font-weight: bold;color:'.$colordef.'">'.$row['status'].'</td>
          <td><a class = "button btn_green" href="/seller/orderupdate.php?oid='.$row['oid'].'">update</a></td>
        </tr>
        ');
        }
      }
      else{
          echo('
         <h4>You have no orders</h4>
         ');
      }
       ?>
</table>