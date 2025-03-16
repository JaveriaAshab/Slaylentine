<?php 

include("../config.php"); 
session_start();

$profile_sql = "SELECT display_picture FROM admin_panel WHERE username = '" . $conn->real_escape_string($_SESSION['admin']) . "'";
$profile_result = $conn->query($profile_sql);

if ($profile_result->num_rows > 0) {
    $row = $profile_result->fetch_assoc();
    $profile_picture = htmlspecialchars($row['display_picture']);
} else {
    $profile_picture = "default.jpg";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slaylentine</title>
    <link rel="shortcut icon" href="../images/<?php echo $profile_picture; ?>" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php include("./header.php") ?>
    <main>

    
    <?php include("./footer.php") ?>
    </main>
</body>
</html>