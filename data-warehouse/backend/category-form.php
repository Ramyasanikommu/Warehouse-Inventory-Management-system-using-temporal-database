<?php

include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();
session_start();


if(!isset($_SESSION['id'])){
   header('location:login.php');
   exit;
}

   //Add Form
   if (isset($_POST['add'])) {

      //get Paramaters
      $name = $conn->real_escape_string($_POST['name']);
      $status = $conn->real_escape_string($_POST['status']);

      //Query to execute
      $sql_query = "INSERT INTO `categories`(`name`,`status`) VALUES ('".$name."','".$status."')";

      //Execute Query
      $execute_query = mysqli_query($conn,$sql_query);

      //If query executes, redirect to stage list
      if($execute_query){
         echo "<script>alert('Category Added Successfully.')</script>";
         echo "<script>window.location.href ='category-list.php'</script>";
      } else {
         echo "<script>alert('There's problem in adding category')</script>";
         echo "<script>window.location.href ='category-form.php'</script>";
      }
   }

   
   //Edit Form
   if (isset($_POST['edit'])) {
    
      //get Paramaters
      $name = $conn->real_escape_string($_POST['name']);
      $status = $conn->real_escape_string($_POST['status']);

      
      $id = $_POST['id'];
  
  
      $sql = "UPDATE categories SET name = '$name', status = '$status' WHERE id='$id'";

      $result = mysqli_query($conn, $sql);
  
      if($result){
          
          echo "<script>alert('Updated Successfully')</script>";
          echo "<script>window.location='category-list.php'</script>";
  
      } else {
          echo "<script>alert('There's problem in updating.')</script>";
          echo "<script>window.location.href ='category-list.php' </script>";
      } 
  }


   if(isset($_GET['id'])){
      $result = mysqli_query($conn,"SELECT * from categories WHERE id='" . $_GET['id'] . "'"); 
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
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
            <?php if(isset($row['id'])){ ?>
               <h3>Edit Category</h3>
            <?php }else { ?>
               <h3>Add Category</h3>
            <?php }?>
         </div>
         
         <form action="category-form.php" method="post">
            <input type="hidden" name="id" value="<?php echo isset($row) ?  $row['id'] : ''; ?>">
            <div class="form_grid_wrap product_50">
               <div class="form-group-grid-wrap">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo isset($row) ?  $row['name'] : '' ?>"  placeholder="Name" required>
               </div>
               <div class="form-group-grid-wrap">
                  <label for="">Status</label>
                  <select id="inputState" class="form-control" name="status" required>
                     <option value="">Choose</option>
                     <option value="1"  <?php if(isset($row)  && $row['status'] == "1"){ echo "selected";} ?>>Active</option>
                     <option value="0" <?php if(isset($row)  && $row['status'] == "0"){ echo "selected";} ?>>Inactive</option>
                  </select>
               </div>
            </div>
           
            <div class="form-btn">
               <?php if(isset($row['id'])){ ?>
                  <button type="submit" class="btn btn-primary" name="edit">Edit</button>
               <?php }else { ?>
                  <button type="submit" class="btn btn-primary" name="add">Add</button>
               <?php }?>
            </div>
         </form>
      </section>
     
      <?php include('include/footer.php'); ?>
     
   </body>
</html>