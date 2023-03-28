<?php 
include("include_db/connection.php");

$sql_query = new Connect_db();
$conn = $sql_query->connectDatabase();

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>
    <!-- header -->

    <header>
        <div class="container">
            <div class="head_container">
                <div class="logo">
                    <!-- <a href="index.php"><img src="img/logo.png"></a> -->
                    <a href="index.php" style="color:#fff; font-size:30px;">DashBoard</a>
                </div>
                <div class="menu" id="myTopnav">
                    <ul>
                        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="openNav()">&#9776;</a>
                        <li><a href="index.php">Home</a></li>
                        <?php if(isset($_SESSION['user'])){ ?>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="logout.php"><?php echo $_SESSION['user']['username'] ?>/Logout</a></li>
                        <?php }else{ ?>
                        <li>
                            <a href="Login.php">Login</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Listing</a></li>

        <li>
            <a href="login.php">Login</a>
        </li>
    </div>