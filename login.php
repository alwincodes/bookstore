<?php require "templates/loginnav.php" ?>
<body id = "bodylogin">
 <div id="login">
    <form action="" method="post">
      <div class ="inputfield">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username" class="login_text">
        <input type="password" name="password" placeholder="Password" class="login_text" id="pass1" >
         <div style="font-size:small;">Show Password <input type="checkbox" onclick="showPassSignin()"></div> 
        <input type="submit" class="button"name="login" value="Login">
     </div>
    </form>
 </div>
</body>
</html>