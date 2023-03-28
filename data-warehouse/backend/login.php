<?php

include("../include_db/connection.php");
$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();

session_start();

if (isset($_POST['login'])) {

    //Get Parameters
   $username = $conn->real_escape_string($_POST['username']);
   $password = $conn->real_escape_string($_POST['password']);
   //Encode Password
   $encoded_password = base64_encode($password);  

   //SQL Query
   $sql_query = "select * from users where username = '$username' and password = '$encoded_password'";  
   //execute Query
   $get_record = mysqli_query($conn, $sql_query);  
   //Get row of data
   $row = mysqli_fetch_array($get_record,MYSQLI_ASSOC);  
   //Count the number of rows
   $count = mysqli_num_rows($get_record);  

   // If rows exists
   if($count == 1){  
      // Set session variable
      $_SESSION['id'] = $row['user_id'];
      echo "<script>window.location='dashboard.php'</script>";
   }  
   else{  
        echo "<script>alert('Login failed. Invalid username or password.')</script>";  
   } 
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php'); ?>
   <body>

      <header class="header">
         <div class="container">
            <div class="colleft">
               <div class="logo_div">
                  <a href="#">Logo</a>
               </div>
            </div>

            <div class="colright">
               <div class="menu">
                  <ul>
                     <li><a href="#">Home</a></li>
                     <li><a href="#">About</a></li>
                     <li><a href="#">service</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </header>

      <section class="page_wrapper page_wrapper_login">
         <div class="page-heading-title">
            <h3>Login</h3>
         </div>
         <form action="login.php" method="post">
            <div class="form_grid_wrap">
               <div class="form-group-grid-wrap">
                  <label for="email">Username</label>
                  <input type="text" class="form-control" id="email" name="username" placeholder="Username" required>
               </div>
               <div class="form-group-grid-wrap">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
               </div>
            </div>
            
            <div class="form-btn">
               <button type="submit" class="btn btn-primary" name="login">Login</button>
            </div>
         </form>
      </section>      

      <footer>
         <div class="container">
            <p>Copyright All Right Reserved</p>
         </div>
      </footer>
   </body>
</html>