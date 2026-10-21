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

// Fetch recent taxi bookings
$sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 10"; // Fetching the latest 10 bookings as an example
$result = $conn->query($sql);

// Process the fetched data and display it on the admin dashboard
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style> {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    
    center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    
    h2 {
        text-align: center;
        color: #333;
    }
    
    div {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h3 {
        color: #333;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }
    
    th {
        background-color: #f2f2f2;
    }
    
    /* Add media query for better responsiveness */
    @media screen and (max-width: 600px) {
        div {
            max-width: 100%;
        }
    }
    
</style>
</head>

<body>
    <h2>Welcome to Admin Dashboard</h2>

    <div>
        <h3>Recent Taxi Bookings</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pickup Location</th>
                    <th>Drop Location</th>
                    <th>Booking Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['pickup_location']}</td>";
                    echo "<td>{$row['drop_location']}</td>";
                    echo "<td>{$row['booking_date']}</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "</tr>";

                    
                }
                ?>
            </tbody>
        </table>
        <li><a href="index.html">Home</a></li>

    </div>
</body>

</html>
