<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Inventory Management System</title>
      <link href="https://fonts.googleapis.com/css2?family=Catamaran&display=swap" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="css/bootstrap.css" rel="stylesheet">
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
		<!--page_wrapper-->
     
         <div class="page-heading-title">
            <h3>Product Listing</h3>
         </div>
         <div class="table-responsive">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th class="border-top-0">Product ID</th>
                     <th class="border-top-0">Product Name</th>
                     <th class="border-top-0">Quantity</th>
                     <th class="border-top-0">Price</th>
                     <th class="border-top-0">Status</th>
                     <th class="border-top-0">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>
                        <div class="display-flex">
                           <h4>PR654</h4>
                        </div>
                     </td>
                     <td>Shirt</td>
                     <td>74</td>
                     <td>500</td>
                     <td>
                        <label class="label label-success">Available</label>
                     </td>
                     <td>
                        <a href="#" class="edit-btn">Edit</a>
                        <a href="#" class="delete-btn">Delete</a>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </section>
      <!--page_wrapper-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script>
         jQuery(document).ready(function(){
         	
            jQuery('.user .username h3 span').click(function(){
               jQuery('.user-menu_wrap').slideToggle('slow');
               })
         })
          
      </script>
   </body>
</html>