<?php
include 'db.php';
$user_id = $_POST['user_id'];
$user_id = $_POST['user_id'];
$totalprice = $_POST['totalprice'];
$payment = $_POST['payment'];

// Assuming the address table has columns: id, user_id, f_name, email, mobile_no, address
$q = "SELECT name, email, mobile, address FROM address WHERE user_id='$user_id'";
$res = mysqli_query($conn, $q);

if ($row = mysqli_fetch_assoc($res)) {
    $f_name = $row['name'];
    $email = $row['email'];
    $mobile_no = $row['mobile_no'];
    $address = $row['address'];

    // Now, insert these values into the orders table
    $q = "INSERT INTO orders (first_name, email, mobile_no, address, totalprice, payment, user_id) VALUES ('$f_name', '$email', '$mobile_no', '$address', '$totalprice', '$payment', '$user_id')";
    $res = mysqli_query($conn, $q);

    if ($res) {
        echo "<script>alert('Your order is successfully booked.');window.location='order.php';</script>";
    } else {
        echo "<script>alert('Something Went Wrong.');window.history.back();</script>";
    }
} else {
    echo "<script>alert('No address found for user.');window.history.back();</script>";
}

?>