<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taxi";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process taxi booking form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pickup_location = $_POST["pickup_location"];
    $drop_location = $_POST["drop_location"];
    $booking_date = $_POST["booking_date"];

    // Assume a user ID for simplicity (you may handle user authentication separately)
    $user_id = 1;

    // Insert booking data into the database
    $sql = "INSERT INTO bookings (user_id, pickup_location, drop_location, booking_date) 
            VALUES ($user_id, '$pickup_location', '$drop_location', '$booking_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Taxi booked successfully!";
        echo "<br>";
        
        $url = "http://localhost/taxi/index.html";
        echo"<a href='$url'>Go to Home</a>";
               
        // Add code to redirect or perform additional actions after successful booking
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
