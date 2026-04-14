<?php
// Include database connection
include 'db_config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Rental Home</title>

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

        /* CARS CONTAINER */
        .cars-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 40px;
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

        .car-image {
            width: 100%;
            height: 220px;
            background: rgba(0,198,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .car-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
            background: rgba(0,0,0,0.3);
        }

        .car-info {
            padding: 20px;
        }

        .car-name {
            font-size: 20px;
            font-weight: 700;
            color: #00c6ff;
            margin-bottom: 5px;
        }

        .car-brand {
            color: #bbb;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .car-details {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: #ccc;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .price {
            font-size: 22px;
            font-weight: 700;
            color: #00c6ff;
            margin-bottom: 15px;
        }

        .book-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            display: block;
            text-align: center;
            text-decoration: none;
        }

        .book-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(0,114,255,0.6);
        }

        /* HERO */
        .hero {
            text-align: center;
            margin-top: 80px;
        }

        .hero h1 {
            font-size: 40px;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            -webkit-background-clip: text;
            color: transparent;
        }

        .hero p {
            color: #bbb;
            margin-top: 10px;
        }

        /* 🚫 EMPTY STATE */
        .empty-box {
            margin: 80px auto;
            max-width: 500px;
            text-align: center;
            padding: 40px;

            background: rgba(255,255,255,0.05);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.2);

            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
        }

        .empty-box h2 {
            color: #ff6b6b;
            margin-bottom: 10px;
        }

        .empty-box p {
            color: #ccc;
        }

        /* ICON STYLE */
        .icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        /* BUTTON */
        .retry-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;

            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            font-weight: 600;

            transition: 0.3s;
        }

        .retry-btn:hover {
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

<!-- HERO -->
<div class="hero">
    <h1>Choose Your Perfect Ride</h1>
    <p>Book cars easily and travel comfortably</p>
</div>

<?php
// ==================== FETCH ALL CARS FROM DATABASE ====================

// Query to get all cars from cars table
$result = $conn->query("SELECT * FROM cars");

// Check if cars exist in database
if ($result->num_rows > 0) {
    echo '<div class="cars-container">';
    
    // Loop through each car and display in card format
    while ($car = $result->fetch_assoc()) {
        echo '
        <div class="car-card">
            <div class="car-image">
                <img src="' . $car['image'] . '" alt="' . $car['car_name'] . '">
            </div>
            <div class="car-info">
                <div class="car-name">' . $car['car_name'] . '</div>
                
                <div class="car-details">
                    <div class="detail-item">
                        <i class="fa fa-list"></i> ' . $car['type'] . '
                    </div>
                    <div class="detail-item">
                        <i class="fa fa-gas-pump"></i> ' . $car['fuel'] . '
                    </div>
                </div>
                
                <div class="price">₹' . $car['price'] . '/day</div>
                <a href="user-booking.php?car_id=' . $car['id'] . '" class="book-btn">Book Now</a>
            </div>
        </div>
        ';
    }
    
    echo '</div>';
} else {
    // Display message if no cars in database
    echo '
    <div class="empty-box">
        <div class="icon">🚫</div>
        <h2>No Cars Available</h2>
        <p>This time no cars available. Please try again later.</p>
        <a href="user-home.php" class="retry-btn">Refresh</a>
    </div>
    ';
}
?>


</body>
</html> 