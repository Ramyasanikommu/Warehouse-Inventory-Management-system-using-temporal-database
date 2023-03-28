<?php
include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();

    $id = $_GET['id'];

    $sql = "DELETE FROM categories WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
    	
	    echo "<script>alert('Category deleted successfully')</script>";
	    echo "<script>window.location='category-list.php'</script>";

	} else {
		
	    echo "<script>alert('There's problem deleting this record')</script>";
		echo "<script>window.location.href ='delete-category.php' </script>";
	} 

?>