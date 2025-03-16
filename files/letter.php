<?php 

include("../config.php"); 
session_start();

$error_msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);

    if (!empty($name)) {
        $stmt = $conn->prepare("SELECT * FROM letters WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['name'] = $name;
            header("location: ./letter/letter.php");
            exit;
        } else {
            $error_msg = "Name not found.";
        }
        
        $stmt->close();
    } else {
        $error_msg = "Please enter a name";
    }

    $conn->close();
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php include("./header.php") ?>
    
    <div class="letters-bg">
        <a href="../index.php">Home</a> / <span>Letters</span>
    </div>

    <div class="letter-form">
        <h1 class="syne-custom">Get your letter</h1>
        <p style="opacity: 0.5; font-weight:500; width: 50%; text-align: center;">If you don't get the letter for your name, come back, refresh the page and then insert your name again. Thank you.</p>
    <form id="nameForm" method="post">
    <input type="text" id="name" name="name" placeholder="Enter your name">
    <button id="submitBtn" type="submit">Submit</button>
    <p id="error-msg"><?php echo htmlspecialchars($error_msg); ?></p>
    </form>
    </div>

    <?php include("./footer.php") ?>
</body>

</html>