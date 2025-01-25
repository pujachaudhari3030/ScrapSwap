<?php

include 'header.php';
if (isset($_SESSION['user'])) {
    $data = $_SESSION['user'];
    $user_id = $data['user_id'];
}
?>

<!-- Contact Start -->
<div class="container-fluid pt-5">

    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3"><b>Contact Us</b></h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <form action="contact-save.php" method="post" class="needs-validation">
        <!-- start page title -->
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card"
                    style="box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;">
                    <div class="card-header">
                        <h5 class=""><b>Contact Us</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="amount"><b>Name</b></label>
                                    <input type="text" class="form-control" id="name" name="name" required=""
                                        style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty"><b>Email</b></label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rate"><b>Subject</b></label>
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="payment_details"><b>Message</b></label>
                                    <textarea class="form-control" id="message" name="message"
                                        style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;"></textarea>
                                </div>
                            </div>
                            l̥
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" value="Send Mesaage" name="submit"
                                    class="btn btn-primary mb-2 mt-4">
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end col-->
            </div>
        </div>
    </form>
    <!-- Contact End -->

    <?php
include 'footer.php';
?>