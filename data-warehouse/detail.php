<?php include_once('include/header.php') ?>

<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

//select Cart Data



//insert into cart
if(isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    
    $stmt=$conn->prepare("SELECT * FROM carts WHERE user_id = ? AND product_id=?");
    $stmt->bind_param("ss",$_SESSION['user']['user_id'],$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    if(isset($row['product_id']) == $id && isset($row['user_id']) == $_SESSION['user']['user_id']){

        $total = $row['quantity']+$quantity;

        $stmt=$conn->prepare("UPDATE carts SET quantity = ? WHERE product_id = ?");
        $stmt->bind_param("ss",$total,$id);
        // $stmt->execute();
    }else{
        $stmt=$conn->prepare("INSERT INTO carts (user_id,product_id,quantity) VALUES (?,?,?)");
        $stmt->bind_param("sss",$_SESSION['user']['user_id'],$id,$quantity);
        // $stmt->execute();
    }
    if($stmt->execute()){
        header('location:cart.php');
    }

}

//select product details
$sql = "SELECT p.product_name,p.description,p.product_image,p.rate, c.name
FROM products as p
INNER JOIN categories as c ON p.category_id = c.id
WHERE p.product_id =" . $id;

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();

?>

<section class="home-1 login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h1>Detail</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image">
                        <img src="img/cart-image.webp" alt="iamge" title="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="cart-left">
                        <div class="image">
                            <img src="uploads/<?php echo $row['product_image'] ?>" alt="image" title="image">
                        </div>
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="img">
                                    <img src="img/nav1.webp" alt="image" title="image">
                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <img src="img/nav2.webp" alt="image" title="image">
                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <img src="img/nav3.webp" alt="image" title="image">
                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <img src="img/nav4.webp" alt="image" title="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cart-right">
                        <h3><?php echo $row['product_name'] ?></h3>
                        <div class="price">
                            <h4>$<?php echo $row['rate'] ?>.00 </h4>
                        </div>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                            <p>(1 Review)</p>
                        </ul>
                        <div class="desc">
                            <p><?php echo $row['description'] ?></p>
                        </div>
                        <div class="cart-box">
                            <form action="" method="POST">
                            <div class="cart-input">
                                <input type="number" name="quantity" value="1" min="1">
                            </div>
                            <button type="submit" class="btn" name="submit">Add To Cart</button>
                        </form>
                        </div>
                        <ul class="detail">
                            <li><span>SKU:</span> WX-256HG</li>
                            <li><span>Categories:</span> Home, <?php echo $row['name'] ?></li>
                            <li><span>Tag:</span> Electronic</li>
                        </ul>
                        <div class="cart-boxes">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-3">
                                    <div class="box">
                                        <div class="box-icon">
                                            <img src="img/1.webp" alt="image" title="image">
                                        </div>
                                        <div class="icon-content">
                                            <h5>Support 24/7</h5>
                                            <p>Delicated 24/7 Support</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-3">
                                    <div class="box">
                                        <div class="box-icon">
                                            <img src="img/2.webp" alt="image" title="image">
                                        </div>
                                        <div class="icon-content">
                                            <h5>Easy Returns</h5>
                                            <p>Shop With Confidence</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include_once('include/footer.php') ?>