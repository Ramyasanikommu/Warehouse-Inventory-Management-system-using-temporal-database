
<?php
include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();
session_start();

if(isset($_SESSION['id'])){
    //SQL Query
   $select_data = "SELECT * from brands";
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
            <h3>Brands</h3>
            <a href="brand-form.php" class="stage_class"><i class="fa fa-plus"></i> Add Brand</a>
         </div>
         <div class="table-responsive">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th class="border-top-0">S.No</th>
                     <th class="border-top-0">Name</th>
                     <th class="border-top-0">Status</th>
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
                     <td><?php echo ucfirst($value['name']) ?></td>
                     <td>
                        <?php if($value['status'] == 1) { ?>
                        <label class="label label-success">Active</label>
                        <?php } else {?>
                        <label class="label label-danger">Inactive</label>
                        <?php } ?>
                     </td>
                     <td>
                        <a href="brand-form.php?id=<?php echo $value["id"]; ?>"><i class="fa fa-edit"></i></a>
                        <a href="delete-brand.php?id=<?php echo $value["id"]; ?>"><i class="fa fa-trash"></i></a>
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
