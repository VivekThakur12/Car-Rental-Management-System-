<!DOCTYPE html>
<html>
<head>
    <title>Feedback - Car Rental</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

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
            padding: 20px 50px;
            background: rgba(0,0,0,0.6);
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #00c6ff;
        }

        .nav-links a {
            margin-left: 30px;
            color: #ccc;
            text-decoration: none;
        }

        .nav-links a:hover {
            color: #00c6ff;
        }

        /* MAIN */
        .main {
            display: flex;
            height: calc(100vh - 80px);
        }

        /* 🔥 IMPROVED LEFT IMAGE */
        .left {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .left::before {
            content: "";
            position: absolute;
            inset: 0;
            background: 
                linear-gradient(to right, rgba(0,0,0,0.7), rgba(0,0,0,0.2)),
                url('https://media.istockphoto.com/id/2258346658/photo/five-star-car-rating-and-customer-satisfaction-concept.jpg?s=2048x2048&w=is&k=20&c=49lxZn5J8zDYPla4ZW97JQHzkxUCtcGYViI0PRh4RPI=') center/cover no-repeat;
            z-index: 1;
            transition: transform 0.6s ease;
        }

        .left:hover::before {
            transform: scale(1.08);
        }

        .left::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(0,198,255,0.2), transparent 70%);
            z-index: 2;
        }

        /* RIGHT FORM */
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 20px;
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(15px);
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
        }

        h2 {
            text-align: center;
            background: linear-gradient(to right, #00c6ff, #0072ff);
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
            gap: 15px;
        }

        input, textarea {
            padding: 12px;
            border-radius: 8px;
            border: none;
            background: rgba(255,255,255,0.08);
            color: white;
            font-size: 14px;
        }

        textarea {
            height: 100px;
        }

        input:focus, textarea:focus {
            outline: none;
            border: 1px solid #00c6ff;
        }

        /* ⭐ RATING BUTTON STYLE */
        .rating-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .rating-option {
            display: none;
        }

        .rating-label {
            padding: 10px 15px;
            border-radius: 6px;
            background: rgba(255,255,255,0.08);
            color: #bbb;
            cursor: pointer;
            transition: 0.3s;
        }

        .rating-option:checked + .rating-label {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
        }

        .rating-label:hover {
            background: rgba(0,198,255,0.2);
        }

        /* BUTTON */
        button {
            padding: 14px;
            border-radius: 8px;
            border: none;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            transform: scale(1.05);
        }

        @media (max-width: 900px) {
            .left {
                display: none;
            }
        }

    </style>
</head>

<body>

<div class="navbar">
    <div class="logo">Car Rental</div>
    <div class="nav-links">
         <a href="user-home.php">Home</a>
        <a href="user-booking.php">Booking</a>
        <a href="user-feedback.php">Feedback</a>
    </div>
</div>

<div class="main">

    <div class="left"></div>

    <div class="right">
        <div class="form-box">

            <h2>Give Feedback</h2>
            <p class="subtitle">We value your experience</p>

            <form>

                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Your Email" required>

                <!-- ⭐ RATING -->
                <div class="rating-container">
                    <input type="radio" id="poor" name="rating" class="rating-option" required>
                    <label for="poor" class="rating-label">Poor</label>

                    <input type="radio" id="average" name="rating" class="rating-option">
                    <label for="average" class="rating-label">Average</label>

                    <input type="radio" id="good" name="rating" class="rating-option">
                    <label for="good" class="rating-label">Good</label>

                    <input type="radio" id="verygood" name="rating" class="rating-option">
                    <label for="verygood" class="rating-label">Very Good</label>

                    <input type="radio" id="excellent" name="rating" class="rating-option">
                    <label for="excellent" class="rating-label">Excellent</label>
                </div>

                <textarea placeholder="Write your feedback..." required></textarea>

                <button type="submit">Submit Feedback</button>

            </form>

        </div>
    </div>

</div>

</body>
</html>