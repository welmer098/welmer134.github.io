<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>UIC SMS Notification</title>
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
<center>
<br><br>
<img src="logo.png" width="200" height="200">  
</center>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>ID</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Register Here</a>
  	</p>
  </form>
</body>
</html>