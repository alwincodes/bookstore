<?php
   require "../../templates/storenav.php";
   require "../../backend/dbh.inc.php";
   require "../../backend/function.inc.php";
   if(isset($_GET["cart"])){
      $uid=$_SESSION["uid"];
         
      echo('
         <form action="" method="post">
            <div class="inputfield">
            <h1>Create your order</h1>
            <input value="'.$_SESSION['fname'].' '.$_SESSION['lname'].'" class="login_text" name="cname"type="text" placeholder="Full name">
            <input value="'.$_SESSION['phno'].'" class="login_text" name="phno"type="text" placeholder="Phone no">
            <input value="'.$_SESSION['email'].'" class="login_text" name="email"type="text" placeholder="Email">
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
            $cname = $_POST['cname'];
            $cphno = $_POST['phno'];
            $cemail = $_POST['email'];
            $pincode = $_POST['pincode'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $state = $_POST['state'];
            //looping order creation untill full cart is added
            $cartitems = displayCart();
            if(nOfElementsCart()>0) {
              foreach($cartitems as $item) {
                    if(!createOrder($conn,$item['bid'],$uid,$pincode,$address,$city,$district,$state,$cname,$cphno,$cemail)) {
                    header("location:/store/books_display_buy/viewcart.php?status=error");
                    exit();
                     }
                }
                //deleting cart elements after all items has been ordered 
                deleteAllCart();
                header("location:/store/books-display-buy/viewcart.php?status=success");
            } else{
                header("location:/store/books-display-buy/viewcart.php?status=emptycart");
              }

         }

   }else{
      header("location:/store/allbooks.php");
   }
?>