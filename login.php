<!DOCTYPE html>
<html>
<head>
        <title>Login</title>
        <link rel="stylesheet" href="css/login.css">
        
    </head>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>
    

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="images/loginnn.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form class="formm" action="user_login.php" method="POST">
      <input type="text" id="login" class="fadeIn second" name="login1" placeholder="E-mail">
      <input type="text" id="password" class="fadeIn third" name="login2" placeholder="password">
      <input type="submit" name="login" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</html>
