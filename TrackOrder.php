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
$db = mysqli_connect('localhost', 'root', '', 'bikeshop');
$sql = "SELECT * FROM customers WHERE username='" . $_GET["username"] . "'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$custid = $row['id'];


$sql = "SELECT * FROM orderin WHERE custid = '$custid' ";
$result = $conn->query($sql);
$orderid = -1; //initialize orderid
$username = $_GET["username"];

if ($result->num_rows > 0) {

    echo '
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
    <div align="center">
    <table style="align:center;width:50%; border-color:#E6DFDF;margin-top:50px" border=1  frame=hsides rules=rows><tr>
    <th width=30%>Date</th>
    <th width=30%>Total Amount</th>
    <th>Order Details</th>
    </tr> ';
    
    
    // output data of each row
	
	$i = 0;
    $count = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result))
   {
   
    
    echo '<td height="50" style="text-align:center">'.$row['orderDate'].'</td>';  
	echo '<td style="text-align:center">'.'₱'.$row['totalAmount'].'</td>';  

    echo '<td align="center">';
    $orderid = $row["orderid"];
	?>
	<a href="ViewOrderDetails.php?username=<?php echo $_GET['username']; ?>&orderid=<?php echo $orderid; ?>"><img src="button_view.png" style="width:140px;height: 35px"/></a>
    <?php
    echo '</td>';
    echo '</tr>';
    $i++;
    }   
    echo '</table></div>';
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