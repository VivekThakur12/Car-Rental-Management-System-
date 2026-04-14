<!DOCTYPE html>
<html>
<head>
    <title>Car Rental - Choose Your Role</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1574023240744-64c47c8c0676');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* DARK OVERLAY */
        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.6));
            z-index: 1;
        }

        /* MAIN CONTAINER */
        .container {
            text-align: center;
            padding: 70px 50px;
            width: 90%;
            max-width: 850px;
            position: relative;
            z-index: 2;

            background: rgba(255,255,255,0.05);
            border-radius: 25px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.2);

            box-shadow: 0 25px 60px rgba(0,0,0,0.6);
        }

        /* TITLE */
        h1 {
            font-size: 60px;
            font-weight: 800;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 10px;
        }

        /* SUBTITLE */
        .subtitle {
            font-size: 22px;
            color: #e0e0e0;
            margin-bottom: 15px;
        }

        /* DESCRIPTION */
        .description {
            color: #cccccc;
            margin-bottom: 50px;
            font-size: 16px;
        }

        /* BUTTONS */
        .buttons {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 18px 60px;
            font-size: 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s ease;
        }

        /* USER BUTTON */
        .btn-user {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
        }

        .btn-user:hover {
            transform: scale(0.9);
        }

        /* OWNER BUTTON */
        .btn-owner {
            background: linear-gradient(135deg, #ffb347, #ffcc33);
            color: black;
        }

        .btn-owner:hover {
            transform: scale(0.9);
        }

        /* FEATURES */
        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
            flex-wrap: wrap;
            gap: 30px;
        }

        .feature {
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, rgba(0, 198, 255, 0.1), rgba(0, 114, 255, 0.1));
            border-radius: 15px;
            border: 1px solid rgba(0, 198, 255, 0.3);
            flex: 1;
            min-width: 180px;
            transition: 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-5px);
            background: linear-gradient(135deg, rgba(0, 198, 255, 0.2), rgba(0, 114, 255, 0.2));
        }

        .feature-text {
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

       

    </style>
</head>

<body>

    <div class="container">

        <h1>Drive Smart</h1>

        <div class="subtitle">Premium Car Rental Service</div>

        <p class="description">
            Choose your role to get started with our easy and reliable car rental platform
        </p>

        <div class="buttons">
            <a href="user-login.php" class="btn btn-user">User</a>
            <a href="owner-login.php" class="btn btn-owner">Owner</a>
        </div>

        <div class="features">

            <div class="feature">
                <div class="feature-text">Quick Booking</div>
            </div>

            <div class="feature">
                <div class="feature-text">Secure Payment</div>
            </div>

            <div class="feature">
                <div class="feature-text">Easy to Use</div>
            </div>

        </div>

    </div>

</body>
</html> 