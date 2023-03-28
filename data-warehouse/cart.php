<?php
include_once('include/header.php')
?>

<?php 
if(!isset($_SESSION['user'])){
    header('location:index.php');
    exit;
}
?>

<?php

$sub_total = "";

$sql = "SELECT carts.quantity,p.product_name,p.product_image,p.rate
FROM carts
INNER JOIN products as p ON p.product_id = carts.product_id
WHERE carts.user_id =" . $_SESSION['user']['user_id'];

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();

?>
 <section class="home-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h1>Listing</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image">
                        <img src="img/home1.webp" alt="iamge" title="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section -->
    <!-- section -->
    <section class="listing">
        <div class="col-md-12">
            <div class="table-data">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <div class="list" style="font-size:40px; text-align:center;">Cart List</div>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($row=$result->fetch_assoc()){ ?>
                            <tr>
                                <td><img src="uploads/<?php echo $row['product_image'] ?>"></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td>
                                    <div>
                                        <?php echo $row['quantity'] ?>
                                    </div>
                                </td>
                                <td>£<?php echo $row['rate'] ?>.00</td>
                                <td>£<?php echo $total = $row['rate']*$row['quantity'] ?>.00</td>
                                <input type="hidden" value="<?php $sub_total += $total ?>">
                                <!-- <td>
                                    <div>
                                        <a href="#" class="btn">Edit</a>
                                    </div>
                                </td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                        <th></th>
                        <th></th>
                        <th>Sub Total</th>
                        <td></td>
                        <td>£<?php echo $sub_total ?>.00</td>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php
include_once('include/footer.php')
?>