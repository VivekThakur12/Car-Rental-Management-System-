<?php

// Create connection to MySQL server
$conn = new mysqli("localhost", "root", "");
if ($conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

// Create database if not exists 
$db = $conn->query("CREATE DATABASE IF NOT EXISTS car_rental");
if ($db) {
    // Database created successfully
} else {
    echo "Error creating database: " . $conn->error;
}

// Connect to the car_rental database
$conn = new mysqli("localhost", "root", "", "car_rental");
if ($conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
}


// ==================== CREATE CARS TABLE ====================

// Create table if not exists 
$table = $conn->query("CREATE TABLE IF NOT EXISTS cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_name VARCHAR(100),
    type VARCHAR(50),
    price INT,
    fuel VARCHAR(50),
    image VARCHAR(255)
)");

if ($table) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}


// ==================== CREATE BOOKINGS TABLE ====================

// Create bookings table if not exists
$bookings_table = $conn->query("CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT,
    user_name VARCHAR(100),
    user_email VARCHAR(100),
    user_phone VARCHAR(20),
    pickup_date DATE,
    return_date DATE,
    total_price INT,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (car_id) REFERENCES cars(id)
)");

if ($bookings_table) {
    // Bookings table created successfully
} else {
    echo "Error creating bookings table: " . $conn->error;
}

?>
