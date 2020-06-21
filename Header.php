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
				<?php  if (isset($_GET['username'])) : ?>
					<a href="UserProfile.php?username=<?php echo $_GET['username']; ?>"><?php echo $_GET['username'];?>!</a></p>
				<?php endif ?>
				
				<ul>
					<?php  if (isset($_GET['username'])) : ?>
						<li><a href="Home.php?logout='1'">Sign Out</a></li>
						<?php  if ($_GET['username'] == 'admin') : ?>
							<li><a href="ViewOrder.php?username=<?php echo $_GET['username']; ?>">Customer Orders</a></li>
							<li><a href="AdminViewItems.php?username=<?php echo $_GET['username']; ?>">Bike & Parts</a></li>
						<?php  else : ?>
	  						<li><a href="TrackOrder.php?username=<?php echo $_GET['username']; ?>">Orders</a></li>
							<li><a href="Cart.php?username=<?php echo $_GET['username']; ?>">Cart</a></li>
							<li><a href="CustomerViewItems.php?username=<?php echo $_GET['username']; ?>&view=all">Bike & Parts</a></li>
				    	<?php endif ?>
					<?php endif ?>	

					<?php  if (!isset($_GET['username'])) : ?>
						<li><a href="SignIn.php">Sign In</a></li>
					<?php endif ?>
					

					<li><a href="Home.php?username=<?php echo $_GET['username']; ?>">Home</a></li>
	
				
				</ul>
			</nav>
		</div>
	</header>
</body>
</html>