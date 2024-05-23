<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input values
    $company_name = htmlspecialchars($_POST['company_name'] ?? '');
    $employer_id = htmlspecialchars($_POST['employer_id'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $job_title = htmlspecialchars($_POST['job_title'] ?? '');
    $offer_job = htmlspecialchars($_POST['offer_job'] ?? '');
    $contract_type = htmlspecialchars($_POST['contract_type'] ?? '');
    $description = htmlspecialchars($_POST['description'] ?? '');
    $date = htmlspecialchars($_POST['date'] ?? '');
    $time = htmlspecialchars($_POST['time'] ?? '');

    // Validate required fields
    if (empty($company_name) || empty($employer_id) || empty($email) || empty($phone) || empty($job_title) || empty($offer_job) || empty($contract_type) || empty($description) || empty($date) || empty($time)) {
        die("Error: All fields are required.");
    }

    // Check if employer_id exists
    $check_employer_sql = "SELECT * FROM employer WHERE employer_id = ?";
    $check_stmt = $conn->prepare($check_employer_sql);
    $check_stmt->bind_param("s", $employer_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // Employer ID exists, proceed with the insertion
        $sql = "INSERT INTO job (company_name, employer_id, email, phone, job_title, offer_job, contract_type, description, date, time)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssss", $company_name, $employer_id, $email, $phone, $job_title, $offer_job, $contract_type, $description, $date, $time);

        if ($stmt->execute()) {
            echo "New job posted successfully";
             echo "<a href='index3.html' style='position: absolute; top: 10px; left: 10px; color: black;'>Back</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: Employer ID does not exist.";
    }

    $check_stmt->close();
    $conn->close();
}
?>
