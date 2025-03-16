<?php 

include("../config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements for security
    $sql = "SELECT username, passcode, display_picture FROM admin_panel WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row) {
            echo "Entered password: " . $password . "<br>";
            echo "Stored (hashed) password: " . $row['passcode'] . "<br>";
        
            if (password_verify($password, $row['passcode'])) {
                echo "Password is correct!";
            } else {
                echo "Password does not match!";
            }
        }
        
        
        // Verify password (assuming passcode is hashed)
        if (password_verify($password, $row['passcode'])) {
            $_SESSION['admin'] = $row['username'];
            $_SESSION['display_picture'] = $row['display_picture']; // Store the actual picture path
            
            header("Location: index.php");
            exit(); // Always exit after header redirection
        } else {
            echo "<script>alert('Invalid username or password!');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password!');</script>";
    }

    $stmt->close();
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slaylentine | Admin Login</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="admin-form">
    <form action="" method="post">
        <h1 class="syne-custom">Admin Login</h1>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    </div>
</body>
</html>