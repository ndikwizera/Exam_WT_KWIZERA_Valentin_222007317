<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fname = $conn->real_escape_string($_POST["fname"]);
    $lname = $conn->real_escape_string($_POST["lname"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $country = $conn->real_escape_string($_POST["country"]);
    $city = $conn->real_escape_string($_POST["city"]);
    $gender = $conn->real_escape_string($_POST["gender"]);
    $birth_date = $conn->real_escape_string($_POST["birth_date"]);
    $biography = $conn->real_escape_string($_POST["biography"]);
    $experiance = $conn->real_escape_string($_POST["experiance"]);
    $education = $conn->real_escape_string($_POST["education"]);
    $certificate = $conn->real_escape_string($_POST["certificate"]);

    $sql = "INSERT INTO jobseeker (first_name, last_name, email, phone, country, city, gender, birth_date, biography, experience, education, certificate)
            VALUES ('$fname', '$lname', '$email', '$phone', '$country','$city', '$gender', '$birth_date', '$biography', '$experiance', '$education', '$certificate')";

    if ($conn->query($sql) === TRUE) {
        
        echo"<script>alert('Registration successful!')</script>";
         header("location: index2.html");

    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
