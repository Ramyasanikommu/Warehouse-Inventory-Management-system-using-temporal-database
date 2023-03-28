
<?php
include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();
session_start();

if(isset($_SESSION['id'])){
   //SQL Query
   $select_data = "SELECT products.*, categories.name as category_name, brands.name as brand_name from products JOIN categories ON products.category_id = categories.id  JOIN brands ON products.brand_id = brands.id";
  //Initialize array
  $get_listing = array();
  //Execute sql query
  $result_data = mysqli_query($conn, $select_data);
       // If records exists
     if(mysqli_num_rows($result_data) > 0){
        $i = 0;
        //Fetch records one by one
        while($row = mysqli_fetch_array($result_data)){
           $get_listing[$i++] = $row;
        }
     }
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
            <h3>Products</h3>
            <a href="product-form.php" class="stage_class"><i class="fa fa-plus"></i> Add Product</a>
         </div>
         <div class="table-responsive">
            <table class="table table-striped" style="overflow:x-scroll">
               <thead>
                  <tr>
                     <th class="border-top-0">S.No</th>
                     <th class="border-top-0">Image</th>
                     <th class="border-top-0">Brand</th>
                     <th class="border-top-0">Category</th>
                     <th class="border-top-0">Product Name</th>
                     <th class="border-top-0">Quantity</th>
                     <th class="border-top-0">Price</th>
                     <th class="border-top-0">Status</th>
                     <th class="border-top-0">Transaction Time</th>
                     <th class="border-top-0">View Temporal Database</th>
                     <th class="border-top-0">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (count($get_listing) > 0) {
                     $i = 1;
                     foreach ($get_listing as $value) {
                  ?>
                  <tr>
                     <td>
                        <div class="display-flex">
                           <h4><?php echo $i++; ?></h4>
                        </div>
                     </td>
                     <td><img style="width:100px;height:100px;" src="../uploads/<?php echo $value['product_image'] ?>"></td>
                     <td><?php echo ucfirst($value['brand_name']) ?></td>
                     <td><?php echo ucfirst($value['category_name']) ?></td>
                     <td><?php echo ucfirst($value['product_name']) ?></td>
                     <td><?php echo $value['quantity'] ?></td>
                     <td>£<?php echo $value['rate'] ?></td>
                     <td>
                        <?php if($value['status'] == 1) { ?>
                        <label class="label label-success">Active</label>
                        <?php } else {?>
                        <label class="label label-danger">Inactive</label>
                        <?php } ?>

                     </td>
                     <td><?php echo date("d M,Y h:i a",strtotime($value['transaction_time'])); ?></td>
                     <td><a href="view-temporal-data.php?product_id=<?php echo $value["product_id"]; ?>"><i class="fa fa-eye"></i></a></td>

                     <td>
                        <a href="product-form.php?product_id=<?php echo $value["product_id"]; ?>"><i class="fa fa-edit"></i></a>
                        <a href="delete-product.php?product_id=<?php echo $value["product_id"]; ?>"><i class="fa fa-trash"></i></a>
                     </td>
                     </tr>
                  <?php
                        }
                  } ?>
               </tbody>
            </table>
         </div>


        </section>
        <?php include('include/footer.php'); ?>
    </body>
</html>
