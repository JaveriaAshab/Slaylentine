<?php
include("../config.php");

// Securely fetch the profile picture
$profile_sql = "SELECT display_picture FROM admin_panel WHERE username = '" . $conn->real_escape_string($_SESSION['admin']) . "'";
$profile_result = $conn->query($profile_sql);

if ($profile_result->num_rows > 0) {
    $row = $profile_result->fetch_assoc();
    $profile_picture = htmlspecialchars($row['display_picture']);
} else {
    $profile_picture = "default.jpg"; // Default profile picture
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slaylentine | Admin</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="sidebar">
            <div class="profile">
                <img src="../images/<?php echo $profile_picture; ?>" alt="Profile Picture">
                <h4 class="syne-custom"><?php echo htmlspecialchars($_SESSION['admin']); ?></h4>
            </div>
            <div class="nav-links">
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="dares.php">Dares</a></li>
                <li><a href="dare_result.php">Dare Results</a></li>
                <li><a href="quiz_response.php">Quiz Response</a></li>
                <li><a href="time_capsule.php">Time Capsules</a></li>
                <li><a href="letters.php">Letters</a></li>
                <li><a href="achievements.php">Achievements</a></li>
            </ul>
            <p class="logout">
                <a href="logout.php">Logout &nbsp;&nbsp;<i class="fa-solid fa-right-from-bracket"></i></a>
            </p>
            </div>
        </div>
    </header>
</body>
</html>