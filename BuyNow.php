<?php include('Header.php');?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="DRMStyle.css">
<style>
table, th, td {
    border: 1px solid black;
}
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
$shippingAddress = $row['address'];

$sql = "SELECT * FROM ordercart WHERE custid = '$custid'";
$result = $conn->query($sql);
$totalAmount = 0;
if ($result->num_rows > 0) {
      $i = 1;
      $count = mysqli_num_rows($result);
      while($row = mysqli_fetch_assoc($result)) {
        $price = $row['quantity'] * $row['unitPrice'];
        $totalAmount += $price;
        $i++;
      }   
}

$query = "INSERT INTO orderin (custid, orderDate, totalAmount) VALUES ('$custid', NOW(), $totalAmount)";
mysqli_query($db, $query);
$sql = "SELECT * FROM orderin ORDER BY orderid DESC LIMIT 1";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$orderid = $row['orderid'];

$sql = "SELECT * FROM ordercart WHERE custid = '$custid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
      $i = 1;
      $count = mysqli_num_rows($result);
      while($row = mysqli_fetch_assoc($result)) {
        $itemid = $row['itemid'];
        $quantity = $row['quantity'];
        $unitPrice = $row['unitPrice'];
        $query = "INSERT INTO orderitem (orderid, itemid, quantity, unitPrice) VALUES ('$orderid', '$itemid', '$quantity', '$unitPrice')";
    
        mysqli_query($db, $query);
        
        $i++;
      }   
  }

$sql = "DELETE FROM ordercart WHERE custid = '$custid'";
$result = $conn->query($sql);
  
echo '<div style="text-align:center">';

?>

<div style="text-align:center;font-size:30px"><br/><br/><br/><br/>Successfully placed your order!</div>
<?php
$conn->close();
?>
 
 </table> 
 
</body>
</html>