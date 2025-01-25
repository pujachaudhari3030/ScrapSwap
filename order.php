<?php

include 'header.php';

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3"><b>Order Detail</b></h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<div class="container-fluid pt-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
    <div class="row px-xl-12">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Name Of Buyer</th>
                        <th>Total Price</th>
                        <th>Payment mode</th>
                        <th>Order status</th>
                        <th>Action</th> <!-- Added this column for the delete button -->
                    </tr>
                </thead>
                <?php

                if (!isset($_SESSION['user'])) {
                    echo "<script>alert('Login Please');window.location='login.php';</script>";
                } else {
                    $data = $_SESSION['user'];
                    $user_id = $data['user_id'];

                    $q="select * from orders where user_id='$user_id'";
                    $res=mysqli_query($conn,$q);  
                }
                while($data=mysqli_fetch_array($res))
                {
                    
                ?>
                <tbody class="align-middle">
                    <tr>
                        <td style="text-transform:capitalize;" class="align-middle"> <?php echo $data['first_name'];?>
                        </td>
                        <td class="align-middle"> <?php echo $data['totalprice'];?>
                        </td>
                        <td class="align-middle"> <?php echo $data['payment'];?>
                        </td>
                        <td>
                            <button class=" btn-danger ">pending</button>
                        </td>
                        <td>
                            <!-- Added this column for the delete button -->
                            <form action="delete-order.php" method="post">
                                <input type="hidden" name="order_id" value="<?php echo $data['id']; ?>">
                                <button class="btn btn-sm btn-danger deleteOrder">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>

<script>
// Use class name instead of id for delete button
document.querySelectorAll('.deleteOrder').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault(); // Prevent the default form submission

        Swal.fire({
            title: 'Are you sure?',
            text: 'Delete Order!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                item.closest('form').submit();
            }
        });
    });
});
</script>

<?php

include 'footer.php';

?>
