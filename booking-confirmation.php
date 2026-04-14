<?php
// Include database connection
include 'db_config.php';

// Check if booking_id is provided
if(isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
    
    // Fetch booking details
    $booking_result = $conn->query("SELECT b.*, c.car_name, c.type, c.price FROM bookings b 
                                   JOIN cars c ON b.car_id = c.id 
                                   WHERE b.id = '$booking_id'");
    $booking = $booking_result->fetch_assoc();
} else {
    header("Location: user-home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation - Car Rental</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://images.unsplash.com/photo-1449965408869-eaa3f722e40d') no-repeat center/cover;
            min-height: 100vh;
            color: white;
        }

        body::before {
            content: '';
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.85);
            z-index: -1;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid #00c6ff;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #00c6ff;
        }

        .nav-links a {
            margin-left: 30px;
            text-decoration: none;
            color: #ccc;
        }

        .nav-links a:hover {
            color: #00c6ff;
        }

        /* CONTAINER */
        .container {
            max-width: 600px;
            margin: 60px auto;
            padding: 0 40px;
        }

        /* CONFIRMATION BOX */
        .confirmation-box {
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
            text-align: center;
        }

        .success-icon {
            font-size: 60px;
            color: #00ff88;
            margin-bottom: 20px;
        }

        h1 {
            color: #00ff88;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #bbb;
            margin-bottom: 30px;
        }

        /* DETAILS */
        .details-section {
            background: rgba(0,198,255,0.1);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: left;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            color: #ccc;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #00c6ff;
        }

        .detail-value {
            color: white;
        }

        /* BUTTON */
        .home-btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .home-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(0,114,255,0.6);
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">Car Rental</div>

    <div class="nav-links">
        <a href="user-home.php">Home</a>
        <a href="user-booking.php">Booking</a>
        <a href="user-feedback.php">Feedback</a>
    </div>
</div>

<!-- CONTAINER -->
<div class="container">

    <div class="confirmation-box">

        <div class="success-icon">✓</div>

        <h1>Booking Confirmed!</h1>
        <p class="subtitle">Your car booking has been confirmed successfully</p>

        <!-- DETAILS -->
        <div class="details-section">

            <div class="detail-item">
                <span class="detail-label">Booking ID:</span>
                <span class="detail-value">#<?php echo $booking['id']; ?></span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Car:</span>
                <span class="detail-value"><?php echo $booking['car_name']; ?> (<?php echo $booking['type']; ?>)</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Your Name:</span>
                <span class="detail-value"><?php echo $booking['user_name']; ?></span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Email:</span>
                <span class="detail-value"><?php echo $booking['user_email']; ?></span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Phone:</span>
                <span class="detail-value"><?php echo $booking['user_phone']; ?></span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Pickup Date:</span>
                <span class="detail-value"><?php echo $booking['pickup_date']; ?></span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Return Date:</span>
                <span class="detail-value"><?php echo $booking['return_date']; ?></span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Total Price:</span>
                <span class="detail-value">₹<?php echo $booking['total_price']; ?></span>
            </div>

        </div>

        <a href="user-home.php" class="home-btn">Back to Home</a>

    </div>

</div>

</body>
</html>
