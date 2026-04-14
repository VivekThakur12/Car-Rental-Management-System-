<!DOCTYPE html>
<html>
<head>
    <title>Owner - Add Car</title>

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

        .owner-name {
            color: #ffcc33;
            font-weight: 600;
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

        /* FORM */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px);
        }

        .form-box {
            width: 100%;
            max-width: 520px;
            padding: 30px;
            border-radius: 20px;

            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        h1 {
            text-align: center;
            font-size: 26px;
            background: linear-gradient(to right, #ffb347, #ffcc33);
            -webkit-background-clip: text;
            color: transparent;
        }

        .subtitle {
            text-align: center;
            color: #bbb;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            top: 15px;
            left: 14px;
            color: #ffcc33;
        }

        input, select {
            width: 100%;
            padding: 14px 14px 14px 40px;
            border-radius: 10px;

            border: 1px solid rgba(255,255,255,0.15);
            background: rgba(255,255,255,0.06);
            color: #e6e6e6;
        }

        input::placeholder {
            color: #ccc;
        }

        select {
            appearance: none;
        }

        select option {
            background: rgba(0,0,0,0.8);
            color: #ffcc33;
        }

        select option:hover {
            background: #ffcc33;
            color: black;
        }

        input:focus, select:focus {
            outline: none;
            border: 1px solid #ffcc33;
        }

        /* BUTTON */
        button {
            padding: 15px;
            border-radius: 10px;
            border: none;
            font-size: 18px;
            font-weight: 600;

            background: linear-gradient(135deg, #ffb347, #ffcc33);
            color: black;

            cursor: pointer;
        }

        button:hover {
            transform: scale(1.05);
        }

    </style>
</head>

<body>

<!-- 🔥 NAVBAR -->
<div class="navbar">
    <div class="logo">Owner Panel</div>

    <div class="nav-right">
        <a href="owner-home.php" class="nav-btn">Home</a>
        <a href="car-history.php" class="nav-btn">History</a>
        <a href="index.php" class="nav-btn logout">Logout</a>
    </div>
</div>

<!-- FORM -->
<div class="container">

    <div class="form-box">

        <h1>Add New Car</h1>
        <p class="subtitle">Add cars for rent</p>

        <form action="add-car.php" method="POST">

            <div class="input-group">
                <i class="fa fa-car"></i>
                <input type="text" name="car_name" placeholder="Car Name" required>
            </div>

            <div class="input-group">
                <i class="fa fa-list"></i>
                <select name="type" required>
                    <option value="">Select Car Type</option>
                    <option>SUV</option>
                    <option>Sedan</option>
                    <option>Hatchback</option>
                    <option>Luxury</option>
                </select>
            </div>

            <div class="input-group">
                <i class="fa fa-rupee-sign"></i>
                <input type="number" name="price" placeholder="Price per day" required>
            </div>

            <div class="input-group">
                <i class="fa fa-gas-pump"></i>
                <select name="fuel" required>
                    <option value="">Select Fuel Type</option>
                    <option>Petrol</option>
                    <option>Diesel</option>
                    <option>EV</option>
                    <option>CNG</option>
                </select>
            </div>

            <div class="input-group">
                <i class="fa fa-image"></i>
                <input type="text" name="image" placeholder="Image URL" required>
            </div>

            <button type="submit" name="submit">Add Car</button>

        </form>

    </div>

</div>

</body>
</html>