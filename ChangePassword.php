<?php 
include('Header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Privacy Settings</title>
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
			width: 50%;
		}
	</style>
</head>
<body>

  <br/><br/><br/><br/>
  <form method="post" >
  <h1 style="font-size:25px;font-family:system-ui;color:#FF6F00;margin-top:20px" align="center">CHANGE PASSWORD</h1>
  <br/><br/>		
  	<div class="input-group">
  		<label>Old Password</label>
  		<input type="password" name="old_password" >
  	</div>
  	<div class="input-group">
  		<label>New Password</label>
  		<input type="password" name="new_password">
  	</div>
  	<div class="input-group" align="center">
  		<button type="submit" name="changePS" class="btn">Save Changes</button>
  	</div>
  </form>
</body>
</html>

<?php
require_once("DBFunctions.php");
$db = new DBFunctions();

if (isset($_POST["changePS"])) {
    $username = $_GET["username"];
    $old_password = $_POST["old_password"];
    $old_password = md5($old_password);

    $new_password = $_POST["new_password"];
    $new_password = md5($new_password);
    
    $errors = array();

    $result = $db->select_query("SELECT * FROM customers WHERE username='$username' AND password='$old_password'");  
    if (!empty($result)) {
        $sql = "UPDATE customers SET password='$new_password' WHERE username='$username'";	   
        $result = $db->run_query($sql);
        header("Location: UserProfile.php?username=$username");
    } else {
        header("Location: Home.php");
    }
}

?>