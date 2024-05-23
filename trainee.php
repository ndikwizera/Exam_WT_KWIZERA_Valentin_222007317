<?php
    include('connection.php');

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data and sanitize inputs
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
        $position = mysqli_real_escape_string($conn, $_POST['position']);

        // SQL query to insert data into trainee table
        $sql = "INSERT INTO trainee (first_name, last_name, email, phone, country, city, gender, birth_date, position) 
                VALUES ('$fname', '$lname', '$email', '$phone', '$country', '$city', '$gender', '$birth_date', '$position')";

        if ($conn->query($sql) === TRUE) {
            echo "New record added successfully";
        header("location:viewtrainee.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
?>
