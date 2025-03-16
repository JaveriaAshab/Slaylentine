<?php 

include("../config.php"); 

$spinResult = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT dare_text FROM dares ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $spinResult = $row["dare_text"];
    } else {
        $spinResult = "No dares available. (Bruh, go add some)";
    }

    $user = mysqli_real_escape_string($conn, $_POST['user_name']);
    $spinResult = mysqli_real_escape_string($conn, $spinResult);

    $sql = "INSERT INTO spin_results (user_name, result) VALUES ('$user', '$spinResult')";
    $conn->query($sql);
    $conn->close();

    header('Content-Type: application/json');
    echo json_encode(["result" => $spinResult]);
    exit();
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
    
    <div class="spin-bg">
        <a href="../index.php">Home</a> / <span>Spin the wheel</span>
    </div>

    <form id="spin-form">
    <h1 class="syne-custom">Spin the Wheel & Get Your Dare!</h1>
    <input type="text" id="user_name" name="user_name" placeholder="Enter your name" required>
    <div id="wheel-container">
        <img id="wheel" src="../images/wheel.png" alt="Spin Wheel">
    </div>
    <button type="submit" id="spin-btn">SPIN <i class="fa-solid fa-spinner"></i></button>
    <p id="result"></p>
</form>
<!-- <div class="reload">
<a href="spin.php"><button id="spin-btn">SPIN IT AGAIN <i class="fa-solid fa-spinner"></i></button></a>
</div> -->

<script>
document.getElementById("spin-form").addEventListener("submit", function(event) {
    event.preventDefault();

    let userName = document.getElementById("user_name").value.trim();
    if (!userName) {
        alert("Enter your name first!");
        return;
    }

    let wheel = document.getElementById("wheel");
    let randomDeg = Math.floor(3600 + Math.random() * 360);
    wheel.style.transition = "transform 3s ease-out";
    wheel.style.transform = `rotate(${randomDeg}deg)`;

    let formData = new FormData();
    formData.append("user_name", userName);

    fetch("spin.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) 
    .then(data => {
        let cleanedResult = data.result.replace(/\\/g, ""); 
        setTimeout(() => { 
            document.getElementById("result").innerHTML = "<span>Your dare:</span> " + cleanedResult;
        }, 3000);
    })
    .catch(error => console.error("Error:", error));
});

</script>

    <?php include("./footer.php") ?>
</body>

</html>