
<?php
include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();
session_start();

if(isset($_SESSION['id'])){
   //SQL Query
  $select_data = "SELECT * from orders";
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
            <h3>Orders</h3>
            <a href="order-form.php?o=add" class="stage_class"><i class="fa fa-plus"></i> Add Order</a>
         </div>
         <div class="table-responsive">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th class="border-top-0">S.No.</th>
                     <th class="border-top-0">Client Name</th>
                     <th class="border-top-0">Client Contact</th>
                     <th class="border-top-0">Sub Total</th>
                     <th class="border-top-0">GST</th>
                     <th class="border-top-0">Total Amount</th>
                     <th class="border-top-0">Discount</th>
                     <th class="border-top-0">Grand Total</th>
                     <th class="border-top-0">Paid Amount</th>
                     <th class="border-top-0">Due Amount</th>
                     <th class="border-top-0">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (count($get_listing) > 0) {
                     $i = 1;
                     foreach ($get_listing as $value) {
                  ?>
                  <tr>
                     <td><?php echo $i++; ?></td>
                     <td><?php echo $value['client_name'] ?></td>
                     <td><?php echo $value['client_contact'] ?></td>
                     <td>£<?php echo $value['sub_total'] ?></td>
                     <td>£<?php echo $value['vat'] ?></td>
                     <td>£<?php echo $value['total_amount'] ?></td>
                     <td>£<?php echo $value['discount'] ?></td>
                     <td>£<?php echo $value['grand_total'] ?></td>
                     <td>£<?php echo $value['paid'] ?></td>
                     <td>£<?php echo $value['due'] ?></td>
                    
                     <td>
                        <a href="order-form.php?o=editOrd&i=<?php echo $value["order_id"]; ?>"><i class="fa fa-edit"></i></a>
                        <a href="delete-order.php?order_id=<?php echo $value["order_id"]; ?>"><i class="fa fa-trash"></i></a>
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
