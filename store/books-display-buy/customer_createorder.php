<?php
   require "../../templates/storenav.php";
   require "../../backend/dbh.inc.php";
   require "../../backend/function.inc.php";
   if(isset($_GET["bid"])){
      $bid=$_GET["bid"];
      echo($bid);
   }
?>