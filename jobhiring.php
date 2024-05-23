<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = htmlspecialchars($_POST['names']);
    $job_id = htmlspecialchars($_POST['job_id']);
    $jobseeker_id = htmlspecialchars($_POST['jobseeker_id']);
    $job_title = htmlspecialchars($_POST['jobtitle']);
    $offer_job = htmlspecialchars($_POST['offer_job']);
    $contract_type = htmlspecialchars($_POST['contract_type']);
    $date = htmlspecialchars($_POST['deadline']);
    $country = htmlspecialchars($_POST['country']);
    $city = htmlspecialchars($_POST['city']);

    $sql = "INSERT INTO jobhiring (company_name, job_id, jobseeker_id, job_title, offer_job, contract_type, date, country, city) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $company_name, $job_id, $jobseeker_id, $job_title, $offer_job, $contract_type, $date, $country, $city);


    // Check if job_id exists
    $check_job_sql = "SELECT * FROM job WHERE job_id = ?";
    $check_stmt = $conn->prepare($check_job_sql);
    $check_stmt->bind_param("s", $job_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($stmt->execute()) {
        echo "New record created successfully";
        echo "<a href='index3.html' style='position: absolute; top: 10px; left: 10px; color: black;'>Back</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>