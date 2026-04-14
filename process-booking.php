<?php
// Include database connection
include 'db_config.php';

// ==================== PROCESS BOOKING ====================

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get form values
    $car_id = $conn->real_escape_string($_POST['car_id']);
    $user_name = $conn->real_escape_string($_POST['user_name']);
    $user_email = $conn->real_escape_string($_POST['user_email']);
    $user_phone = $conn->real_escape_string($_POST['user_phone']);
    $pickup_date = $conn->real_escape_string($_POST['pickup_date']);
    $return_date = $conn->real_escape_string($_POST['return_date']);
    
    // Validate dates
    if(strtotime($pickup_date) >= strtotime($return_date)) {
        die("Error: Return date must be after pickup date");
    }
    
    // Calculate total price
    $car_result = $conn->query("SELECT price FROM cars WHERE id = '$car_id'");
    
    if($car_result && $car_result->num_rows > 0) {
        $car = $car_result->fetch_assoc();
        
        $pickup = new DateTime($pickup_date);
        $return = new DateTime($return_date);
        $days = $return->diff($pickup)->days;
        $total_price = $car['price'] * $days;
        
        // ==================== INSERT BOOKING INTO DATABASE ====================
        
        // Insert booking data into bookings table
        $sql = "INSERT INTO bookings (car_id, user_name, user_email, user_phone, pickup_date, return_date, total_price) 
                VALUES ('$car_id', '$user_name', '$user_email', '$user_phone', '$pickup_date', '$return_date', '$total_price')";
        
        if($conn->query($sql) === TRUE) {
            // Booking saved successfully
            // Redirect to confirmation page
            header("Location: booking-confirmation.php?booking_id=" . $conn->insert_id);
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: Car not found";
    }
} else {
    // If accessed directly, redirect to home
    header("Location: user-home.php");
}

?>
