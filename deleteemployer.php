<?php
    include('connection.php');

    // Check if ID parameter is provided in the URL
    if(isset($_GET['id'])) {
        // Sanitize the ID parameter to prevent SQL injection
        $id = $_GET['id'];

        // Prepare a delete statement
        $sql = "DELETE FROM employer WHERE company_name = ?";

        if($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $id);

            // Attempt to execute the prepared statement
            if($stmt->execute()) {
                // Record deleted successfully, redirect back to employersview.php
                header("location: employersveiw.php");
                exit();
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

        // Close statement
        $stmt->close();
    } else {
        // Redirect to employersview.php if ID parameter is not provided
        header("location: employersview.php");
        exit();
    }

    // Close connection
    $conn->close();
?>
