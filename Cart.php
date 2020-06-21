
<?php include('Header.php') ?>

<?php
	require_once("DBFunctions.php");
	$db = new DBFunctions();
	$GLOBALS['username'] = $_GET["username"];


	if(!empty($_GET["action"])) {
		switch($_GET["action"]) {
			case "remove":
				$row = $db->select_query("SELECT * FROM customers WHERE username='" . $_GET["username"] . "'");
				$custid = $row[0]['id'];
				$db->run_query("DELETE FROM ordercart WHERE custid=$custid AND itemid='" . $_GET["id"] . "'");	
				//header("Location: Cart.php?username=$username");
			break;
			case "empty":
				$row = $db->select_query("SELECT * FROM customers WHERE username='" . $_GET["username"] . "'");
				$custid = $row[0]['id'];
				$db->run_query("DELETE FROM ordercart WHERE custid=$custid");	  
				//header("Location: Cart.php?username=$username");
			break;	
		}
	}
	$total_quantity=0; $total_price=0;
	$row = $db->select_query("SELECT items.id, items.itemDesc, items.itemType, items.price, items.image, ordercart.quantity, ordercart.unitPrice from items, ordercart, customers where customers.username='$username' and customers.id=ordercart.custid and ordercart.itemid=items.id");
	
	if (!empty($row)) { 
		?>
		<div align="center">
		<style>
		td {
			font-family:Calibri;
			font-weight: bold;
			color:#49413B;
		} 
		th{
			font-family:system-ui;
			text-transform: uppercase;
			color:#FF6F00;

		}
		</style>
		<table  width=80% style='align:center; border-color:#E6DFDF;margin-top:50px' border=1  frame=hsides rules=rows>

		
		<tr style="border-bottom: 1px">
		<th style="text-align:left;" width="20%">Item</th><th style="text-align:left;" width="5%">Type</th>
		<th style="text-align:right;" width="5%">Quantity</th> <th style="text-align:right;" width="10%">Unit Price</th>
		<th style="text-align:right;" width="10%">Price</th> <th style="text-align:center;" width="10%">Remove</th>
		</tr>
        <?php
		$i=0;
		foreach($row as $key=>$value){	
			
        ?>
			<tr>
			<td><img src="<?php echo 'product-images/'.$row[$key]["image"]; ?>" style="height:60px;width:60px;" align="middle"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[$key]["itemDesc"]; ?></td>
			<td style="text-align:left;"><?php echo $row[$key]["itemType"]; ?></td>
			<td style="text-align:right;"><?php echo $row[$key]["quantity"]; ?></td>
			<td style="text-align:right;"><?php echo "₱ ".$row[$key]["price"]; ?></td>
			<td style="text-align:right;"><?php echo "₱ ".$row[$key]["unitPrice"]; ?></td>
			<td style="text-align:center;"><a href="Cart.php?action=remove&id=<?php echo $row[$key]["id"]; ?>&username=<?php echo $username; ?>"><img src="delete-icon.png" alt="Remove Item" style="width: 30px;height: 30px" /></a></td>
			</tr>					
			<?php	
			$i++;
            $total_quantity += $row[$key]["quantity"];
            $total_price += ($row[$key]["price"]*$row[$key]["quantity"]);
	    }
            ?>

        <tr>
        <td colspan="2" align="right">TOTAL:</td>
        <td align="right"><?php echo $total_quantity; ?></td>
		<td align="right" colspan="2"><strong><?php echo "₱ ".number_format($total_price, 2); ?></strong></td>
		
        <td></td>
		</tr>
		</table>
		</div>
		<div style="margin-top: 30px" align="center"><a href="BuyNow.php?username=<?php echo $username; ?>"><img src="button_buy-now.png" style="width:200px;height: 50px"/></a></div>		
		<div style="margin-top: 20px" align="center"><a href="Cart.php?action=empty&username=<?php echo $username; ?>"><img src="button_empty-cart.png" style="width:150px;height: 40px" /></a></div>	
		
        <?php
    } else {
        ?>
        <div style="text-align:center;font-size:30px"><br/><br/><br/><br/>Your Cart is Empty</div>
    <?php 
	}
	

    ?>

