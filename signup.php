<?php require "templates/loginnav.php" ?>
<body id="bodylogin">
 <div id="login">
    <form action="backend/signup.inc.php" method="post">
    <div class ="inputfield">
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
        <input type="submit" class="button" name="signup" value="Sign-up">
    </div>
    </form>
 </div>
 <?php require "templates/footer.php" ?>