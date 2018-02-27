<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
#backgroundpic
{
  background: url(uic.jpg);
  position: relative;
  background-repeat: no-repeat;
  background-size:100% 100vh;
}
</style>
<body id="backgroundpic">
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>ID</label>
  	  <input type="number" name="id">
  	</div>
  	<div class="input-group">
      <label>Name</label>
      <input type="text" name="name">
    </div>
    <div class="input-group">
      <label>Cellphone number<br>ex: 639123456789</label>
      <input type="number" name="number" min="63900000000" max="639999999999">
    </div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>