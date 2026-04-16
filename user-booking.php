<?php
// Include database connection
include 'db_config.php';

// Check if car_id is provided
$booking_mode = 'browse'; // Default mode - show all cars
$car = null;

if(isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
    
    // Fetch car details from database
    $car_result = $conn->query("SELECT * FROM cars WHERE id = '$car_id'");
    
    // Check if car exists
    if($car_result && $car_result->num_rows > 0) {
        $car = $car_result->fetch_assoc();
        $booking_mode = 'booking'; // Switch to booking form mode
    } else {
        // Car not found, switch to browse mode
        $booking_mode = 'browse';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Car - Car Rental</title>

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
            max-width: 900px;
            margin: 60px auto;
            padding: 0 40px;
        }

        h1 {
            text-align: center;
            font-size: 32px;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 40px;
        }

        /* BOOKING BOX */
        .booking-box {
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
        }

        /* CAR DETAILS */
        .car-details-section {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 30px;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .car-image-section {
            text-align: center;
        }

        .car-image-section img {
            width: 100%;
            border-radius: 10px;
            max-height: 250px;
            object-fit: contain;
        }

        .car-info-section h2 {
            color: #00c6ff;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .car-info-section p {
            color: #ccc;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .price-section {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .price-big {
            font-size: 28px;
            color: #00c6ff;
            font-weight: 700;
        }

        /* FORM SECTION */
        .form-section h3 {
            color: #00c6ff;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .form-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }

        .form-group.full {
            grid-template-columns: 1fr;
        }

        input, select {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.15);
            background: rgba(255,255,255,0.06);
            color: white;
            font-size: 14px;
        }

        input::placeholder {
            color: #999;
        }

        input:focus, select:focus {
            outline: none;
            border: 1px solid #00c6ff;
            box-shadow: 0 0 10px rgba(0,198,255,0.3);
        }

        /* BUTTON */
        .booking-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 20px;
        }

        .booking-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(0,114,255,0.6);
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: rgba(255,255,255,0.1);
            border-radius: 8px;
            color: #00c6ff;
            text-decoration: none;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: rgba(0,198,255,0.2);
        }

        /* CARS CONTAINER */
        .cars-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        /* CAR CARD */
        .car-card {
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.2);
            overflow: hidden;
            transition: 0.3s;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
        }

        .car-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 50px rgba(0,198,255,0.4);
        }

        .car-card-image {
            width: 100%;
            height: 220px;
            background: rgba(0,198,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .car-card-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }

        .car-card-info {
            padding: 20px;
        }

        .car-card-name {
            font-size: 20px;
            font-weight: 700;
            color: #00c6ff;
            margin-bottom: 10px;
        }

        .car-card-details {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 13px;
            color: #ccc;
        }

        .car-card-price {
            font-size: 22px;
            font-weight: 700;
            color: #00c6ff;
            margin-bottom: 15px;
        }

        .book-car-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .book-car-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(0,114,255,0.6);
        }

        /* EMPTY STATE */
        .empty-box {
            text-align: center;
            padding: 60px;
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(15px);
        }

        .empty-box h2 {
            color: #ff6b6b;
            margin-bottom: 10px;
        }

        .empty-box p {
            color: #ccc;
        }

        .icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(0,114,255,0.6);
        }

        /* BOOKINGS LIST */
        .bookings-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .booking-card {
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.2);
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
            display: flex;
            flex-direction: column;
        }

        .booking-header {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            padding: 15px;
            color: white;
            font-weight: 600;
        }

        .booking-details {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .booking-detail-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            font-size: 14px;
            flex-shrink: 0;
        }

        .booking-detail-item:last-of-type {
            border-bottom: none;
        }

        .booking-label {
            color: #00c6ff;
            font-weight: 600;
        }

        .booking-value {
            color: #ccc;
        }

        .total-price {
            font-size: 20px;
            color: #00ff88;
            font-weight: 700;
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid rgba(255,255,255,0.2);
            flex-shrink: 0;
        }

        .delete-btn {
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            background: #ff4d4d;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            flex-shrink: 0;
        }

        .delete-btn:hover {
            background: #ff2e2e;
            transform: scale(1.05);
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

    <?php
    // Show different content based on mode
    if($booking_mode == 'booking' && $car) {
        // BOOKING FORM MODE - Show specific car booking form
    ?>
    <h1>Book a Car</h1>

    <a href="user-home.php" class="back-btn">← Back</a>

    <div class="booking-box">

        <!-- CAR DETAILS -->
        <div class="car-details-section">

            <div class="car-image-section">
                <img src="<?php echo htmlspecialchars($car['image']); ?>" alt="<?php echo htmlspecialchars($car['car_name']); ?>">
            </div>

            <div class="car-info-section">
                <h2><?php echo htmlspecialchars($car['car_name']); ?></h2>
                <p><strong>Type:</strong> <?php echo htmlspecialchars($car['type']); ?></p>
                <p><strong>Fuel:</strong> <?php echo htmlspecialchars($car['fuel']); ?></p>

                <div class="price-section">
                    <p>Price per day</p>
                    <div class="price-big">₹<?php echo htmlspecialchars($car['price']); ?></div>
                </div>
            </div>

        </div>

        <!-- BOOKING FORM -->
        <div class="form-section">
            <h3>Booking Details</h3>

            <form action="process-booking.php" method="POST">

                <input type="hidden" name="car_id" value="<?php echo htmlspecialchars($car['id']); ?>">

                <div class="form-group full">
                    <input type="text" name="user_name" placeholder="Your Full Name" required>
                </div>

                <div class="form-group full">
                    <input type="email" name="user_email" placeholder="Your Email" required>
                </div>

                <div class="form-group full">
                    <input type="tel" name="user_phone" placeholder="Your Phone Number" required>
                </div>

                <div class="form-group">
                    <input type="date" name="pickup_date" required>
                    <input type="date" name="return_date" required>
                </div>

                <button type="submit" class="booking-btn">Confirm Booking</button>

            </form>
        </div>

    </div>

    <?php
    } else {
        // SHOW ALL BOOKINGS MODE
    ?>

    <h1>Booked Car</h1>

    <div class="booking-box">

        <?php
        // Fetch all bookings from database
        $bookings_result = $conn->query("SELECT b.*, c.car_name, c.type, c.fuel, c.price, c.image FROM bookings b 
                                        JOIN cars c ON b.car_id = c.id 
                                        ORDER BY b.booking_date DESC");

        if ($bookings_result && $bookings_result->num_rows > 0) {
            echo '<div class="bookings-container">';
            
            // Loop through each booking and display
            while ($booking = $bookings_result->fetch_assoc()) {
                $pickup = new DateTime($booking['pickup_date']);
                $return = new DateTime($booking['return_date']);
                $days = $return->diff($pickup)->days;

                echo '
                <div class="booking-card">
                    <div class="booking-header">
                        Booking ID: #' . $booking['id'] . '
                    </div>
                    <div class="booking-details">

                        <div class="booking-detail-item">
                            <span class="booking-label">Car:</span>
                            <span class="booking-value">' . htmlspecialchars($booking['car_name']) . '</span>
                        </div>

                        <div class="booking-detail-item">
                            <span class="booking-label">Type:</span>
                            <span class="booking-value">' . htmlspecialchars($booking['type']) . '</span>
                        </div>

                        <div class="booking-detail-item">
                            <span class="booking-label">Fuel:</span>
                            <span class="booking-value">' . htmlspecialchars($booking['fuel']) . '</span>
                        </div>

                        <div class="booking-detail-item">
                            <span class="booking-label">Name:</span>
                            <span class="booking-value">' . htmlspecialchars($booking['user_name']) . '</span>
                        </div>

                        <div class="booking-detail-item">
                            <span class="booking-label">Email:</span>
                            <span class="booking-value">' . htmlspecialchars($booking['user_email']) . '</span>
                        </div>

                        <div class="booking-detail-item">
                            <span class="booking-label">Phone:</span>
                            <span class="booking-value">' . htmlspecialchars($booking['user_phone']) . '</span>
                        </div>

                        <div class="booking-detail-item">
                            <span class="booking-label">Pickup:</span>
                            <span class="booking-value">' . $booking['pickup_date'] . '</span>
                        </div>

                        <div class="booking-detail-item">
                            <span class="booking-label">Return:</span>
                            <span class="booking-value">' . $booking['return_date'] . '</span>
                        </div>

                        <div class="booking-detail-item">
                            <span class="booking-label">Days:</span>
                            <span class="booking-value">' . $days . ' days</span>
                        </div>

                        <div class="total-price">
                            Total: ₹' . $booking['total_price'] . '
                        </div>

                        <a href="delete-booking.php?id=' . $booking['id'] . '" class="delete-btn" onclick="return confirm(\'Are you sure you want to delete this booking?\')">Delete Booking</a>

                    </div>
                </div>
                ';
            }
            
            echo '</div>';
        } else {
            echo '
            <div class="empty-box">
                <h2>No Bookings Yet</h2>
                <p>You haven\'t booked any car yet. Go to Home and click "Book Now" to start your first booking!</p>
                <a href="user-home.php" class="btn">Go to Home</a>
            </div>
            ';
        }
        ?>

    </div>

    <?php
    }
    ?>

</div>

</body>
</html>