<?php
include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();

    $id = $_GET['order_id'];

    $sql = "DELETE FROM orders WHERE order_id='$id'";
    $result = mysqli_query($conn, $sql);

	$sql1 = "DELETE FROM order_item WHERE order_id='$id'";
    $result1 = mysqli_query($conn, $sql1);

    if($result && $result1){
    	
	    echo "<script>alert('Order deleted successfully')</script>";
	    echo "<script>window.location='orders-list.php'</script>";

	} else {
		
	    echo "<script>alert('There's problem deleting this record')</script>";
		echo "<script>window.location.href ='delete-order.php' </script>";
	} 

?>