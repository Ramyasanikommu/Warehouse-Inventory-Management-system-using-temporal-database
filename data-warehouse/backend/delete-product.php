<?php
include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();

    $id = $_GET['product_id'];

    $sql = "DELETE FROM products WHERE product_id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
    	
	    echo "<script>alert('Product deleted successfully')</script>";
	    echo "<script>window.location='products-list.php'</script>";

	} else {
		
	    echo "<script>alert('There's problem deleting this record')</script>";
		echo "<script>window.location.href ='delete-product.php' </script>";
	} 

?>