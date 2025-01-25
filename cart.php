<?php

include 'header.php';


?>


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3"><b>Shopping Cart</b></h1>

    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5" >
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5" >
            <table class="table table-bordered text-center mb-0" >
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <?php
                      $totalprice=0;
                      if (!isset($_SESSION['user'])) {
                        echo "<script>alert('Login Please');window.location='login.php';</script>";
                     }
                        
                        if(isset($_SESSION['user']))
                        {
                            $data=$_SESSION['user'];
                            $user_id=$data['user_id'];

                            $q="select * from cart where user_id='$user_id'";
                            $res=mysqli_query($conn,$q);
                        }
                        
                        while($cart=mysqli_fetch_array($res))
                        {
                           $product_id=$cart['product_id'];
                           $q1="select * from products where product_id='$product_id'";
                           $res1=mysqli_query($conn,$q1);
                           $product=mysqli_fetch_array($res1);
                           $total=$cart['totalprice'];
                           $qty=$cart['qty'];
                    ?>
                <tbody class="align-middle" >
                    <tr>
                        <td class="align-middle"><img src="./user/<?php echo $product['image'];?>" alt=""
                                style="width: 50px;"> </td>
                        <td><?php echo $product['name'];?></td>
                        <td class="align-middle">₹ <?php echo $product['price'];?></td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                    value="<?php echo $cart['qty']; ?>">
                            </div>
                        </td>
                        <td class="align-middle">₹ <?php echo $total; ?></td>
                        <td class="align-middle"><a
                                href="cart-remove.php?product_id=<?php echo $cart['product_id'];?>"><button
                                    class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></a></td>
                    </tr>
                </tbody>

                <?php
                         $totalprice += $total ;
                        }
 
                    ?>
            </table>
        </div>
        <div class="col-lg-4">
            <form action="place-order-save.php" method="post">
                <div class="card border-secondary mb-3">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">₹<?php echo $totalprice;?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">₹ 100</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">₹ <?php echo $totalprice +100;?></h5>
                        </div>

                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="hidden" name="price" value="<?php echo $totalprice;?>">
                        <!-- <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button></a>-->
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
            </form>
        </div>
    </div>
</div>
<!-- Cart End -->
<?php

include 'footer.php';

?>