<!DOCTYPE html>
<html>
<head>
        <title>Login</title>
        <link rel="stylesheet" href="css/login.css">
        <script src="https://use.fontawesome.com/0cf079388a.js"></script>
        
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
      <input type="email" id="login" class="fadeIn second" name="login1" placeholder="E-mail">
      <input type="password" id="password" class="fadeIn third" name="login2" placeholder="password">
      <i id="show" class="fa fa-eye" aria-hidden="true"></i>
      <input type="submit" name="login" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
<script>
  const togglePassword = document.querySelector('#show');
  const password = document.querySelector('#password');
  togglePassword.addEventListener('click', function (e) {
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  this.classList.toggle('fa-eye-slash');
});
</script>
</html>
