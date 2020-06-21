
<?php 
  session_start(); 
  if (isset($_SESSION['username'])) {
  $username = $_GET['username'];
  $_SESSION['username'] = $username;
  }
	if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("Location: Home.php?");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
	header #left_side {
		float:left;
		margin-left:50px;
	  }
	header li{ /*horiontal display & no bullets*/
		float:right;
		color:#ffffff;
		list-style-type: none;
		padding: 0 20px 0 20px;
  	}
	header{
		color:#ffffff;
		padding-top:30px;
		min-height:70px;
		
	}
	header a{ /*a are hyperlinks*/
		color:#ffffff;
		text-transform: uppercase;
		text-decoration:none;
		font-size:16px;
	}
	header a:hover{
		color:#cccccc;
		font-weight:bold;
  	}
	
	body{
    background-color: #FF681F;
	}

	
	</style>
</head>
<body>
	<header style="background-color:#FF681F">
		<div class="containter">
  			<div id="left_side">
			  <div class="header">
			  		<img src="bikee.png" alt="logo" style="width: 250px;height: 75px" />
				</div>
			</div>
			<nav>
				<p class="welcome">Welcome
				<?php  if (isset($_SESSION['username'])) : ?>
					<a href="UserProfile.php?username=<?php echo $_SESSION['username']; ?>"><?php echo $_SESSION['username'];?>!</a></p>
				<?php endif ?>
				
				<ul>
					<?php  if (isset($_SESSION['username'])) : ?>
						<li><a href="Home.php?logout='1'">Sign Out</a></li>
						<?php  if ($_SESSION['username'] == 'admin') : ?>
							<li><a href="ViewOrder.php?username=<?php echo $_SESSION['username']; ?>">Customer Orders</a></li>
							<li><a href="AdminViewItems.php?username=<?php echo $_SESSION['username']; ?>">Bike & Parts</a></li>
	  
						<?php  else : ?>
							<li><a href="TrackOrder.php?username=<?php echo $_SESSION['username']; ?>">Orders</a></li>
							<li><a href="Cart.php?username=<?php echo $_SESSION['username']; ?>">Cart</a></li>
							<li><a href="CustomerViewItems.php?username=<?php echo $_SESSION['username']; ?>&view=all">Bike & Parts</a></li>
				    	<?php endif ?>
					<?php endif ?>	

					<?php  if (!isset($_SESSION['username'])) : ?>
						<li><a href="SignIn.php">Sign In</a></li>
					<?php endif ?>
					
					<li><a href="Home.php?username=<?php echo $_SESSION['username']; ?>">Home</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<br/><br/><br/><br/><br/>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<img src="homee.png" alt="logo" class="center" style="width: 680px;height: 250px;
	display: block;
	margin-left:auto;
    margin-right: auto;" >

</body>
</html>