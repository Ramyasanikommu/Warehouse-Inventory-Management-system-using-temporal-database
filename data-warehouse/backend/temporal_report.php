<?php
include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();
session_start();
?>

<?php

$stmt=$conn->prepare("SELECT * FROM products");
$stmt->execute();
$result=$stmt->get_result();

if(isset($_POST['submit'])){
    
    $product_id = $_POST['product_id'];
    $s_date = $_POST['s_date'] . " 00:00:00";
    $e_date = $_POST['e_date'] . " 23:59:59";
    $stmt=$conn->prepare("SELECT AVG(quantity) AS avg_quantity, MIN(quantity) AS min_quantity, MAX(quantity) AS max_quantity, AVG(rate) AS average_rate, MIN(rate) AS min_rate, MAX(rate) AS max_rate, product_name FROM temporal_products WHERE product_id = ? AND (timestamp >= ? AND timestamp <= ?)");
    $stmt->bind_param("sss",$product_id,$s_date,$e_date);
    $stmt->execute();
    $result2=$stmt->get_result();
    $a_row=$result2->fetch_assoc();
    // print_r($a_row);
    // exit;
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>
   <body>

   <?php include('include/sidebar.php'); ?>

      <section class="page_wrapper">

        <?php include('include/header.php'); ?>
         <div class="page-heading-title">
               <h3>Generate Reports</h3>
         </div>
         
         <form action="" method="POST" enctype="multipart/form-data">

               <div class="form-group-grid-wrap">
                  <label for="">Select Product</label>
                  <select id="inputState" class="form-control" name="product_id" required>
                     <option value="">Choose Product</option>
                     <?php foreach($result as $value){ ?>
                        <option value="<?php echo $value['product_id'] ?>"><?php echo $value['product_name'] ?></option>
                     <?php } ?>
                  </select>
               </div><br>
            <div class="form_grid_wrap product_50">
            <div class="form-group-grid-wrap">
                  <label for="">Start Date</label>
                  <input type="date" name="s_date" class="form-control">
               </div>
               <div class="form-group-grid-wrap">
                  <label for="">End Date</label>
                  <input type="date" name="e_date" class="form-control">
               </div>
            </div> 
            <div class="form-btn">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
         </form>
      </section>
     <?php if(isset($a_row)){ ?>
      <section class="page_wrapper">
      <div class="page-heading-title">
            <h3>Report</h3>
         </div>
         <div class="table-responsive">
            <table class="table table-striped" style="overflow:x-scroll">
               <thead>
                  <tr>
                     <th class="border-top-0">Product Name</th>
                     <th class="border-top-0">Minimum Price</th>
                     <th class="border-top-0">Maximum Price</th>
                     <th class="border-top-0">Average Price</th>
                     <th class="border-top-0">Minimum Quantity</th>
                     <th class="border-top-0">Maximum Quantity</th>
                     <th class="border-top-0">Average Quantity</th>
                  </tr>
               </thead>
               <tbody>
                <td><?php echo $a_row['product_name'] ?></td>
                <td><?php echo $a_row['min_rate'] ?></td>
                <td><?php echo $a_row['max_rate'] ?></td>
                <td><?php echo round($a_row['average_rate'],2) ?></td>
                <td><?php echo $a_row['min_quantity'] ?></td>
                <td><?php echo $a_row['max_quantity'] ?></td>
                <td><?php echo round($a_row['avg_quantity'],2) ?></td>
               </tbody>
            </table>
         </div>
      </section>
<?php } ?>


      <?php include('include/footer.php'); ?>
     
   </body>
</html>