<?php
include 'db.php'; // Include your database connection script


// Check if the form was submitted    // Get form data
    $name = $_POST['name'];
    $message = $_POST['message'];
    $user_id=$_POST['user_id'];
    $description = $_POST['description'];
    
    $tmp=$_FILES['image']['tmp_name'];
    $image="./add-img/".$_FILES['image']['name'];
    move_uploaded_file($tmp,$image);
    
    // Insert data into database
    $q = "INSERT INTO post (user_id,name, message, image,description) VALUES ('$user_id','$name', '$message', '$image','$description')";
    $res = mysqli_query($conn, $q);

    if ($res) {
        echo "<script>alert('Post created successfully.'); window.location='post.php';</script>";
    } else {
        echo "<script>alert('Failed to create post. Please try again.'); window.history.back();</script>";
    }

?>
