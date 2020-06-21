<?php include('Header.php') ?>
<?php include('Users.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Bike Shop - Sign Up</title>
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


  <form method="post" action="SignUp.php">
		<div align="center" style="color:#FF6F00">
			<h2>Sign up</h2>
		</div>
		<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name">
  	</div>
		<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
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
  	  <label>Address</label>
  	  <input type="text" name="address">
  	</div>
		<div class="input-group">
  	  <label>Contact</label>
  	  <input type="text" name="contact">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Sign up</button>
  	</div>
  	<p>
	  	Already have an account? <a href="SignIn.php">Sign in</a>
  	</p>
  </form>
</body>
</html>