<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['product_id'];
    $comment = $_POST['comment'];

    // Update the comment field in the database
    $query = "UPDATE post SET comments = '$comment' WHERE id = '$productId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Comment updated successfully
        echo "<script>alert('Comment updated successfully');</script>";
        echo "<script>window.location='post.php';</script>";
        
    } else {
        // Error updating comment
        echo "<script>alert('Error updating comment');</script>";
        echo "<script>window.location='post.php';</script>";
    }
}
?>
