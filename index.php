<?php require "templates/loginnav.php" ?>
<body id = "bodylogin">
 <div id="login">
    <form action="backend/login.inc.php" method="post">
      <div class ="inputfieldlogin">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username/Email" class="login_text">
        <input type="password" name="password" placeholder="Password" class="login_text" id="pass1" >
         <div style="font-size:small;">Show Password <input type="checkbox" onclick="showPassSignin()"></div> 
         <div class = "success">
        <?php
         if(isset($_GET["error"])){
           if($_GET["error"]=="signupdone"){
              echo("<p> Sign Up completed log in !! </p>");
            }
            if($_GET["error"]=="loggedout"){
              echo("<p> Logged out !! </p>");
            }
          }
        ?>
        </div>
        <div class="error">
        <?php
         if(isset($_GET["error"])){
           if($_GET["error"]=="invalidlogin"){
              echo("<p>Wrong Username or Password! </p>");
            }
            if($_GET["error"]=="emptyinput"){
              echo("<p>Enter Username and Password! </p>");
            }
          }
        ?>
        </div>
        <input type="submit" class="button"name="login" value="Login">
     </div>
    </form>
 </div>
<?php require "templates/footer.php" ?>