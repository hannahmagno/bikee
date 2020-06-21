<?php include('Header.php') ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="DRMStyle.css">
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
$sql = "SELECT * FROM items";
$result = $conn->query($sql);
$username = $_GET["username"]; 	

if ($result->num_rows > 0) {
    echo "
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
    <div align='center'>
    <table  width=80% style='align:center; border-color:#E6DFDF;margin-top:50px' border=1  frame=hsides rules=rows><tr><th width=5%>Item Code</th>
    <th width=18%>Description</th>
    <th width=8%> Type</th>
    <th width=8%>Unit Price</th>
    <th width=15%>Image File</th>
    <th width=10%>Action</th></tr> 
    ";
    // output data of each row
	
	$i = 1;
    $count = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result))
   {
    echo '<tr>';

    echo '<td height="30" style="text-align:center">'.$row['id'].'</td>';	
    echo '<td style="text-align:center">'.$row['itemDesc'].'</td>';
    echo '<td style="text-align:center">'.$row['itemType'].'</td>';  
	echo '<td style="text-align:center">'.'₱ '.$row['price'].'</td>';  
	echo '<td style="text-align:center">'.$row['image'].'</td>';

    echo '<td align="center">';
    //if($i == $count){	
        
		//echo '<td>'; ?>
		<a href="UpdateItem.php?username=<?php echo $username; ?>&id=<?php echo $row["id"]; ?>"><img src="button_edit.png" style="width:70px;height: 27px" align="middle"/></a>			
        <?php
        
        //echo '<td>';	
        ?>
		<a href="DeleteItem.php?username=<?php echo $username; ?>&id=<?php echo $row["id"]; ?>"><img src="button_delete.png" style="width:70px;height: 27px" align="middle"/></a>			
        <?php
    echo '</td>';
    echo '</tr>';
    $i++;
    }   
    echo '</table></div>';
}

$conn->close();
?>

 </table> 
</br><p style="text-align:center"><a href="InsertItem.php?username=<?php echo $username; ?>"><img src="button_insert.png" style="width:200px;height: 40px" align="middle"/></a></p>

</body>
</html>