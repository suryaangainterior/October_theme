<?php
// Database connection parameters
$servername = "localhost";  // GoDaddy MySQL hostname, usually 'localhost'
$username = "localhost"; // Your database username
$password = "Suryaanga@24"; // Your database password
$dbname = "Suryaanga_users"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$service = $_POST['service'];
$note = $_POST['note'];

// SQL query to insert data
$sql = "INSERT INTO quotes (name, email, mobile, service, note) 
        VALUES ('$name', '$email', '$mobile', '$service', '$note')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

$stmt = $conn->prepare("INSERT INTO quotes (name, email, mobile, service, note) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $mobile, $service, $note);
$stmt->execute();
$stmt->close();

?>

