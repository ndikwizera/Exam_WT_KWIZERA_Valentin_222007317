<?php
    include('connection.php');
    echo "<div style='text-align: center;'>"; 
    echo "<h1>JOBSEEKERS TABLE</h1>"; 

    $sql = "SELECT * FROM jobseeker";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table style='width: 100%; border-collapse: collapse; margin-top: 20px;' border=1>";
        echo "<tr><th>First_Name</th><th>Last_Name</th><th>Email</th><th>Phone</th><th>Country</th><th>City</th><th>Gender</th><th>Birth_Date</th><th>Biography</th><th>Experience</th><th>Education</th><th>Certificate</th><th>Actions</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["first_name"]."</td>";
            echo "<td>".$row["last_name"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["phone"]."</td>";
            echo "<td>".$row["country"]."</td>";
            echo "<td>".$row["city"]."</td>";
            echo "<td>".$row["gender"]."</td>";
            echo "<td>".$row["birth_date"]."</td>";
            echo "<td>".$row["biography"]."</td>";
            echo "<td>".$row["experience"]."</td>";
            echo "<td>".$row["education"]."</td>";
            echo "<td>".$row["certificate"]."</td>";
            echo "<td>";
            echo "<a href='updatejobseeker.php?id=" . $row["first_name"] . "'>Update</a> ";
            echo "<a href='deletejobseeker.php?id=" . $row["first_name"] . "'>Delete</a>"; 
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found";
    }
    echo "<a href='index3.html' style='position: absolute; top: 10px; right: 10px; color: black;'>Back Page</a>";
    echo "<a href='jobseekerview.php' style='position: absolute; bottom: 10px; right: 10px; color: black;'>Back to Top</a>";
    
    $conn->close();
?>
