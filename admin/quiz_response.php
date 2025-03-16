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

$sql = "SELECT * FROM quiz_responses ORDER BY submitted_at DESC";
$result = $conn->query($sql);

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
    <div class="main-container">
    <h1 class="syne-custom">Quiz Responses</h1>
    <table>
        <tr>
            <th>Name</th>
            <?php for ($i = 1; $i <= 11; $i++): ?>
                <th>Q<?= $i ?></th>
            <?php endfor; ?>
            <th>Submitted At</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <?php for ($i = 1; $i <= 11; $i++): ?>
                    <?php
                    $question = "q" . ($i == 10 ? "10_2" : $i);
                    $user_answer = strtolower(trim($row[$question]));
                    $is_correct = false;

                    if (isset($correct_answers[$question])) {
                        $is_correct = strcasecmp($row[$question], $correct_answers[$question]) == 0;
                    } elseif (isset($correct_text_answers[$question])) {
                        foreach ($correct_text_answers[$question] as $keyword) {
                            if (strpos($user_answer, strtolower($keyword)) !== false) {
                                $is_correct = true;
                                break;
                            }
                        }
                    }
                    ?>
                    <td class="<?= $is_correct ? 'correct' : 'wrong' ?>">
                        <?= htmlspecialchars($row[$question]) ?>
                    </td>
                <?php endfor; ?>
                <td><?= $row['submitted_at'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    </div>
    
    <?php include("./footer.php") ?>
    </main>
</body>
</html>