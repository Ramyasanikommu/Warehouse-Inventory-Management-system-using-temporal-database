<?php
include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();

$sql = "SELECT product_id, product_name FROM products WHERE status = 1";
$result = $conn->query($sql);

$data = $result->fetch_all();

$conn->close();

echo json_encode($data);

?>