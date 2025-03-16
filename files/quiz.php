<?php 

include("../config.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['user_name'];
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];
$q6 = $_POST['q6'];
$q7 = $_POST['q7'];
$q8 = $_POST['q8'];
$q9 = $_POST['q9'];
$q10 = $_POST['q10'];
$q10_2 = $_POST['q10_2'];
$q11 = $_POST['q11'];

$sql = "INSERT INTO quiz_responses (name, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q10_2, q11) 
        VALUES ('$name', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q10_2', '$q11')";

if ($conn->query($sql) === TRUE) {
    header("Location: quiz_response.php?name=" . urlencode($name));
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
    
    <div class="quiz-bg">
        <a href="../index.php">Home</a> / <span>Quiz</span>
    </div>

    <div class="quiz-form">
    <h1 class="syne-custom">How Well Do You Know Me?</h1>
    <form action="./quiz.php" method="POST">
        <div>
        <label>Your Name:</label>
        <input type="text" name="user_name" placeholder="Your name" required><br>
        </div>

        <div>
        <label>1. What's my favorite color?</label><br>
        <input type="radio" name="q1" value="Pink" required> Pink <br>
        <input type="radio" name="q1" value="Blue"> Blue <br>
        <input type="radio" name="q1" value="Black"> Black <br>
        <input type="radio" name="q1" value="Purple"> Purple <br>
        </div>

        <div>
        <label>2. What's my favorite ice cream flavor?</label><br>
        <input type="radio" name="q2" value="Strawberry" required> Strawberry <br>
        <input type="radio" name="q2" value="Chocolate"> Chocolate <br>
        <input type="radio" name="q2" value="Vanilla"> Vanilla <br>
        </div>

        <div>
        <label>3. What's my dream vacation spot?</label><br>
        <input type="radio" name="q3" value="Paris" required> Paris <br>
        <input type="radio" name="q3" value="Maldives"> Maldives <br>
        <input type="radio" name="q3" value="Japan"> Japan <br>
        </div>

        <div>
        <label>4. What's something I always say?</label>
        <input type="text" name="q4" required placeholder="My catch phrase"><br>
        </div>

        <div>
        <label>5. What’s something that happened in my childhood that really affected who I am today?</label>
        <input type="text" name="q5" required placeholder="Childhood memory or trauma"><br>
        </div>

        <div>
        <label>6. If I could change anything about myself, what would it be?</label>
        <input type="text" name="q6" required placeholder="Something Something..."><br>
        </div>

        <div>
        <label>7. What scares me the most about the future?</label>
        <input type="text" name="q7" required placeholder="My anxiety"><br>
        </div>

        <div>
        <label>8. What's my favorite music genre?</label><br>
        <input type="radio" name="q8" value="Noise" required> Noise <br>
        <input type="radio" name="q8" value="Soft"> Soft <br>
        <input type="radio" name="q8" value="Slow"> Slow <br>
        </div>

        <div>
        <label>8. Who's my book crush?</label><br>
        <input type="radio" name="q8" value="Ryle" required> Ryle <br>
        <input type="radio" name="q8" value="Atlas"> Atlas <br>
        <input type="radio" name="q8" value="Kaz"> Kaz <br>
        <input type="radio" name="q8" value="Zade"> Zade <br>
        <input type="radio" name="q8" value="Theo"> Theo <br>
        </div>

        <div>
        <label>9. Name my biggest girl crush</label>
        <input type="text" name="q9" required placeholder="My Wife 🤭"><br>
        </div>

        <div>
        <label>10. What's my ideal type of date?</label>
        <input type="text" name="q10" required placeholder="Me in my romantic era be like..."><br>
        </div>

        <div>
        <label>10.2. What's my ideal type?</label><br>
        <input type="radio" name="q10_2" value="Someone Manly" required> Someone Manly <br>
        <input type="radio" name="q10_2" value="Someone Soft Looking"> Someone Soft Looking <br>
        </div>

        <div>
        <label>11. What's my ideal type pt.2?</label><br>
        <input type="radio" name="q11" value="Beard" required> Beard <br>
        <input type="radio" name="q11" value="Clean shaved"> Clean shaved <br>
        </div>

        <input type="submit" value="Submit">
    </form>
    </div>

    <?php include("./footer.php") ?>
</body>

</html>