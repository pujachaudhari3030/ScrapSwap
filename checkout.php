<?php
include 'header.php';

if (isset($_SESSION['user'])) {
    $data = $_SESSION['user'];
}

    $user_id = $data['user_id'];
    $q = "select * from cart where user_id='$user_id' ";
    $res = mysqli_query($conn, $q);
    //$data=mysqli_fetch_array($res);
    $data = mysqli_num_rows($res);

    if ($data == 0) {
        echo "<script>alert('No products added in cart, Please add product.');window.history.back();</script>";
    }
?>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3"><b>Checkout</b></h1>

    </div>
</div>
<!-- Page Header End -->


<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <div class="row justify-content-center px-xl-5">
        <div class="col-lg-6">
            <div class="card border-secondary mb-5">
                <?php

                $totalprice = $_POST['price'];
                $user_id = $_POST['user_id'];
                //print_r($totalprice);
                

                ?>
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">₹
                            <?php echo $totalprice; ?>
                        </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">₹ 100</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">₹
                            <?php echo $totalprice + 100; ?>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Payment</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="hidden" name="totalprice" value="<?php echo $totalprice + 100; ?>">

                            <input type="radio" class="custom-control-input" name="payment" value="COD" id="paypal"
                                required>
                            <label class="custom-control-label" for="paypal">COD</label>
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        </div>
                    </div>

                    <input type="submit" value="Place Order"
                        class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">
                    <!-- <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>-->
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include 'footer.php';

?>