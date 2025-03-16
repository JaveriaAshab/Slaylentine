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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_dare'])) {
    $dare_text = mysqli_real_escape_string($conn, $_POST['dare_text']);
    
    if (!empty($dare_text)) {
        $sql = "INSERT INTO dares (dare_text) VALUES ('$dare_text')";
        if ($conn->query($sql) === TRUE) {
            $success = "Dare added successfully!";
        } else {
            $error = "Error: " . $conn->error;
        }
    } else {
        $error = "Dare text cannot be empty!";
    }
}

$dares = $conn->query("SELECT * FROM dares ORDER BY id DESC");

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
    <div class="dare-container">
        <form method="post">
            <h2 class="syne-custom">Add a New Dare</h2>
            <textarea name="dare_text" placeholder="Enter new dare..." required></textarea>
            <button type="submit" name="add_dare">Add Dare</button>
            <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>

        <div class="dares">
        <h1 class="syne-custom">Existing Dares:</h1>
        <ul>
            <?php while ($row = $dares->fetch_assoc()) { ?>
                <li><?php echo htmlspecialchars($row["dare_text"]); ?></li>
            <?php } ?>
        </ul>
        </div>
    </div>
    
    <?php include("./footer.php") ?>
    </main>
</body>
</html>