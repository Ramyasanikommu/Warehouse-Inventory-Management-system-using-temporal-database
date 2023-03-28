
<?php include_once('include/header.php') ?>

<?php 

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $role="user";

    $stmt=$conn->prepare('INSERT INTO users (username,contact,email,password,user_role) VALUES (?,?,?,?,?)');
    $stmt->bind_param("sssss",$name,$contact,$email,$password,$role);
    // $stmt->execute();
    if($stmt->execute()){
        header('location:login.php');
    }else{
        echo "<script>! Something Went Wrong Try Again</script>";
    }
}

?>

 <section class="home-1 login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h1>Register</h1>
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
                <h3>Register</h3>
                <p>Create new account today to reap the benefits of a personalized shopping experience. </p>
                <div class="form-grid">
                    <div class="input-wrap">
                        <label>Username</label>
                        <input type="text" name="name" placeholder="Enter Username" required>
                    </div>
                    <div class="input-wrap">
                        <label>Contact</label>
                        <input type="tel" name="contact" placeholder="Enter Contact" required>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="input-wrap">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="input-wrap">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btns">Register</button>
            </form>
        </div>
    </section>

<?php include_once('include/footer.php') ?>