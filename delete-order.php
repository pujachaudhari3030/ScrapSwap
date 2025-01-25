<?php

include 'db.php'; // Include your database connection file

if(isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    
    // Delete the order from the database
    $q = "DELETE FROM orders WHERE id='$order_id'";
    $res = mysqli_query($conn, $q);

    if($res) {
        echo "<script>alert('Order deleted successfully');window.location='order.php';</script>";
    } else {
        echo "<script>alert('Failed to delete order');window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request');window.history.back();</script>";
}

?>
