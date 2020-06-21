<?php include('Header.php') ?>

<?php
require_once("DBFunctions.php");
$db = new DBFunctions();

$GLOBALS['username'] = $_GET["username"];
if(!empty($_GET["action"])) {
		if(!empty($_POST["quantity"])) {
			$row = $db->select_query("SELECT * FROM items WHERE id='" . $_GET["id"] . "'");
			$itemid = $row[0]["id"];
			$quantity = $_POST["quantity"];
			$unitPrice = $row[0]["price"]*$quantity;
			$row = $db->select_query("SELECT * FROM customers WHERE username='" . $_GET["username"] . "'");
			$custid = $row[0]['id'];
			$db->run_query("INSERT INTO ordercart (custid, itemid, quantity, unitPrice) VALUES ('$custid', '$itemid', '$quantity', '$unitPrice')");
		}
}

	switch($_GET["view"]) {
		case "bike": $row = $db->select_query("SELECT * FROM items WHERE itemType='bike'");
		break;
		case "parts": $row = $db->select_query("SELECT * FROM items WHERE itemType='parts'");
		break;
		case "all": $row = $db->select_query("SELECT * FROM items ORDER BY id ASC");
		break;
	}

?>
<HTML>
<head>
	<title>View Items</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
	<style> 
	img {
		width: 180px;height: 200px;
	}
	td {
	width: 260px;
	height: 250px;
	}

		

	td:hover{
		background-color:#d7cfd8;
	}
	.form-btn {
		border:none;
		background-color:transparent;
		float:left;
		width:15%;
		padding: 50px 0 10px 0;
		
	}
	.form-btn-style {
		font-size:20px;
		width:90%;
		height:50px;
		border-radius: 5px;
		color:#ffffff;
		border:none;
	}
	.f {
		font-family:system-ui;
	}
	
	
	</style>
</head>
<body>
<div align="center">
	<table style='align:center;margin-top:50px' width=40%>
	<th width=10%><a href="CustomerViewItems.php?username=<?php echo $username; ?>&view=bike"><img src="button_bike.png" style="width:200px;height: 50px" /></th>
	<th width=10%><a href="CustomerViewItems.php?username=<?php echo $username; ?>&view=parts"><img src="button_parts.png" style="width:200px;height: 50px" /></th>
	<th width=10%><a href="CustomerViewItems.php?username=<?php echo $username; ?>&view=all"><img src="button_all.png" style="width:200px;height: 50px" /></th>
	</table>
</div>
<div align="center">
	
	
	<table style="align:center">
	<?php
	$i=0;
	//$row = $db->select_query("SELECT * FROM items ORDER BY id ASC");
	
	if (!empty($row)) { 
		foreach($row as $key=>$value){
	?>
			<form method="post" action="CustomerViewItems.php?action=add&id=<?php echo $row[$key]["id"]; ?>&username=<?php echo $username; ?>&view=all">
				<?php if($i%5==0) { echo "<tr>"; } ?>
				<td><ul class="nobull" style>
				<li><img src="<?php echo 'product-images/'.$row[$key]["image"]; ?>"></li>
				<li class="f"><?php echo $row[$key]["itemDesc"]; ?></d>
				<li class="f"><?php echo "₱".$row[$key]["price"]; ?></li>
				<li class="f"><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart"/></li>
				</ul></td>
				<?php if($i%5==4) { echo "</tr>"; } $i++; ?>
			</form>
	<?php
		}
	}
	?>
	</table>
</div>
</body>
</HTML>