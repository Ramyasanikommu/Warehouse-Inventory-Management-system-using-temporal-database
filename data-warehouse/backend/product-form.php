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
      $category_id = $conn->real_escape_string($_POST['category_id']);
      $brand_id = $conn->real_escape_string($_POST['brand_id']);
      $product_name = $conn->real_escape_string($_POST['product_name']);
      $quantity = $conn->real_escape_string($_POST['quantity']);
      $rate = $conn->real_escape_string($_POST['rate']);
      $status = $conn->real_escape_string($_POST['status']);
      $description = $conn->real_escape_string($_POST['description']);

      //Upload Image
      $location=UPLOAD_PATH;
      $target_file = $location . basename($_FILES["product_image"]["name"]);

      $name = basename($_FILES["product_image"]["name"]);

      $temp_name=$_FILES['product_image']['tmp_name'];
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if($name && $imageFileType != "jpg"  && $imageFileType != "png" && $imageFileType != "jpeg") {

            echo "<script>alert('Sorry, only JPG, JPEG & PNG files are allowed.')</script>";
            $uploadOk = 0;
      }

      else if((isset($name)) && $uploadOk == 1)
      {       

         $uploadOk = move_uploaded_file($temp_name,$location.$name);

      }
      else{

         echo "<script>alert('Sorry, your file was not uploaded.')</script>";
      }

      //Query to execute
      $sql_query = "INSERT INTO `products`(`category_id`,`brand_id`,`product_name`,`quantity`,`rate`,`status`,`description`,`product_image`) VALUES ('".$category_id."','".$brand_id."','".$product_name."','".$quantity."','".$rate."','".$status."','".$description."','".$name."')";


      //Execute Query
      $execute_query = mysqli_query($conn,$sql_query);

      //If query executes, redirect to stage list
      if($execute_query){
         echo "<script>alert('Product Added Successfully.')</script>";
         echo "<script>window.location.href ='products-list.php'</script>";
      } else {
         echo "<script>alert('There's problem in adding product')</script>";
         echo "<script>window.location.href ='product-form.php'</script>";
      }
   }

   
   //Edit Form
   if (isset($_POST['edit'])) {
    
      //get Paramaters
      $category_id = $conn->real_escape_string($_POST['category_id']);
      $brand_id = $conn->real_escape_string($_POST['brand_id']);
      $product_name = $conn->real_escape_string($_POST['product_name']);
      $quantity = $conn->real_escape_string($_POST['quantity']);
      $rate = $conn->real_escape_string($_POST['rate']);
      $status = $conn->real_escape_string($_POST['status']);
      $description = $conn->real_escape_string($_POST['description']);

      
      $id = $_POST['id'];

      //Upload Image
      $location=UPLOAD_PATH;
      $target_file = $location . basename($_FILES["product_image"]["name"]);

      $name = basename($_FILES["product_image"]["name"]);

      $temp_name=$_FILES['product_image']['tmp_name'];
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if($name && $imageFileType != "jpg"  && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "<script>alert('Sorry, only JPG, JPEG & PNG files are allowed.')</script>";
            $uploadOk = 0;
      }
      else if((isset($name)) && $uploadOk == 1)
      {       
         $upload = move_uploaded_file($temp_name,$location.$name);
      }
      else{
         echo "<script>alert('Sorry, your file was not uploaded.')</script>";
      }
  

      if($name){
         $sql = "UPDATE products SET product_name = '$product_name', category_id = '$category_id', brand_id = '$brand_id', quantity = '$quantity',rate = '$rate', status = '$status', product_image = '$name', description = '$description' WHERE product_id='$id'";    
      }else{
         $sql = "UPDATE products SET product_name = '$product_name', category_id = '$category_id', brand_id = '$brand_id', quantity = '$quantity',rate = '$rate', status = '$status', description = '$description' WHERE product_id='$id'";
      }

      $result = mysqli_query($conn, $sql);
  
      if($result){
          echo "<script>alert('Updated Successfully')</script>";
          echo "<script>window.location='products-list.php'</script>";
  
      } else {
          echo "<script>alert('There's problem in updating.')</script>";
          echo "<script>window.location.href ='products-list.php' </script>";
      } 
  }




   if(isset($_GET['product_id'])){
      $result = mysqli_query($conn,"SELECT * from products WHERE product_id='" . $_GET['product_id'] . "'"); 
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
   }


   $select_data = "SELECT * from categories WHERE status = '1'";
   //Initialize array
   $categories = array();
   //Execute sql query
   $result_data = mysqli_query($conn, $select_data);
   // If records exists
   if(mysqli_num_rows($result_data) > 0){
      $i = 0;
      //Fetch records one by one
      while($row2 = mysqli_fetch_array($result_data)){
         $categories[$i++] = $row2;
      }
   }


   $select_data1 = "SELECT * from brands WHERE status = '1'";
   //Initialize array
   $brands = array();
   //Execute sql query
   $result_data1 = mysqli_query($conn, $select_data1);
   // If records exists
   if(mysqli_num_rows($result_data1) > 0){
      $i = 0;
      //Fetch records one by one
      while($row1 = mysqli_fetch_array($result_data1)){
         $brands[$i++] = $row1;
      }
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
            <?php if(isset($row['product_id'])){ ?>
               <h3>Edit Product</h3>
            <?php }else { ?>
               <h3>Add Product</h3>
            <?php }?>
         </div>
         
         <form action="product-form.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo isset($row) ?  $row['product_id'] : ''; ?>">

            <div class="form_grid_wrap product_50">
               <div class="form-group-grid-wrap">
                  <label for="">Select Brand</label>
                  <select id="inputState" class="form-control" name="brand_id" required>
                     <option value="">Choose Brand</option>
                     <?php foreach($brands as $value){ ?>
                     <option value="<?php echo  $value['id']; ?>" <?php if(isset($row)  && $row['brand_id'] == $value['id']){ echo "selected";} ?>><?php echo $value['name']; ?></option> 
                     <?php } ?>
                  </select>
               </div>
               <div class="form-group-grid-wrap">
                  <label for="">Select Category</label>
                  <select id="inputState" class="form-control" name="category_id" required>
                     <option value="">Choose Category</option>
                     <?php foreach($categories as $value){ ?>
                     <option value="<?php echo $value['id']; ?>" <?php if(isset($row)  && $row['category_id'] == $value['id']){ echo "selected";} ?>><?php echo $value['name']; ?></option> 
                     <?php } ?>
                  </select>
               </div>
            </div>

            <div class="form_grid_wrap product_50">
               <div class="form-group-grid-wrap">
                  <label for="">Product Name</label>
                  <input type="text" class="form-control" name="product_name" value="<?php echo isset($row) ?  htmlspecialchars($row['product_name']) : '' ?>"  placeholder="Product Name" required>
               </div>
               <div class="form-group-grid-wrap">
                  <label for="">Quantity</label>
                  <input type="text" class="form-control" name="quantity" value="<?php echo isset($row) ?  $row['quantity'] : '' ?>"  placeholder="Quantity" required>
               </div>
            </div>
           

            <div class="form_grid_wrap product_50">
               <div class="form-group-grid-wrap">
                  <label for="">Price</label>
                  <input type="text" class="form-control" name="rate" value="<?php echo isset($row) ?  $row['rate'] : '' ?>"  placeholder="Price" required>
               </div>
               <div class="form-group-grid-wrap">
                  <label for="">Image</label>
                  <input type="file" class="form-control" name="product_image" value="<?php echo isset($row) ?  $row['product_image'] : '' ?>"  placeholder="">
               </div>
            </div>

           
            <div class="form_grid_wrap product_50">
               <div class="form-group-grid-wrap">
                  <label for="">Description</label>
                  <textarea type="text" class="form-control" name="description" value="<?php echo isset($row) ?  $row['description'] : '' ?>"  placeholder="Description" required><?php echo isset($row) ?  $row['description'] : '' ?></textarea>
               </div>
               <div class="form-group-grid-wrap">
                  <label for="">Select Status</label>
                  <select id="inputState" class="form-control" name="status" required>
                     <option value="">Choose</option>
                     <option value="1"  <?php if(isset($row)  && $row['status'] == "1"){ echo "selected";} ?>>Active</option>
                     <option value="0"  <?php if(isset($row)  && $row['status'] == "0"){ echo "selected";} ?>>Inactive</option>
                  </select>
               </div>
            </div>
                  
            <?php if(isset($row['product_id'])){ ?>
            <img style="width:200px;height:200px;" src="../uploads/<?php echo $row['product_image'] ?>">
            <?php }?>
            
            <div class="form-btn">
               <?php if(isset($row['product_id'])){ ?>
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