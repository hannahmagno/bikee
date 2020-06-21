<?php include('Header.php');?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>

</style>
</head>
<body>
<?php
include('Conn.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

mysqli_select_db($conn,"bikeshop"); 

$orderid = $_GET['orderid'];

if ($orderid >=0) {
$sql = "SELECT orderitem.orderid, orderitem.itemid, orderitem.quantity, orderitem.unitPrice, items.itemDesc
        FROM orderitem, items
        WHERE orderitem.itemid=items.id and orderitem.orderid = '$orderid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    echo "
	<style>
		td {
			font-family:Calibri;
			font-weight: bold;
            color:#49413B;
		} 
		th {
			font-family:system-ui;
			text-transform: uppercase;
			color:#FF6F00;
		}
    </style>
	";
    echo "
    <h1 style='font-size:25px;font-family:system-ui;color:#FF6F00;margin-top:60px' align='center'>ORDER DETAILS</h1>
    <div align='center'><table width=40% style='align:center; border-color:#E6DFDF;margin-top:20px' border=1  frame=hsides rules=rows><tr>
    <th width=40%>Item Name</th>
    <th width=17%>Quantity</th>
    <th width=45%>Unit Price</th>

    </tr> ";


    // output data of each row
	
	$i = 1;
    $count = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result))
   {
    echo '<tr>';
    echo '<td height="30" style="text-align:center">'.$row['itemDesc'].'</td>';	
    echo '<td style="text-align:center">'.$row['quantity'].'</td>';
    echo '<td style="text-align:center">'.'₱'.$row['unitPrice'].'</td>';  	
    echo '<td>';
    //if($i == $count){		
			
		
    echo '</td>';
    echo '</tr>';
    $i++;
    }   
} 

$conn->close();
}
$username = $_GET["username"];


?>
 
 </table> 
 
</body>
</html>