<!DOCTYPE html>
<html>
<head>
    <title>Owner Login - Car Rental</title>

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
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.75);
        }

        .container {
            position: relative;
            z-index: 2;
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

        input {
            width: 100%;
            padding: 14px 14px 14px 40px;
            border-radius: 10px;

            border: 1px solid rgba(255,255,255,0.15);

            background: rgba(255,255,255,0.06);
            color: #e6e6e6;

            font-size: 15px;
        }

        input:focus {
            outline: none;
            border: 1px solid #ffcc33;
            box-shadow: 0 0 10px rgba(255,204,51,0.6);
        }

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

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn {
            padding: 15px;
            border-radius: 10px;
            border: none;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
            flex: 1;
            display: block;
        }

        .btn-user {
            background: linear-gradient(135deg, #ffb347, #ffcc33);
            color: black;
        }

        .btn-user:hover {
            transform: scale(0.9);
            box-shadow: 0 10px 30px rgba(255,204,51,0.5);
        }

    </style>
</head>

<body>

<div class="container">

    <h1>Owner Login</h1>
    <p class="subtitle">Manage your car rental business</p>

    <form>

        <!-- OWNER DETAILS -->
        <div class="input-group">
            <i class="fa fa-user"></i>
            <input type="text" placeholder="Owner Name" required>
        </div>

        <div class="input-group">
            <i class="fa fa-store"></i>
            <input type="text" placeholder="Shop Name" required>
        </div>

        <div class="input-group">
            <i class="fa fa-phone"></i>
            <input type="tel" placeholder="Phone Number" required>
        </div>

        <!-- LOCATION -->
        <div class="input-group">
            <i class="fa fa-city"></i>
            <input type="text" placeholder="City" required>
        </div>

        <div class="input-group">
            <i class="fa fa-location-dot"></i>
            <input type="text" placeholder="Shop Address" required>
        </div>

        <!-- LOGIN -->
        <div class="input-group">
            <i class="fa fa-envelope"></i>
            <input type="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" placeholder="Password" required>
        </div>

<div class="buttons">
            <a href="owner-home.php" class="btn btn-user">Login & Continue</a>
        </div>
    </form>

</div>

</body>
</html>