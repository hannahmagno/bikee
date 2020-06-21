<style>

</style>
</head>
<body>
	
<?php
include('Conn.php');
include('Header.php');



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

mysqli_select_db($conn,"bikeshop"); 
//$sql = "SELECT * FROM orderin";
$sql = "SELECT orderin.orderid, orderin.orderDate, orderin.totalAmount, customers.name FROM orderin, customers WHERE orderin.custid=customers.id";
$result = $conn->query($sql);

if (!empty($result)) {
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
	echo "<div align='center'><table width=60% style='align:center; border-color:#E6DFDF;margin-top:50px' border=1  frame=hsides rules=rows><tr>
	<th width=10%>Order ID</th>
    <th width=30%>Customer Name</th>
    <th width=20%>Date of Order</th>
	<th width=25%>Total Amount</th>
	<th width=20%>Order Details</th>
    </tr> ";
    // output data of each row
    $count = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result))
   {
    echo '<tr>';
	echo '<td height="35" style="text-align:center">'.$row['orderid'].'</td>';	
    echo '<td style="text-align:center">'.$row['name'].'</td>';
    echo '<td style="text-align:center">'.$row['orderDate'].'</td>';  
	echo '<td style="text-align:center">'.'₱'.$row['totalAmount'].'</td>';  
    echo '<td align="center">';	
	$orderid = $row["orderid"]; ?>
	<a href="ViewOrderDetails.php?username=<?php echo $_GET['username']; ?>&orderid=<?php echo $orderid; ?>"><img src="button_view.png" style="width:120px;height: 30px"/></a>
	<?php
	echo '</td>';
	echo '</tr>';
	}  echo '</table></div>';
	} else {
		echo '<div style="text-align:center">';
    	echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
    	echo "You don't have orders yet";
	}
$conn->close();
?>
 
 </table> 
 
</body>
</html>