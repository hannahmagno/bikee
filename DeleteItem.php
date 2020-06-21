<?php
 
include('Conn.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
        mysqli_select_db($conn,"bikeshop");	

	   if (isset($_GET['id']) && is_numeric($_GET['id']))
       {	
			$id = $_GET['id'];
            $sql = "DELETE FROM ITEMS WHERE id='$id'";	   
	        $result = $conn->query($sql);
	        echo "<script type='text/javascript'>alert('Record deleted!') </script>";           
            $username = $_GET["username"];
            header("Location: AdminViewItems.php?username=$username");	        	      
	   }
       mysqli_close($conn);
?>