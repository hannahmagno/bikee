<?php
include('Header.php');
  $itemDesc='';
  include('Conn.php');  
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
       mysqli_select_db($conn,"bikeshop");	
	   if (isset($_GET['id']) && is_numeric($_GET['id']))
       {	
       $id = $_GET['id'];	
           $sql = "SELECT * from items WHERE id='$id'";  
           $result = mysqli_query($conn, $sql) 
           or die(mysql_error());
           $row = mysqli_fetch_array($result);	
	
	       if($row){   
			    $itemDesc = $row['itemDesc'];       
                $itemType = $row['itemType'];    			 
                $price = $row['price']; 
                $old_image = $row['image'];      
		   }								             
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

<form method="post" action="" enctype="multipart/form-data">
<table border="0">
 <h1 style="font-size:25px;font-family:system-ui;color:#4E4A45;margin-top:20px" align="center">UPDATE ITEM</h1>
 <br/>
<td height="40" width="179"><b><font color='Black'>Itemcode<em></em></font></b></td>
<td class="input-group"><label>
<input type="text" disabled="disabled" name="id"  value="<?php echo $id; ?>"/>
</label></td>
</tr>

<tr>
<td height="40" width="179"><b><font color='Black'>Description<em></em></font></b></td>
<td class="input-group"><label>
<input type="text" name="itemDesc"  value="<?php echo $itemDesc; ?>"  />
</label></td>
</tr>

<tr>
<td height="40" width="179"><b><font color='Black'>Type<em></em></font></b></td>
<td class="input-group"><label>
<input type="text" name="itemType" value="<?php echo $itemType; ?>" />
</label></td>
</tr>

<tr>
<td height="40" width="179"><b><font color='Black'>Unit Price<em></em></font></b></td>
<td class="input-group"><label>
<input type="number" step=".01" name="price" value="<?php echo $price; ?>" />   
</label></td>
</tr>

<tr>
<td height="40" width="179"><b><font color='Black'>Image File<em></em></font></b></td>
<td><label>
<input type="file" name="image" value="<?php echo $image; ?>" />   
</label></td>
</tr>

</table>
<div align="center"><input type="submit" name="submit" value="Save Changes" class="btn"></div>
<br/>
</form>
</body>
</html>

<?php


if (isset($_POST['submit'])) {
	$username = $_GET["username"];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo '$id';
    mysqli_select_db($conn,"bikeshop");	
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {	
        $id = $_GET['id'];
        if (!empty($_POST['itemDesc'])) {
            $itemDesc =$_POST['itemDesc'];
        }
        if (!empty($_POST['itemType'])) {
            $itemType =$_POST['itemType'];
        }
        if (!empty($_POST['itemType'])) {
            $price =$_POST['price'];
        }
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];  
        if (!move_uploaded_file($image_tmp,"product-images/".$image))
            $image=$old_image;
            
        $sql = "UPDATE items SET itemDesc='$itemDesc', itemType ='$itemType', price='$price',image='$image'  WHERE id='$id'";	   

        $result = $conn->query($sql);
        echo "<script type='text/javascript'>alert('Record updated!) </script>";           
                 
        header("Location: AdminViewItems.php?username=$username");	      	      
    } 
    mysqli_close($conn);    
 }

?>