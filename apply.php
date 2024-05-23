<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission
    $company_name = $_POST['company_name'];
    $job_title = $_POST['job_title'];
    $description = $_POST['description'];
    $summary = $_POST['summary'];
    $cv = $_FILES['cv']['name'];

    // Directory where CVs will be stored
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["cv"]["name"]);
    $uploadOk = 1;
    $cvFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a real PDF or fake PDF
    if ($cvFileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if file upload is OK
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
            // Insert the application into the database
            $sql = "INSERT INTO application (company_name, job_title, description, summary, cv) VALUES ('','$company_name', '$job_title', '$description' '$summary', '$cv')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Application submitted successfully.</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
} else if (isset($_GET['company_name']) && isset($_GET['job_title']) && isset($_GET['description'])) {
    // Retrieve job details from the URL parameters
    $company_name = $_GET['company_name'];
    $job_title = $_GET['job_title'];
    $description = $_GET['description'];
} else {
    echo "<p>Invalid request.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Apply for Job</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            color: black;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: green;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input, textarea {
            margin-top: 5px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid black;
            border-radius: 4px;
        }
        button {
            background-color: #191c19;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #4eb9f7;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Apply for Job</h2>

    <form action="apply.php" method="POST" enctype="multipart/form-data">
        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name" value="<?php echo htmlspecialchars($company_name); ?>" readonly>

        <label for="job_title">Job Title:</label>
        <input type="text" id="job_title" name="job_title" value="<?php echo htmlspecialchars($job_title); ?>" readonly>

        <label for="description">Job Description:</label>
        <textarea id="description" name="description" rows="4" readonly><?php echo htmlspecialchars($description); ?></textarea>

        <label for="summary">Write a short essay:</label>
        <textarea id="summary" name="summary" rows="6" required></textarea>

        <label for="cv">Attach your CV:</label>
        <input type="file" id="cv" name="cv" required>

        <button type="submit">Submit Application</button>
    </form>
</div>
</body>
</html>
