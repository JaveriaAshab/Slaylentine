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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $username = $conn->real_escape_string($_POST["username"]);
    
    $trophyDir = "../images/";
    $medalDir = "../images/";

    $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];

    if ($_FILES["trophy"]["error"] === 0 && in_array($_FILES["trophy"]["type"], $allowedTypes)) {
        $trophyName = time() . "_trophy_" . basename($_FILES["trophy"]["name"]);
        $trophyPath = $trophyDir . $trophyName;
        move_uploaded_file($_FILES["trophy"]["tmp_name"], $trophyPath);
    } else {
        echo "<script>alert('Invalid trophy file. Please upload a valid image.');</script>";
        exit;
    }

    if ($_FILES["medal"]["error"] === 0 && in_array($_FILES["medal"]["type"], $allowedTypes)) {
        $medalName = time() . "_medal_" . basename($_FILES["medal"]["name"]);
        $medalPath = $medalDir . $medalName;
        move_uploaded_file($_FILES["medal"]["tmp_name"], $medalPath);
    } else {
        echo "<script>alert('Invalid medal file. Please upload a valid image.');</script>";
        exit;
    }

    $sql = "INSERT INTO achievements (user_name, trophy, medal) VALUES ('$username', '$trophyPath', '$medalPath')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Achievement added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
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
    <div class="acheivement-form">
    <form method="post" enctype="multipart/form-data">
        <h1 class="syne-custom">Add New Achievement</h1>
        <input type="text" name="username" placeholder="Username" required>
        <label>Add Trophy:</label>
        <input type="file" name="trophy" required>
        <label>Add Medal:</label>
        <input type="file" name="medal" required>
        <button type="submit" name="add">Add</button>
    </form>

    <div class="achievements">
        <h1 class="syne-custom">Achievements</h1>
        <table>
            <tr>
                <th>Username</th>
                <th>Trophy</th>
                <th>Medal</th>
            </tr>
            <?php 
            $sql = "SELECT * FROM achievements";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['user_name']) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($row['trophy']) . "' alt='Trophy'></td>";
                    echo "<td><img src='" . htmlspecialchars($row['medal']) . "' alt='Medal'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No achievements found.</td></tr>";
            }
            ?>
        </table>
    </div>
    </div>
    
    
    <?php include("./footer.php") ?>
    </main>
</body>
</html>