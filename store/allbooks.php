<?php
   require "../templates/storenav.php";
  ?>
  <body>
    <p> 
    <?php
    echo($_SESSION["uid"]."<br>");
    echo($_SESSION["username"]."<br>");
    echo($_SESSION["fname"]."<br>");
    echo($_SESSION["lname"]."<br>");
    echo($_SESSION["email"]."<br>");
    ?>
    </p>
  </body>
