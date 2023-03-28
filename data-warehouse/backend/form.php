<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Inventory Management System</title>
      <link href="https://fonts.googleapis.com/css2?family=Catamaran&display=swap" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <!--main_sidebar-->
      <div class="main_sidebar">
			<div class="logo">
                <h3>Inventory Management System</h3>
            </div>
         <ul class="main_sidemenu">
            <!-- <li class="main_label">Main</li> -->
            <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
            <li><a href="#"><i class="fa fa-file" aria-hidden="true"></i><span>Categories</span></a></li>
            <li><a href="#"><i class="fa fa-list" aria-hidden="true"></i><span>Products</span></a></li>
            <li><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i><span>Orders</span></a></li>
         </ul>
      </div>
      <!--main_sidebar-->
      <!--page_wrapper-->
	  
      <!--page_wrapper-->
      <section class="page_wrapper">
         <header>
            <div class="header-leftside">
               <div class="logo_wrap">
                  <div class="toggle">
                     <span></span>
                     <span></span>
                     <span></span>
                  </div>
               </div>
            </div>
            <div class="header-rightside">
               <div class="user">
                  <div class="userimg">
                     <img src="images/user.jpg">
                  </div>
                  <div class="username">
                     <h3>Admin<span><i class="fa fa-angle-down" aria-hidden="true"></i></span></h3>
                  </div>
                  <div class="user-menu_wrap" style="display: none;">
                     <ul>
                        <li><a href="#">Edit Profile</a></li>
                        <li><a href="#">Logout</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </header>
         <div class="page-heading-title">
            <h3>Form</h3>
         </div>
         <form>
            <div class="form_grid_wrap">
               <div class="form-group-grid-wrap">
                  <label for="email">Product Name</label>
                  <input type="text" class="form-control" id="email" placeholder="Product Name" required>
               </div>
               <div class="form-group-grid-wrap">
                  <label for="password">Quantity</label>
                  <input type="text" class="form-control" id="password" placeholder="Quantity" required>
               </div>
            </div>
            <div class="form_grid_wrap">
               <div class="form-group-grid-wrap">
                  <label for="email">Price</label>
                  <input type="text" class="form-control" id="time" placeholder="Price" required>
               </div>
               <div class="form-group-grid-wrap">
                  <label for="Date">Status</label>
                  <select id="inputState" class="form-control">
                     <option>Choose</option>
                     <option>Available</option>
                     <option>Not Available</option>
                  </select>
               </div>
            </div>
            
            <div class="form-btn">
               <button type="submit" class="btn btn-primary">Submit</button>
               <button type="submit" class="btn btn-danger">Cancel</button>
            </div>
         </form>
      </section>
      <!--page_wrapper-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script>
         jQuery(document).ready(function(){
         	
            jQuery('.user .username h3 span').click(function(){
               jQuery('.user-menu_wrap').slideToggle('slow');
               })
         })
          
      </script>
   </body>
</html>