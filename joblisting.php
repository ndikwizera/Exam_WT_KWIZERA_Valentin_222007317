<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Online Job Search Support Platform</title>
    <style>
        h2 {
            color: green;
        }
        h3{
            color: green;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: black;
            background-blend-mode: overlay;
            height: 60vh;
        }
        {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        header {
            background-color: #fbfcfb;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #8b84d2;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            line-height: 70px;
        }
        nav .left-nav li {
            margin-right: 10px;
        }
        nav .right-nav li {
            margin-left: 10px;
        }
        nav a {
            text-decoration: none;
            color: black;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .container {
            padding: 20px;
        }
        .section {
            margin-bottom: 20px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .section h2 {
            margin-top: 0;
        }
        .section button {
            background-color: #191c19;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .section button:hover {
            background-color: #4eb9f7;
        }
    </style>
</head>
<body>

<header>
    <h1>Online Job Search Support Platform!</h1>
    <nav>
        <img class="logo" src="image/mylogo.png" alt="image" width="50" height="50"><br><br>
        <ul class="left-nav">
            <li class="logo-container">
                  
            <li><a href="about.html">About</a></li>
              <li><a href="services.html">Services</a></li>
        </ul>
        <ul class="midle-nav">
               <li><a href="jobseeker.html">Jobseeker</a></li>
            <li><a href="trainee.html">Internship</a></li>
           
        </ul>
        <ul class="right-nav">
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <div id="projects" class="section">
        <h2>Airtel Job Listings</h2>
        <?php
          include('connection.php');

            $sql = "SELECT * FROM job WHERE company_name = 'Airtel'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='job-listing'>";
                    echo "<p>Company Name: " . $row["company_name"]. "<br>Job Title: " . $row["job_title"]. "<br>Description: " . $row["description"]. "</p>";
                    echo "<form action='apply.php' method='GET'>";
                    echo "<input type='hidden' name='company_name' value='" . $row["company_name"] . "'>";
                    echo "<input type='hidden' name='job_title' value='" . $row["job_title"] . "'>";
                    echo "<input type='hidden' name='description' value='" . $row["description"] . "'>";
                    echo "<button type='submit'>Apply</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>
    </div>


    <!-- PHP code to retrieve job listings for MTN -->
    <div class="section">
        <h2>MTN Job Listings</h2>
        <?php
          include('connection.php');

            $sql = "SELECT * FROM job WHERE company_name = 'MTN'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='job-listing'>";
                    echo "<p>Company Name: " . $row["company_name"]. "<br>Job Title: " . $row["job_title"]. "<br>Description: " . $row["description"]. "</p>";
                    echo "<form action='apply.php' method='GET'>";
                    echo "<input type='hidden' name='company_name' value='" . $row["company_name"] . "'>";
                    echo "<input type='hidden' name='job_title' value='" . $row["job_title"] . "'>";
                    echo "<input type='hidden' name='description' value='" . $row["description"] . "'>";
                    echo "<button type='submit'>Apply</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>
    </div>
     <div class="section">
        <h3>Akagera Business Group</h3>
        <?php
          include('connection.php');

            $sql = "SELECT * FROM job WHERE company_name = 'Akagera Business Group'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='job-listing'>";
                    echo "<p>Company Name: " . $row["company_name"]. "<br>Job Title: " . $row["job_title"]. "<br>Description: " . $row["description"]. "</p>";
                    echo "<form action='apply.php' method='GET'>";
                    echo "<input type='hidden' name='company_name' value='" . $row["company_name"] . "'>";
                    echo "<input type='hidden' name='job_title' value='" . $row["job_title"] . "'>";
                    echo "<input type='hidden' name='description' value='" . $row["description"] . "'>";
                    echo "<button type='submit'>Apply</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>
    </div>
</div>

</body>
</html>
