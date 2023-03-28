
<?php
include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();
session_start();

if(isset($_SESSION['id'])){
    //Count Products
   $select_data = "SELECT * from products";
   $result_data = mysqli_query($conn, $select_data);
   $total_products = mysqli_num_rows($result_data);

    //Count Brands
    $select_data2 = "SELECT * from brands";
    $result_data2 = mysqli_query($conn, $select_data2);
    $total_brands = mysqli_num_rows($result_data2);

    //Count Categories
   $select_data3 = "SELECT * from products";
   $result_data3 = mysqli_query($conn, $select_data3);
   $total_categories = mysqli_num_rows($result_data3);

    //Count Orders
    $select_data1 = "SELECT * from orders";
    $result_data1 = mysqli_query($conn, $select_data1);
    $total_orders  = mysqli_num_rows($result_data1);
}
else{
   echo "<script>window.location.href ='login.php' </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>
    <body class="empcolor">
        <?php include('include/sidebar.php'); ?>
        <section class="page_wrapper">
            <?php include('include/header.php'); ?>
        
            <div class="page-heading-title">
                <h3>Dashboard</h3>
            </div>

            <section class="first">
                <div class="container">
                    <div class="col3">
                        <h2>Total Brands</h2>
                        <h3><?php echo $total_brands; ?></h3>
                    </div>
                    <div class="col3">
                        <h2>Total Categories</h2>
                        <h3><?php echo $total_categories; ?></h3>
                    </div>
                    <div class="col3">
                        <h2>Total Products</h2>
                        <h3><?php echo $total_products; ?></h3>
                    </div>
                    <div class="col3">
                        <h2>Total Orders</h2>
                        <h3><?php echo $total_orders; ?></h3>
                    </div>
                  
                </div> 
               
            </section>


        </section>
        <?php include('include/footer.php'); ?>
    </body>
</html>
