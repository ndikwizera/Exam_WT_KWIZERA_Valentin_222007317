   
    <?php
    include('connection.php');
    echo "<div style='text-align: center;'>"; 
echo "<h1>EMPLOYER TABLE</h1>"; 

    $sql = "SELECT * FROM employer";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo "<table style='width: 100%; border-collapse: collapse; margin-top: 20px;' border=1>";
        echo "<tr><th>company_name</th><th>owner_name</th><th>email</th><th>phone</th><th>certificate</th><th>country</th><th>city</th><th>experience</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["company_name"] . "</td>";
            echo "<td>" . $row["owner_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["certificate"] . "</td>";
            echo "<td>" . $row["country"] . "</td>";
            echo "<td>" . $row["city"] . "</td>";
            echo "<td>" . $row["experience"] . "</td>";
            echo "<td>";
            echo "<a href='updateemployer.php?id=" . $row["company_name"] . "'>Update</a>";
            echo "<a href='deleteemployer.php?id=" . $row["company_name"] . "'>Delete</a>"; 
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    
        echo "<a href='index3.html' style='position: absolute; top: 10px; right: 10px; color: black;'>Back Page</a>";
        echo "<a href='employersveiw.php' style='position: absolute; under: 10px; right: 10px; color: black;'>Back on Top</a>";
    } else {
        echo "No results found";
    }
    
    // Close the database connection
    $conn->close();
    ?>