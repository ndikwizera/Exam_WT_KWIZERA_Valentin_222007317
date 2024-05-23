<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $fname = $conn->real_escape_string($_POST["fname"]);
    $lname = $conn->real_escape_string($_POST["lname"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $country = $conn->real_escape_string($_POST["country"]);
    $city = $conn->real_escape_string($_POST["city"]);
    $gender = $conn->real_escape_string($_POST["gender"]);
    $birth_date = $conn->real_escape_string($_POST["birth_date"]);
    $biography = $conn->real_escape_string($_POST["biography"]);
    $experience = $conn->real_escape_string($_POST["experience"]);
    $education = $conn->real_escape_string($_POST["education"]);
    $certificate = $conn->real_escape_string($_POST["certificate"]);

    $update_sql = "UPDATE jobseeker SET 
        last_name='$lname', email='$email', phone='$phone', country='$country', city='$city', gender='$gender', birth_date='$birth_date', biography='$biography', experience='$experience', education='$education', certificate='$certificate' 
        WHERE first_name='$fname'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href = 'jobseekerveiw.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $select_sql = "SELECT * FROM jobseeker WHERE first_name='$id'";
    $result = $conn->query($select_sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $country = $row['country'];
        $city = $row['city'];
        $gender = $row['gender'];
        $birth_date = $row['birth_date'];
        $biography = $row['biography'];
        $experience = $row['experience'];
        $education = $row['education'];
        $certificate = $row['certificate'];
    } else {
        echo "Jobseeker not found";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Jobseeker</title>
</head>
<body>
    <h1>Update Jobseeker</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required><br><br>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
        <label for="phone">Telephone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required><br><br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo $country; ?>" required><br><br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php echo $city; ?>" required><br><br>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="<?php echo $gender; ?>" required><br><br>
        <label for="birth_date">Birth Date:</label>
        <input type="text" id="birth_date" name="birth_date" value="<?php echo $birth_date; ?>" required><br><br>
        <label for="biography">Biography:</label>
        <input type="text" id="biography" name="biography" value="<?php echo $biography; ?>" required><br><br>
        <label for="experience">Experience:</label>
        <input type="text" id="experience" name="experience" value="<?php echo $experience; ?>" required><br><br>
        <label for="certificate">Certificate:</label>
        <input type="text" id="certificate" name="certificate" value="<?php echo $certificate; ?>" required><br><br>
        
        <button type="submit" name="update">Update</button>
    </form>
    <a href='jobseekerview.php' style='margin-top: 20px; display: block;'>Back</a>
</body>
</html>

<?php $conn->close(); ?>
