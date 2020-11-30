<?php
   require "../../templates/storenav.php";
   require "../../backend/dbh.inc.php";
   require "../../backend/function.inc.php";
   if(isset($_GET["bid"])){
      $bid=$_GET["bid"];
      $uid=$_SESSION["uid"];
         
      echo('
         <form action="" method="post">
            <input name="pincode"type="text" placeholder="PINCODE">
            <textarea name="address"rows = "5" cols ="30"> </textarea>
            <input name="city"type="text" placeholder="City">
            <input name="district"type="text" placeholder="District">
            <input name="state"type="text" placeholder="State">
            <button name="Order"type="submit">Create order</button>
         </form>
         ');

         if(isset($_POST['Order'])) {
            $pincode = $_POST['pincode'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $state = $_POST['state'];

            if(createOrder($conn,$bid,$uid,$pincode,$address,$city,$district,$state)) {
               echo("Order created");
            }else{
               echo("order cant be created some error occured");
            }
         }

   }else{
      header("location:/store/allbooks.php");
   }
?>