<!DOCTYPE html>
<html>
<head>
    <title>User Registration - Car Rental</title>

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

        /* DARK OVERLAY */
        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.75);
        }

        /* CONTAINER */
        .container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 520px;
            height: 90vh;

            padding: 25px;
            border-radius: 20px;

            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.2);

            display: flex;
            flex-direction: column;
        }

        /* TITLE */
        h1 {
            text-align: center;
            font-size: 26px;

            background: linear-gradient(to right, #00c6ff, #0072ff);
            -webkit-background-clip: text;
            color: transparent;
        }

        .subtitle {
            text-align: center;
            color: #bbb;
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* FORM */
        form {
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 18px;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        form::-webkit-scrollbar {
            width: 0px;
        }

        /* INPUT GROUP */
        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            top: 16px;
            left: 14px;
            color: #00c6ff;
            font-size: 15px;
        }

        /* INPUT */
        input {
            width: 100%;
            padding: 14px 14px 14px 40px;
            border-radius: 10px;

            border: 1px solid rgba(255,255,255,0.15);

            background: rgba(255,255,255,0.06);
            color: #e6e6e6;

            font-size: 16px;
            font-weight: 500;

            transition: all 0.3s ease;
        }

        input::placeholder {
            color: #999;
            font-size: 14px;
        }

        /* HOVER */
        input:hover {
            background: rgba(255,255,255,0.10);
            border: 1px solid rgba(0,198,255,0.4);
        }

        /* FOCUS */
        input:focus {
            outline: none;
            background: rgba(255,255,255,0.12);

            border: 1px solid #00c6ff;
            box-shadow: 0 0 15px rgba(0,198,255,0.6);
        }

        /* WHEN TYPING */
        input:not(:placeholder-shown) {
            background: rgba(255,255,255,0.10);
            color: #ffffff;
        }

        /* AUTOFILL FIX */
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px rgba(0,0,0,0.8) inset;
            -webkit-text-fill-color: #fff;
        }

        /* BUTTON */
        button {
            padding: 16px;
            border-radius: 10px;
            border: none;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;

            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;

            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0,114,255,0.8);
        }

        .extra {
            text-align: center;
            margin-top: 10px;
            font-size: 13px;
            color: #aaa;
        }

        .extra a {
            color: #00c6ff;
            text-decoration: none;
        }

        /* BUTTONS CONTAINER */
        .buttons {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        /* BUTTON LINK */
        .btn {
            flex: 1;
            padding: 16px;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
            display: block;
        }

        .btn-user {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
        }

        .btn-user:hover {
            transform: scale(1.05);
        }

    </style>
</head>

<body>

<div class="container">

    <h1>User Registration</h1>
    <p class="subtitle">Create your account</p>

    <form>

        <div class="input-group">
            <i class="fa fa-user"></i>
            <input type="text" placeholder="Enter your name" required>
        </div>

        <div class="input-group">
            <i class="fa fa-envelope"></i>
            <input type="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <i class="fa fa-phone"></i>
            <input type="tel" placeholder="Phone" required>
        </div>

        <div class="input-group">
            <i class="fa fa-location-dot"></i>
            <input type="text" placeholder="State" required>
        </div>

        <div class="input-group">
            <i class="fa fa-city"></i>
            <input type="text" placeholder="City" required>
        </div>

        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" placeholder="Password" required>
        </div>

        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" placeholder="Confirm Password" required>
        </div>

        <div class="buttons">
            <a href="user-home.php" class="btn btn-user">Register</a>
        </div>
    </form>

    <div class="extra">
        Already have an account? <a href="user-login.php">Login</a>
    </div>

</div>

</body>
</html>