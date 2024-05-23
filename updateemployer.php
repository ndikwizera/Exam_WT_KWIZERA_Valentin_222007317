<?php
    include('connection.php');

    // Check if ID parameter is provided in the URL
    if(isset($_GET['id'])) {
        // Sanitize the ID parameter to prevent SQL injection
        $id = $_GET['id'];

        // Retrieve the employer record based on the provided ID
        $sql = "SELECT * FROM employer WHERE company_name = ?";
        if($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $id);

            // Execute the prepared statement
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            // Fetch data
            $row = $result->fetch_assoc();

            // Close statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        // Redirect to employersview.php if ID parameter is not provided
        header("location: employersview.php");
        exit();
    }

    // Check if the update form is submitted
    if(isset($_POST['submit'])) {
        // Extract form data
        $company_name = $_POST['company_name'];
        $owner_name = $_POST['owner_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $certificate = $_POST['certificate'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $experience = $_POST['experience'];

        // Update query
        $update_sql = "UPDATE employer SET owner_name = ?, email = ?, phone = ?, certificate = ?, country = ?, city = ?, experience = ? WHERE company_name = ?";
        if($stmt = $conn->prepare($update_sql)) {
            // Bind parameters to the prepared statement
            $stmt->bind_param("ssssssss", $owner_name, $email, $phone, $certificate, $country, $city, $experience, $company_name);

            // Execute the prepared statement
            if($stmt->execute()) {
                // Redirect back to employersview.php after successful update
                header("location: employersveiw.php");
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employer</title>
</head>
<body>
    <h1>Update Employer</h1>
    <form method="POST">
        <input type="hidden" name="company_name" value="<?php echo $row['company_name']; ?>">
        Owner Name: <input type="text" name="owner_name" value="<?php echo $row['owner_name']; ?>"><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
        Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br>
        Certificate: <input type="text" name="certificate" value="<?php echo $row['certificate']; ?>"><br>
        Country: <input type="text" name="country" value="<?php echo $row['country']; ?>"><br>
        City: <input type="text" name="city" value="<?php echo $row['city']; ?>"><br>
        Experience: <input type="text" name="experience" value="<?php echo $row['experience']; ?>"><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
