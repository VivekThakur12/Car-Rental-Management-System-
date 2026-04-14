<?php
// Include database connection
include 'db_config.php';

// Check if booking ID is provided in URL
if(isset($_GET['id'])) {
    
    // Get booking ID from URL
    $booking_id = $_GET['id'];
    
    // Delete booking from database
    $sql = "DELETE FROM bookings WHERE id = '$booking_id'";
    
    if($conn->query($sql) === TRUE) {
        // Booking deleted successfully
        // Redirect to booking page
        header("Location: user-booking.php");
    } else {
        echo "Error deleting booking: " . $conn->error;
    }
} else {
    // If no ID provided, redirect to booking page
    header("Location: user-booking.php");
}

?>
