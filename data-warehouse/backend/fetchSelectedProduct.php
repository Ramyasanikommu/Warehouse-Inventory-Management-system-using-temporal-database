<?php
include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();

$productId = $_POST['productId'];

$sql = "SELECT product_id, product_name, product_image, brand_id, category_id, quantity, rate,  status FROM products WHERE product_id = $productId";
$result = $conn->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$conn->close();

echo json_encode($row);

?>