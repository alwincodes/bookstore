<?php
   require "../../templates/storenav.php";
   require "../../backend/dbh.inc.php";
   require "../../backend/function.inc.php";
   if(isset($_GET["bid"])){
      $bid=$_GET["bid"];
      $uid=$_SESSION["uid"];
         
      echo('
         <form action="" method="post">
            <div class="inputfield">
            <h1>Create your order</h1>
            <input class="login_text" name="pincode"type="text" placeholder="PINCODE">
            <textarea class="login_text_area" name="address"rows = "5" cols ="30"Placeholder="Enter Your address"></textarea>
            <input class="login_text" name="city"type="text" placeholder="City">
            <input class="login_text" name="district"type="text" placeholder="District">
            <input class="login_text" name="state"type="text" placeholder="State">
            <button class="button" name="Order"type="submit">Create order</button>
            </div>
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