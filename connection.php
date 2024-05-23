<?php
$servername = "localhost";
$username = "kwizera";
$password = "valentin";
$dbname = "job_search_support_platform";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
