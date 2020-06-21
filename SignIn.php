<?php 
include('Users.php');
include('Header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bike Shop - Sign In</title>
  <link rel="stylesheet" type="text/css" href="style.css">
	<style>
		form {
			width: 30%;
			margin: 10px auto;
			padding: 10px;
            border-style:outset;
			background: white;
        }
		.input-group label {
			display: block;
			text-align: left;
			margin: 3px;
		}
		.input-group input {
			height: 30px;
			width: 93%;
			padding: 5px 10px;
			font-size: 16px;
			border: 1px solid gray;
			}	
		.btn {
			padding: 10px;
			margin-top: 30px;
			font-size: 17px;
			color: white;
			background: #FF9933;
			border: none;
			width: 100%;
		}
	</style>
</head>
<body>

  
  <br/><br/><br/>
  <form method="post" action="SignIn.php">
		<div align="center" style="color:#FF6F00">
			<h2>Sign in</h2>
		</div>
		
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Sign in</button>
  	</div>
  	<p>
  		<a href="SignUp.php">Create Account</a>
  	</p>
  </form>
</body>
</html>