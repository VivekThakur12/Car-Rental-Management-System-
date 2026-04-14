<?php
// Include database connection
include 'db_config.php';

// ==================== DELETE CAR FROM DATABASE ====================

// Check if car ID is provided in URL
if(isset($_GET['id'])) {
    
    // Get car ID from URL
    $car_id = $_GET['id'];
    
    // Delete car from database
    $sql = "DELETE FROM cars WHERE id = '$car_id'";
    
    if($conn->query($sql) === TRUE) {
        echo "Car deleted successfully";
        // Redirect to car history page
        header("Location: car-history.php");
    } else {
        echo "Error deleting car: " . $conn->error;
    }
} else {
    // If no ID provided, redirect to history page
    header("Location: car-history.php");
}

?>
