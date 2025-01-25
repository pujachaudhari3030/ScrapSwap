<?php

include 'header.php';
if (isset($_SESSION['user'])) {
    $data = $_SESSION['user'];
    $user_id = $data['user_id'];
}
?>

<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2><b><span class="px-2">Create New Post </span></b></h2>
    </div>
    <form action="create-post-save.php" method="post" class="needs-validation" enctype="multipart/form-data">
    <!-- start page title -->
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                <div class="card-header">
                    <h5 class="">Contact Us</h5>
                </div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amount">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required="" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amount">Description</label>
                                <input type="text" class="form-control" id="description" name="description" required="" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="payment_details">Post Message</label>
                                <textarea class="form-control" id="message" name="message" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="submit" value="Create Post" name="submit" class="btn btn-primary mb-2 mt-4">
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