<?php
// Include database connection
include 'db_config.php';

// ==================== FETCH DATA FROM FORM ====================

// Check if form is submitted
if(isset($_POST['submit'])) {
    
    $car_name = $_POST['car_name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $fuel = $_POST['fuel'];
    $image = $_POST['image'];
    
    // ==================== INSERT INTO DATABASE ====================
    
    // Insert car data into cars table
    $sql = "INSERT INTO cars (car_name, type, price, fuel, image) VALUES ('$car_name', '$type', '$price', '$fuel', '$image')";
    
    if($conn->query($sql) === TRUE) {
        echo "New car added successfully";
        // Redirect to owner home page
        header("Location: owner-home.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
