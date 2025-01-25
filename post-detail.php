<?php
include 'header.php';
?>

<body style="background-color: #f3f3f9;">
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Post Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Post Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <?php

        $product_id = $_REQUEST['id'];
        $q = "select * from post where id='$product_id'";
        $res = mysqli_query($conn, $q);
        $data = mysqli_fetch_array($res);
        // {
        
        ?>
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img style="width:500px; height:300px;" src="<?php echo $data['image']; ?>" alt="Image">
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 pb-5">
                <h3 style="text-transform:capitalize;" class="font-weight-semi-bold">
                    <?php echo $data['name']; ?>
                </h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>

                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
                <br>
                <h4 style="text-transform:capitalize; text-align: justify;" class="font-weight-semi-bold">
                    <?php echo $data['message']; ?>
                </h4>

                <div>
                    <button class="btn btn-link" onclick="toggleComments(this)">Click here to view Comments</button>
                    <div class="comments-section" style="display: none;">
                        <!-- Comment form -->
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <h4 name="comments"><?php echo $data['comments']; ?></h4><br>
                    </div>
                </div>

            </div>
        </div>


        <!-- Products Start -->
        <div class=" container-fluid py-5">
                                <div class="text-center mb-4">
                                    <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
                                </div>
                                <div class="row px-xl-5">
                                    <div class="col">
                                        <div class="owl-carousel related-carousel">

                                            <?php
                    //print_r($data);
                    $q2 = "select * from post";
                    $res2 = mysqli_query($conn, $q2);
                    while ($product_data = mysqli_fetch_array($res2)) {
                        ?>

                                            <div class="card product-item border-0" >
                                                <div
                                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" >
                                                    <a href="post-detail.php?id=<?php echo $product_data['id']; ?>">
                                                        <img style="width:300px; height:230px;" class="img-fluid w-100"
                                                            src="<?php echo $product_data['image']; ?>" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                    <h6 class="text-truncate mb-3">
                                                        <?php echo $product_data['name']; ?>
                                                    </h6>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between bg-light border">
                                                    <!-- Like button with onclick event -->
                                                    <a href="#" onclick="likePost(<?php echo $row['id']; ?>, this)">
                                                        <i class="fa fa-thumbs-up"></i> Like
                                                    </a>
                                                    <!-- Comment section -->
                                                    <div>
                                                        <button class="btn btn-link"
                                                            onclick="toggleComments(this)">Comments</button>
                                                        <div class="comments-section" style="display: none;">
                                                            <!-- Comment form -->
                                                            <form action="add-comments.php" method="post">
                                                                <input type="hidden" name="product_id"
                                                                    value="<?php echo $row['id']; ?>">
                                                                <textarea class="form-control" name="comment"
                                                                    placeholder="Write a comment..."></textarea>
                                                                <button type="submit"
                                                                    class="btn btn-primary mt-1">Post</button>
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
                                </div>
                    </div>
                </div>
                <script>
                function validateLogin() {
                    // Check if the user is logged in
                    if (!<?php echo isset($_SESSION['user']) ? 'true' : 'false'; ?>) {
                        // If not logged in, show alert and return the login page URL
                        alert('Please login to create a post.');
                        return 'login.php'; // Redirect to the login page
                    }
                    // If logged in, return the create post page URL
                    return 'create-post.php';
                }

                function likePost(postId, element) {
                    // Here you can implement the logic to handle liking a post
                    // For now, let's just toggle the 'fa-thumbs-up' class
                    element.classList.toggle("fa-thumbs-down");
                }

                function toggleComments(button) {
                    // Toggle the display of the comments section
                    let commentsSection = button.nextElementSibling;
                    commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
                }
                </script>
                <?php

    include 'footer.php';

    ?>