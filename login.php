<?php
// Start session
session_start();

$servername = "localhost";
$username = "222007317";
$password = "kwizera";
$database = "job_search_support_platform";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<a href='index.html' style='position: absolute; top: 10px; left: 10px; color: white;'>Back</a>"; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $admin_query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $admin_result = $conn->query($admin_query);

    $user_query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $user_result = $conn->query($user_query);

    if ($admin_result->num_rows > 0) {
       
        $_SESSION['user_type'] = 'admin';
        $_SESSION['email'] = $email;
        
        header("Location: index3.html");
        exit();
    } elseif ($user_result->num_rows > 0) {
       
        $_SESSION['user_type'] = 'user';
        $_SESSION['email'] = $email;
        
        header("Location: index2.html");
        exit();
    } else {
        
        echo "Invalid email or password";
    }
}
$conn->close();
?>
<html>
<head>
  <style>
      body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: ;
}
 
        .full-screen-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

.login-container {
    width: 300px;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: auto;
}

.form-group {
    margin-bottom: 15px;
}

form {
    text-align: center;
    color: #333;
}

button[type="submit"] {
    background-color: green;
    color: black;
    border: none;
    padding: 10px 20px;
    border-radius: 3px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: green;
}
footer{
  margin-top: 300px;
}

    </style>
</head>
 <link rel="stylesheet" href="style.css">
<body>
    <div class="login-container">
        <center><h1 style="color: black;"><b>LOGIN PAGE</b></h1></center>
        <form action="login.php" class="sign in" method="POST">
            <div class="form-group">
                <label for="email">Username:</label><br>
                <input type="text" id="email" name="email" placeholder="Enter your email" required>
            </div><br>
            <div class="form-group">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required>
            </div><br>
            <div class="form-group">
                <button type="submit" name="sign">Login</button>
            </div>
        </form>
    </div>
     <footer>

    </footer>
</body>
</html>
