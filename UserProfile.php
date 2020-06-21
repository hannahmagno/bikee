<?php include('Header.php') ?>

<?php
  $name='';
  include('Conn.php');  
  require_once("DBFunctions.php");
  $errors = array();
    $db = new DBFunctions();
  $GLOBALS["current_username"] = $_GET["username"];
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
    mysqli_select_db($conn,"bikeshop");	
    
    $sql = "SELECT * from customers WHERE username='$current_username'";  
    $result = mysqli_query($conn, $sql) 
    or die(mysql_error());
    $row = mysqli_fetch_array($result);	
	if($row) {   
		$name = $row['name'];       
        $username = $row['username'];     	  			 
		$email = $row['email'];   
        $address = $row['address'];  
        $contact = $row['contact'];  
	}								             
?>

<html>
<head>
<title>Edit Records</title>
<style>
        form {
			width: 30%;
			margin: 60px auto;
			padding: 10px;
            border-style:outset;
            background: white;
            margin-bottom: 10px;
        }
        .input-group input {
			height: 20px;
			width: 85%;
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
        td {
			font-family:Calibri;
			font-weight: bold;
            color:#49413B;
            font-size:20px;
            height:50;
		} 

</style>
</head>
<body>

<form action="" method="post">
<table border="0">
<tr>
<h1 style="font-size:25px;font-family:system-ui;color:#FF6F00;margin-top:20px" align="center">EDIT YOUR PROFILE</h1>
<br/><br/>
<tr>
<td height="40" width="179"><b><font color='Black'>Name<em></em></font></b></td>
<td class="input-group"><label>
<input type="text" name="name"  value="<?php echo $name; ?>"  />
</label></td>
</tr>

<tr>
<td height="40" width="179"><b><font color='Black'>Username<em></em></font></b></td>
<td class="input-group"><label>
<input type="text" name="username" value="<?php echo $username; ?>" />
</label></td>
</tr>

<tr>
<td height="40" width="179"><b><font color='Black'>Address<em></em></font></b></td>
<td class="input-group"><label>
<input type="text" name="address" value="<?php echo $address; ?>" />
</label></td>
</tr>

<tr>
<td height="40" width="179"><b><font color='Black'>Email<em></em></font></b></td>
<td class="input-group"><label>
<input type="text" name="email" value="<?php echo $email; ?>" />   
</label></td>
</tr>

<tr>
<td height="40" width="179"><b><font color='Black'>Contact<em></em></font></b></td>
<td class="input-group"><label>
<input type="text" name="contact" value="<?php echo $contact; ?>" />
</label></td>
</tr>


</table>
<div align="center"><input type="submit" name="submit" value="Save Changes" class="btn"></div>
<br/>
</form>
<div align="center" style="font-size:18px"><a href="ChangePassword.php?username=<?php echo $current_username;?>"><img src="button_changepassword.png" style="width:150px;height: 40px" /></a></div>
</body>
</html>

<?php


 if (isset($_POST['submit'])) { 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
        mysqli_select_db($conn,"bikeshop");	
		$name =$_POST['name'];
		$username =$_POST['username'];
		$address =$_POST['address'];
        $email =$_POST['email'];
        $contact =$_POST['contact'];
        

        $result = $db->select_query("SELECT * FROM customers WHERE username='$username' LIMIT 1");
        
        if (empty($result) || $current_username==$username) {
            $sql = "UPDATE customers SET name='$name', username ='$username', address='$address',email='$email',contact='$contact'  WHERE username='$current_username'";	   
            $result = $conn->query($sql);
            echo "<script type='text/javascript'>alert('Record updated!) </script>";           
            mysqli_close($conn);
            header("Location: UserProfile.php?username=$username");
        }
        else if ($current_username!=$username){ 
            echo "<div align='center'><h>Username/Email already exists</h></div>";
        }


        
	    
 }

?>
	 
	 
 
 








