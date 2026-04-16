<?php
// Include database connection
include 'db_config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car History - Owner Panel</title>

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
            background: url('https://images.unsplash.com/photo-1585503418537-88331351ad99') no-repeat center/cover;
            min-height: 100vh;
            padding-top: 60px;
        }

        body::before {
            content: '';
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.75);
            z-index: -1;
        }

        /* 🔥 NAVBAR */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 15px 40px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(10px);
            z-index: 10;
            border-bottom: 2px solid #ffcc33;
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            color: #ffcc33;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-btn {
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;

            background: rgba(255,255,255,0.08);
            color: #fff;

            transition: 0.3s;
        }

        .nav-btn:hover {
            background: linear-gradient(135deg, #ffb347, #ffcc33);
            color: black;
            transform: scale(1.05);
        }

        .logout {
            border: 1px solid #ff4d4d;
            color: #ff6b6b;
        }

        .logout:hover {
            background: #ff4d4d;
            color: white;
        }

        /* CONTAINER */
        .container {
            max-width: 1000px;
            margin: 60px auto;
            padding: 0 40px;
        }

        h1 {
            text-align: center;
            font-size: 32px;
            background: linear-gradient(to right, #ffb347, #ffcc33);
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 40px;
        }

        /* TABLE STYLE */
        .table-box {
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.2);
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, #ffb347, #ffcc33);
        }

        th {
            color: black;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        td {
            color: #ccc;
            padding: 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        tr:hover {
            background: rgba(255,204,51,0.05);
        }

        .delete-btn {
            background: #ff4d4d;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .delete-btn:hover {
            background: #ff2e2e;
            transform: scale(1.05);
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
            color: #ffcc33;
            margin-bottom: 10px;
        }

        .empty-box p {
            color: #ccc;
        }

        .icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

    </style>
</head>

<body>

<!-- 🔥 NAVBAR -->
<div class="navbar">
    <div class="logo">Owner Panel</div>

    <div class="nav-right">
        <a href="owner-home.php" class="nav-btn">Home</a>
        <a href="car-history.php" class="nav-btn">Management</a>
        <a href="index.php" class="nav-btn logout">Logout</a>
    </div>
</div>

<!-- CONTAINER -->
<div class="container">

    <h1>Car History</h1>

    <?php
    // ==================== FETCH ALL CARS FROM DATABASE ====================

    // Query to get all cars from cars table
    $result = $conn->query("SELECT * FROM cars ORDER BY id DESC");

    // Check if cars exist in database
    if ($result->num_rows > 0) {
        echo '
        <div class="table-box">
            <table>
                <thead>
                    <tr>
                        <th>Car Name</th>
                        <th>Type</th>
                        <th>Fuel</th>
                        <th>Price/Day</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
        ';

        // Loop through each car and display in table
        while ($car = $result->fetch_assoc()) {
            echo '
            <tr>
                <td>' . $car['car_name'] . '</td>
                <td>' . $car['type'] . '</td>
                <td>' . $car['fuel'] . '</td>
                <td>₹' . $car['price'] . '</td>
                <td>
                    <a href="delete-car.php?id=' . $car['id'] . '" class="delete-btn" onclick="return confirm(\'Are you sure?\')">Delete</a>
                </td>
            </tr>
            ';
        }

        echo '
                </tbody>
            </table>
        </div>
        ';
    } else {
        // Display message if no cars in database
        echo '
        <div class="empty-box">
            <div class="icon">📭</div>
            <h2>No Cars Added</h2>
            <p>You haven\'t added any cars yet. Go to Home to add your first car!</p>
        </div>
        ';
    }
    ?>

</div>

</body>
</html>
