<?php
include_once('include/header.php');

$stmt=$conn->prepare('SELECT * FROM products ORDER BY RAND() limit 6');
$stmt->execute();
$result=$stmt->get_result();

$stmt=$conn->prepare('SELECT * FROM products ORDER BY RAND()');
$stmt->execute();
$t_result=$stmt->get_result();

?>
    <!-- section -->
    <section class="home-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h1> Small & Thin Smart Watch 4Th Gen</h1>
                        <a href="#" class="btns">Shop Now</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image">
                        <img src="img/home1.webp" alt="iamge" title="image" width="427" height="501">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section -->
    <!-- section -->
    <section class="home-2">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="img/1.webp" alt="image" title="image">
                        </div>
                        <div class="icon-content">
                            <h4>Support 24/7</h4>
                            <p>Delicated 24/7 Support</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="img/2.webp" alt="image" title="image">
                        </div>
                        <div class="icon-content">
                            <h4>Easy Returns</h4>
                            <p>Shop With Confidence</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="img/3.webp" alt="image" title="image">
                        </div>
                        <div class="icon-content">
                            <h4>
                                Card Payment</h4>
                            <p>12 Months Installments</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section -->
    <!-- section -->
    <section class="product">
        <div class="container">
            <div class="heading">
                <h2>Products</h2>
            </div>
            <div class="row">
                <?php while($row=$result->fetch_assoc()){ ?>
                <div class="col-md-4">
                    <div class="item">
                        <div class="image">
                            <img height="200px" width="200px" src="uploads/<?php echo $row['product_image'] ?>" alt="image" title="image">
                        </div>
                        <div class="item-info">
                            <h5><a href="detail.php?id=<?php echo $row['product_id'] ?>"><?php echo $row['product_name'] ?></a></h5>
                            <div class="price">
                                <p>£<?php echo $row['rate'] ?>.00</p>
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i> </li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- section -->
    <!-- section -->
    <section class="categories">
        <div class="container">
            <div class="heading">
                <h2> Top Categories </h2>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="category-box">
                        <div class="image">
                            <img src="img/category1.webp" alt="image" title="image">
                        </div>
                        <h5>Audio/Video</h5>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="category-box">
                        <div class="image">
                            <img src="img/category2.webp" alt="image" title="image">
                        </div>
                        <h5>Gamming</h5>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="category-box">
                        <div class="image">
                            <img src="img/category3.webp" alt="image" title="image">
                        </div>
                        <h5>Headphone</h5>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="category-box">
                        <div class="image">
                            <img src="img/category4.webp" alt="image" title="image">
                        </div>
                        <h5>Digital Camera</h5>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="category-box">
                        <div class="image">
                            <img src="img/category5.webp" alt="image" title="image">
                        </div>
                        <h5>Mobile Phone</h5>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="category-box">
                        <div class="image">
                            <img src="img/category6.webp" alt="image" title="image">
                        </div>
                        <h5>Computer/Laptop</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section -->
    <!-- section -->
    <section class="sales">
        <div class="container">
            <div class="heading">
                <h2>New Top Sales!</h2>
            </div>
            <div class="owl-carousel owl-theme">
                <?php while($t_row=$t_result->fetch_assoc()){ ?>
                <div class="item">
                    <div class="image">
                        <img src="uploads/<?php echo $t_row['product_image'] ?>" height="200px" width="200px" alt="image" title="image">
                    </div>
                    <div class="info">
                        <h5><a href="#"><?php echo $t_row['product_name'] ?></a></h5>
                        <p>£<?php echo $t_row['rate'] ?>.00</p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- section -->
<?php include_once('include/footer.php') ?>