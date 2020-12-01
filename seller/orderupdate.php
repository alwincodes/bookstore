<?php
require "../templates/sellernav.php";
require "../backend/dbh.inc.php";
require "../backend/function.inc.php";
$sellerid = $_SESSION["uid"];
  if(isset($_GET['oid'])) {
      $oid =$_GET['oid'];
      echo('
            <form action="" method="post">
            <div class="inputfield">
            <h3>Update your order status</h3>
            
            <select class="select" id="bookcat" name="orderid" >
                            <option value="">Select an option to update</option>
                            <option value="shipped">Shipped</option>
                            <option value="cancelled">Cancelled</option>
                            <option value="delivered">Delivered</option>
                            <option value="confirmed">Confirmed</option>
            </select>
            <button class="button" type="submit" name="update">Update Status</button>
            
            </form>
            ');
           if(isset($_POST['update'])){
               $currentStatus = $_POST["orderid"];
               if($currentStatus === ""){header("location:/seller/sellerorder.php?error=nochangesmade");}
               else{
                  if( updateOrderStatus($conn,$oid,$sellerid,$currentStatus)) {
                      header("location:/seller/sellerorder.php?error=updatedvalue");
                      exit();
                  }else{
                    header("location:/seller/sellerorder.php?error=valuedidntupdate");
                  }
               }
           }
  }
?>