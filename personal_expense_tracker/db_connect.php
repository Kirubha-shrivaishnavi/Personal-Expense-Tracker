<?php
$servername = "localhost";
$username = "root";
$password = "Shri@123";
$dbname = "PersonalExpenseDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
