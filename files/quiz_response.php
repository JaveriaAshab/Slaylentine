<?php 

include("../config.php"); 

$name = $_GET['name'];

$sql = "SELECT * FROM quiz_responses WHERE name='$name' ORDER BY submitted_at DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $correct_answers = [
        "q1" => "Blue",
        "q2" => "Chocolate",
        "q3" => "Maldives",
        "q8" => "Noise",
        "q10_2" => "Someone Soft Looking",
        "q11" => "Clean shaved"
    ];

    $correct_text_answers = [
        "q4" => ["fr", "ikr", "gurl"],
        "q5" => ["childhood trauma", "family", "bullying", "sister"],
        "q6" => ["height", "color", "smile", "skin"], 
        "q7" => ["future", "family", "failure", "success", "healthy"],
        "q9" => ["Yujin", "Sae Bom"],
        "q10" => ["stargazing", "late night walks", "beach", "baking", "indoor"]
    ];

    $score = 0;

    foreach ($correct_answers as $question => $answer) {
        if (strcasecmp($row[$question], $answer) == 0) { 
            $score++;
        }
    }

    foreach ($correct_text_answers as $question => $keywords) {
        $user_answer = strtolower(trim($row[$question]));
        foreach ($keywords as $keyword) {
            if (strpos($user_answer, $keyword) !== false) {
                $score++;
                break;
            }
        }
    }

    if ($score >= 9) {
        $message = "OMG, are you my long-lost twin?! You know me too well! 💖";
        $image = "happy.gif";
    } elseif ($score >= 6) {
        $message = "Pretty good! You passed the bestie test, but study harder. 😤";
        $image = "soso.gif";
    } elseif ($score >= 4) {
        $message = "You tryna gaslight me into thinking we’re besties? 🤨";
        $image = "gaslight.gif";
    } else {
        $message = "What the sigma?!? 💀 You failed the bestie test.";
        $image = "sigma.gif";
    }
} else {
    $message = "No response found for this name.";
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
    
    <!-- <h2>Hey, !</h2>
    <p></p> -->

    <div class="quiz-response">
        <h1 class="syne-custom">Hey, <span class="syne-custom"><?php echo htmlspecialchars($name); ?></span></h1>
        <p><?php echo $message; ?></p>
        <img src="../images/<?php echo $image; ?>" alt="">
    </div>

    <?php include("./footer.php") ?>
</body>

</html>