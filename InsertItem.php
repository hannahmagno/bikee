<?php include('Header.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Items (For Admins Only)</title>
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
			border:none;
			width: 50%;
        }
        td {
			font-family:Calibri;
			font-weight: bold;
            color:#49413B;
            font-size:20px;
		} 

</style>
</head>

<body>
    
    <form method="post" action="" enctype="multipart/form-data">
    <table>
    <h1 style="font-size:25px;font-family:system-ui;color:#FF6F00;margin-top:20px" align="center">INSERT NEW ITEM</h1>
        <div style="margin-top:50px">
        <tr>
        <td height="40" width="179"><b><font color='Black'>Name<em></em></font></b></td>
        <td class="input-group"><label>
        <input type="text" name="ItemDesc"/>
        </label></td>
        </tr>
        
        <tr>
        <td height="40" width="179"><b><font color='Black'>Price<em></em></font></b></td>
        <td class="input-group"><label>
        <input type="text" name="UnitPrice"/>
        </label></td>
        </tr>

        <tr>
        <td height="40" width="179">
        <label><b><font color='Black'>Item Type</b></label></font> </td>
        <td><select name="ItemType" STYLE="font-size:17pt">>
            <option value="bike">bike</option>
            <option value="parts">parts</option>
        </select></td>
        </tr>
       
        <tr>
        <td height="40" width="179"><font color='Black'>Image<em></em></font></br></td>
        <td>
        <input type="file" name="image">
        </td>
        </tr>
            
        </div>
    
    </table>
    <div align="center">
            <button type="submit" class="btn" name="add_item">Insert Item</button>
    </div>
    <br/>
    </form>
    
</body>
</html>
<?php
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'BikeShop');
$desc = ""; 
$price="";  
$type="";
if (isset($_POST['add_item'])) {
    if (empty($_POST['ItemDesc'])) {
        array_push($errors, "Item Description is required");
    }
    if (empty($_POST['UnitPrice'])) {
        array_push($errors, "Unit Price is required");
    }
    if (empty($_POST['ItemType'])) {
        array_push($errors, "Item Type is required");
    }
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp,"product-images/".$image);
    $desc = $_POST['ItemDesc'];
    $price = $_POST['UnitPrice'];
    $type = $_POST['ItemType'];
    $username = $_GET["username"];
    if (count($errors) == 0) {
        $query = "INSERT INTO items (itemdesc, price, itemType, image) VALUES ('$desc', '$price', '$type', '$image')";
        mysqli_query($db, $query);
        header("Location: AdminViewItems.php?username=$username");	     
    }
}
?>