<?php 

include("../config.php"); 

$achievementMessage = ""; 
$trophyPath = "";
$medalPath = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);

    $sql = "SELECT trophy, medal FROM achievements WHERE user_name = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $trophyPath = $row["trophy"];
        $medalPath = $row["medal"];
    } else {
        $achievementMessage = "No achievements for this name. (Who even are you...?)";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slaylentine</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include("./header.php") ?>
    
    <div class="achievements-bg">
    
        <a href="../index.php">Home</a> / <span>Virtual Gift Box</span>
    </div>

    <div class="achievements-container">
        <div class="achievement-form">
            <h1 class="syne-custom">Check Your Achievements</h1>
            <form method="post">
                <input type="text" name="username" placeholder="Enter your name" required>
                <button type="submit">Get your achievement</button>
            </form>
        </div>

        <div class="achievement-display">
            <?php if (!empty($achievementMessage)) { ?>
                <p><?php echo $achievementMessage; ?></p>
            <?php } else if (!empty($trophyPath) && !empty($medalPath)) { ?>
                <h2 class="syne-custom">Your Achievements</h2>

                <div class="achievements">
                <div class="achievement-item">
                    <img src="<?php echo $trophyPath; ?>" alt="Trophy" class="achievement-img">
                    <a href="<?php echo $trophyPath; ?>" download="Trophy_<?php echo $username; ?>.png">
                        <button class="download-btn">Download Trophy</button>
                    </a>
                </div>

                <div class="achievement-item">
                    <img src="<?php echo $medalPath; ?>" alt="Medal" class="achievement-img">
                    <a href="<?php echo $medalPath; ?>" download="Medal_<?php echo $username; ?>.png">
                        <button class="download-btn">Download Medal</button>
                    </a>
                </div>
                </div>
                

            <?php } ?>
        </div>
    </div>

    <?php include("./footer.php") ?>
</body>

</html>