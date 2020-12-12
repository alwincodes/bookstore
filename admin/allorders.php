<?php
require "../templates/adminnav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
?>
  <?php
      $sql="SELECT t1.oid, t1.bid,t1.uid,t1.pincode, t1.addr, t1.city, t1.dist, t1.state, t1.status,
      t2.book_name,t2.book_isbn,
      t3.username,t3.fname,t3.lname,t3.email,t3.phoneno,
      t4.usersId AS sellerId,t4.username AS sellername,t4.email AS selleremail,t4.phoneno As sellerphn
 
      FROM orders t1
      INNER JOIN books t2
      ON t2.bid=t1.bid
      INNER JOIN users t3
      ON t1.uid=t3.usersId
      INNER JOIN users t4
      on t2.seller_id=t4.usersId
      ORDER BY t1.oid DESC;";
      $products=getBooks($conn,$sql);

      if($products!==false){
        echo('
        <h3>All  orders</h3>
        <table id="customers">
        <tr>
        <th>Id</th>
        <th>Book Id</th>
        <th>Book Name</th>
        <th>Book Isbn</th>
        <th>Seller Id</th>
        <th>Seller Name</th>
        <th>Seller Contact</th>
        <th>Customer Id</th>
        <th>Customer Name</th>
        <th>Customer Contact</th>
        <th>Address</th>
        <th>Pincode</th>
        <th>Status</th>
        <th>Delete</th>
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
          <td>'.$row['sellerId'].'</td>
          <td>'.$row['sellername'].'</td>
          <td>'.$row['sellerphn'].', '.$row['selleremail'].'</td>
          <td>'.$row['uid'].'</td>
          <td>'.$row['fname'].''." ".''.$row['lname'].'</td>
          <td>'.$row['phoneno'].', '.$row['email'].'</td>
          <td>'.$row['addr'].', '.$row['city'].', '.$row['dist'].', '.$row['state'].'</td>
          <td>'.$row['pincode'].'</td>
          <td style="font-weight: bold;color:'.$colordef.'">'.$row['status'].'</td>
          <td><a class = "button btn_red"href="./functions.php?orderid='.$row["oid"].'">Delete</a></td>

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