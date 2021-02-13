<?php
   require "../../templates/storenav.php";
   require "../../backend/dbh.inc.php";
   require "../../backend/function.inc.php";
   $userid =$_SESSION["uid"];
   ?>
     <?php
      $sql="SELECT * from orders where uid =? order by bid DESC;";
      $products=getOrderUser($conn,$sql,$userid);

      if($products!==false){
        echo('
        <h3>All your orders</h3>
        <h4>Please contact the seller for order cancellation</h4>
        <table id="customers">
        <tr>
          <th>Id</th>
          <th>Book Id</th>
          <th>Customer Name</th>
          <th>Customer Email</th>
          <th>Customer Phone</th>
          <th>Address</th>
          <th>Pincode</th>
          <th>City</th>
          <th>District</th>
          <th>State</th>
          <th>Status</th>
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
          <td><a style="color:blue"href="/store/books-display-buy/displaypage.php?bid='.$row['bid'].'">'.$row['bid'].'</a></td>
          <td>'.$row['c_fname'].'</td>
          <td>'.$row['c_email'].'</td>
          <td>'.$row['c_ph'].'</td>
          <td>'.$row['addr'].'</td>
          <td>'.$row['pincode'].'</td>
          <td>'.$row['city'].'</td>
          <td>'.$row['dist'].'</td>
          <td>'.$row['state'].'</td>
          <td style="font-weight: bold;color:'.$colordef.'">'.$row['status'].'</td>
 
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