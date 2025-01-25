<?php
include 'header.php';
?>

<body style="background-color: #f3f3f9;">
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-3 mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height:100px;">
            <center>
                        <h2 class="animate-charcter" style="font-size: 40px;"><b
                                style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                                &nbsp;Our Shop &nbsp;</b></h2>
                    </center>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="row pb-3">
            <?php

        include 'db.php';

        // Retrieve product IDs in the cart
        $addedProductIds = array();
        if(isset($_SESSION['user']))
        {
            $data=$_SESSION['user'];
            $user_id=$data['user_id'];

            $q_cart="select product_id from cart where user_id='$user_id'";
            $res_cart=mysqli_query($conn,$q_cart);

            while($cart=mysqli_fetch_array($res_cart))
            {
                $addedProductIds[] = $cart['product_id'];
            }
        }

        // Fetch products excluding those in the cart
        $q = "select * from products";
        if (!empty($addedProductIds)) {
            $q .= " where product_id not in (" . implode(',', $addedProductIds) . ")";
        }
        $res = mysqli_query($conn, $q);
        while ($products = mysqli_fetch_array($res)) {
        ?>
            <div class="col-lg-3 col-md-12 col-sm-12 pb-1 mb-3">
                <div>
                    <div class="card product-item border-0 mb-0" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div
                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="product-detail.php?id=<?php echo $products['product_id']; ?>">
                                <img style="width:360px; height:230px;" class="img-fluid"
                                    src="./user/<?php echo $products['image']; ?> " alt="">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <center><h6 style="text-transform:uppercase;" class="text-truncate mb-1">
                                <?php echo $products['name']; ?>
                            </h6></center>
                            <div class="d-flex justify-content-center">
                                <h6 styel="text-align:left;">₹
                                    <?php echo $products['price']; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="wish-add.php?product_id=<?php echo $products['product_id']; ?>"><i
                                    class="fas fa-heart text-primary"></i>Add Wish</a>
                            <form action="cart-add.php">
                                <input type="hidden" name="product_id" value="<?php echo $products['product_id']; ?>">
                                <input type="hidden" name="qty" value="1" min=1>
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>
                                <input class="btn btn-sm text-dark p-0" type="submit" value="Add To Cart">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        }
        ?>
        </div>
    </div>

    <body y>

<?php
include 'footer.php';
?>