<?php

session_start();

if(!isset($_SESSION["user_type"]) || $_SESSION["user_type"] === null){
    header("Location: login.php");
    exit; 
}

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $names = $conn->real_escape_string($_POST["names"]);
    $oname = $conn->real_escape_string($_POST["oname"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $certificate = $conn->real_escape_string($_POST["certificate"]);
    $country = $conn->real_escape_string($_POST["country"]);
    $city = $conn->real_escape_string($_POST["city"]);
    $experience = $conn->real_escape_string($_POST["experience"]);

    $sql = "INSERT INTO employer(company_name, owner_name, email, phone, certificate, country, city, experience)
            VALUES ('$names', '$oname','$email', '$phone', '$certificate', '$country', '$city', '$experience')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully";
        header("location:index3.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
