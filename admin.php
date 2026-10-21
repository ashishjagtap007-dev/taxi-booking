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

// Process admin login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];

    // Retrieve admin data from the database
    $sql = "SELECT * FROM admins WHERE username = '$admin_username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify password
        if ($admin_password === $row["password"]) { // Note: In a production system, use password hashing
            // Admin login successful - Redirect to admin dashboard
            header("Location: admin dashboard.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Admin not found";
    }
}

$conn->close();
?>
