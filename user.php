<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $conn->real_escape_string($_POST["fname"]);
    $lname = $conn->real_escape_string($_POST["lname"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);

    $sql = "INSERT INTO user (first_name, last_name, email, password)
            VALUES ('$fname', '$lname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
 echo "<a href='login.php' style='position: container; under: 10px; right: 10px; color: black;'>login</a>";
$conn->close();
?>