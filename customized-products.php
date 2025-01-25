<?php
include 'header.php';
include 'db.php'; // Include your database connection script

// Query to fetch all posts from the database
$q = "select * from products where type='customize'";
$res = mysqli_query($conn, $q);

?>

<body style="background-color: #f3f3f9;">
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mt-3 mb-3">
        <div class="d-flex flex-column align-items-center justify-content-center mb-5" style="min-height:100px;">
            <center>
                <h2 class="animate-charcter" style="font-size: 40px;"><b>
                        &nbsp;Customized Products &nbsp;</b></h2>
            </center>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Customized Products</p>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="row pb-3">
            <!-- Button for creating a post -->


            <!-- Loop through each post and create a card -->
            <?php
        
        while ($products = mysqli_fetch_assoc($res)) {
        ?>
            <div class="row pr-3 pb-3">
                <div class="col-lg-3 col-md-12 col-sm-12 pb-1">
                    <div>
                        <div class="card product-item border-0 mb-4"
                            style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <a href="product-detail.php?id=<?php echo $products['product_id']; ?>">
                                    <img style="width:400px; height:330px;" class="img-fluid"
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
                                    <input type="hidden" name="product_id"
                                        value="<?php echo $products['product_id']; ?>">
                                    <input type="hidden" name="qty" value="1" min=1>
                                    <i class="fas fa-shopping-cart text-primary mr-1"></i>
                                    <input class="btn btn-sm text-dark p-0" type="submit" value="Add To Cart">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php } 

        ?>

        </div>
    </div>
</body>
<?php
include 'footer.php';
?>
<script>
// Function to toggle steps visibility
function toggleSteps(elementId) {
    var steps = document.getElementById(elementId);
    if (steps.style.display === 'none') {
        steps.style.display = 'block';
    } else {
        steps.style.display = 'none';
    }
}

// Add click event listeners to all steps-toggle buttons
var stepsToggles = document.querySelectorAll('.steps-toggle');
stepsToggles.forEach(function(toggle) {
    toggle.addEventListener('click', function() {
        var targetId = this.getAttribute('data-toggle');
        toggleSteps(targetId);
    });
});
</script>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,900;1,400;1,900&display=swap');




#header {
    margin: 20px;
}

#header>h1 {
    text-align: center;
    font-size: 30px;
}

#header>p {
    text-align: center;
    font-size: 1.5rem;
    font-style: italic;
}




.container {
    width: 100vw;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 40px 20px;
}

.card {
    display: flex;
    flex-direction: column;
    width: 400px;
    margin-bottom: 60px;
}

.card>div {
    box-shadow: 0 15px 20px 0 rgba(0, 0, 0, 0.5);
}

.card-image {
    width: 368px;
    height: 250px;
}

.card-image>img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: bottom;
}

.card-text {
    margin: -30px auto;
    margin-bottom: -50px;
    height: 300px;
    width: 300px;
    background-color: #1D1C20;
    color: #fff;
    padding: 20px;
}

.card-meal-type {
    font-style: italic;
}

.card-title {
    font-size: 1.5rem;
    margin-bottom: 5px;
    margin-top: 3px;
}

.card-body {
    font-size: 1.25rem;
}

.card-price {
    width: 100px;
    height: 100px;
    background-color: #970C0A;
    color: #fff;
    margin-left: auto;
    font-size: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>