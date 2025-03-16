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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $letter = mysqli_real_escape_string($conn, $_POST['letter']);

    if (isset($_POST['id']) && $_POST['id'] != "") {
        $id = intval($_POST['id']);
        $sql = "UPDATE letters SET name='$name', body='$letter' WHERE id=$id";
    } else {
        $sql = "INSERT INTO letters (name, body) VALUES ('$name', '$letter')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Letter saved successfully!'); window.location.href='letters.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$letters = $conn->query("SELECT * FROM letters");

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
        <form method="post">
            <h1 class="syne-custom">Manage Letters</h1>
            <input type="hidden" name="id" id="letter-id">
            <input type="text" name="name" id="letter-name" placeholder="Enter Name" required>
            <textarea name="letter" id="letter-content" placeholder="Write the letter here..." required></textarea>
            <button type="submit">Save Letter</button>
        </form>
        
        <div class="achievements">

        <h1 class="syne-custom">Existing Letters</h1>
        <table>
    <tr>
        <th style="width: 97px;">Name</th>
        <th>Letter</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $letters->fetch_assoc()): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo nl2br(htmlspecialchars($row['body'])); ?></td>
        <td>
            <button onclick="editLetter(
                '<?= $row['id']; ?>', 
                `<?= htmlspecialchars($row['name'], ENT_QUOTES); ?>`, 
                `<?= htmlspecialchars($row['body'], ENT_QUOTES); ?>`
            )">Edit</button>
            <a href="delete_letter.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

        </div>
        </div>

    
    <?php include("./footer.php") ?>
    </main>
    <script>
        function editLetter(id, name, letter) {
            document.getElementById('letter-id').value = id;
            document.getElementById('letter-name').value = name;
            document.getElementById('letter-content').value = letter;
        }
    </script>
</body>
</html>