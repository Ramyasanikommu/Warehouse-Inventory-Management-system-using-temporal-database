<?php include_once('include/header.php') ?>

<?php

if(isset($_SESSION['user'])){
    header('location:index.php');
    exit;
}

$msg="";

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $stmt=$conn->prepare('SELECT * FROM users WHERE email=? AND password=?');
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    $result=$stmt->get_result();
    if($row=$result->fetch_assoc()){
        $_SESSION['user'] = $row;
        header('location:index.php');
    }else{
        $msg = "! Incorrect Email/Password, Try Again";
    }
}

?>

    <section class="home-1 login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h1>Login</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image">
                        <img src="img/login.webp" alt="iamge" title="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section -->
    <!-- section -->
    <section class="login-form">
        <div class="container">
            <form action="" method="POST">
                <h3>Login</h3>
                <p class="msg" style="color:red;"><?php echo $msg; ?></p>
                <p>Welcome back! Please enter your username and password to login. </p>
                <div class="input-wrap">
                    <label>Email</label>
                    <input type="Email" name="email" placeholder="Enter Email" required>
                </div>
                <div class="input-wrap">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>
                <button class="btns" name="submit" type="submit">Login</button><br><br>
                <a href="register.php" class="btns">New User ? Register Now</a>
            </form>
        </div>
    </section>

    <?php include_once('include/footer.php') ?>