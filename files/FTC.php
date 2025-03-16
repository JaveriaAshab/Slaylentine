<?php 

include("../config.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from = trim($_POST["from"]);
    $to = trim($_POST["to"]);
    $title = trim($_POST["title"]);
    $opening_year = trim($_POST["opening_year"]);
    $message = trim($_POST["message"]);

    // Image Upload Handling
    $upload_dir = "./uploads/"; // Ensure this folder exists and has write permissions
    $image1_path = $upload_dir . basename($_FILES["image1"]["name"]);
    $image2_path = $upload_dir . basename($_FILES["image2"]["name"]);

    // Move uploaded images to the 'uploads' folder
    if (move_uploaded_file($_FILES["image1"]["tmp_name"], $image1_path) && 
        move_uploaded_file($_FILES["image2"]["tmp_name"], $image2_path)) {
        
        $stmt = $conn->prepare("INSERT INTO time_capsule (sender_name, recipient_name, title, opening_year, message, image1, image2) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $from, $to, $title, $opening_year, $message, $image1_path, $image2_path);

        if ($stmt->execute()) {
            echo "Your time capsule has been saved!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error uploading images!";
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php include("./header.php") ?>
    
    <div class="ftc-bg">
        <a href="../index.php">Home</a> / <span>Friendship Time Capsule</span>
    </div>

    <div class="capsule-wrapper">
        <h1 class="syne-custom">Friendship Time Capsule</h1>
    <?php
    $sql = "SELECT sender_name, recipient_name, title, opening_year, message, image1, image2 FROM time_capsule ORDER BY created_at ASC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo '<div class="capsule-container">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="capsule-card">';
            echo '<h2 class="syne-custom">' . htmlspecialchars($row["sender_name"]) . ' <span>to</span> ' . htmlspecialchars($row["recipient_name"]) . '</h2>';
            echo '<div class="capsule-card-content">';
            echo '    <div class="capsule-left">';
            echo '        <img src="' . htmlspecialchars($row["image1"]) . '" alt="Image 1">';
            echo '        <img src="' . htmlspecialchars($row["image2"]) . '" alt="Image 2">';
            echo '    </div>';
            echo '    <div class="capsule-right">';
            echo '        <h3><span>' . htmlspecialchars($row["title"]) . '</span><span>' . htmlspecialchars($row["opening_year"]) . '</span></h3>';
            echo '        <p>' . nl2br(htmlspecialchars($row["message"])) . '</p>';
            echo '    </div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';

    } else {
        echo "<p>No time capsules found.</p>";
    }
    
    ?>
    </div>

    <div class="capsule-form">
        <h1 class="syne-custom">Make your own Time Capsule!</h1>
    <form id="capsuleForm" enctype="multipart/form-data">
    <input type="text" name="from" placeholder="From (Your Name)" required>
    <input type="text" name="to" placeholder="To (Recipient's Name)" required>
    <input type="text" name="title" placeholder="Title of the Message" required>
    <input type="number" name="opening_year" placeholder="Opening Year" required>
    
    <label>Upload First Picture:</label>
    <input type="file" name="image1" accept="image/*" required>
    
    <label>Upload Second Picture:</label>
    <input type="file" name="image2" accept="image/*" required>

    <textarea name="message" placeholder="Write your message..." required></textarea>

    <button type="submit">Submit</button>
    <p id="responseMsg"></p>
</form>
    </div>

<script>
document.getElementById("capsuleForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch("./FTC.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("responseMsg").innerText = data;
        this.reset();
    })
    .catch(error => console.error("Error:", error));
});
</script>

    <?php include("./footer.php") ?>
</body>

</html>