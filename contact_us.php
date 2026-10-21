<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

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

    // Prepare and execute the SQL query to insert the contact form data into the database
    $sql = "INSERT INTO contact_submissions (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Thank you for seedback :)";

        echo "<br>";
        
        $url = "http://localhost/taxi/index.html";
        echo"<a href='$url'>Go to Home</a>";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the contact form if accessed directly without form submission
    header("Location: contact_form.html");
    exit();
}
?>
