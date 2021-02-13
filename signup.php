<?php require "templates/loginnav.php" ?>
<body id="bodylogin">
 <div id="login">
    <form action="backend/signup.inc.php" method="post">
    <div class ="inputfieldlogin">
    <h1>Sign Up</h1>
        <input type="text" name="firstname" placeholder="First name" class="login_text">
        <input type="text" name="lastname" placeholder="Last name" class="login_text">
        <input type="text" name="username" placeholder="Username" class="login_text">
        <input type="text" name="email" placeholder="Email" class="login_text">
        <input type="text" name="phno" placeholder="Phone-no" class="login_text">
        <div id="passcontain">
        <input type="password" name="password" placeholder="Password" class="login_text" id="pass1">
        <input type="password" name="rpassword" placeholder="Re-enter Password" class="login_text" id="pass2">
        </div>
        <div style="font-size:small;">Show Password <input type="checkbox" onclick="showPassSignup()"></div> 
        <div class = "error">
        <?php
         if(isset($_GET["error"])){
           if($_GET["error"]=="emptyinput"){
              echo("<p> Fill in all fields </p>");
            }
           if($_GET["error"]=="invaliduid"){
               echo("<p> Invalid uid </p>");
            }
            if($_GET["error"]=="invalidname"){
                echo("<p> Enter a correct name </p>");
            }
            if($_GET["error"]=="invalidemail"){
                echo("<p> Invalid Email </p>");
            }
            if($_GET["error"]=="invalidphoneno"){
                echo("<p> Invalid Phone no </p>");
            }
            if($_GET["error"]=="passwordsdontmatch"){
                echo("<p> both passwords don't match </p>");
            }
            if($_GET["error"]=="usernametaken"){
                echo("<p> User name already in use </p>");
            }
            if($_GET["error"]=="stmtfailed"){
                echo("<p> Sql error </p>");
            }
          }
        ?>
        </div>
        <input type="submit" class="button" name="signup" value="Sign-up">
    </div>
    </form>
 </div>
 <?php require "templates/footer.php" ?>