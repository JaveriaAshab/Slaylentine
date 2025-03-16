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

$sql = "SELECT * FROM time_capsule ORDER BY created_at ASC";
$result = mysqli_query($conn, $sql);

$edit_mode = false;
$from = $to = $title = $year = $message = '';

if (isset($_GET['edit_id'])) {
    $edit_mode = true;
    $id = intval($_GET['edit_id']);
    
    $result = mysqli_query($conn, "SELECT * FROM time_capsule WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    $from = htmlspecialchars($row['sender_name']);
    $to = htmlspecialchars($row['recipient_name']);
    $title = htmlspecialchars($row['title']);
    $year = $row['opening_year'];
    $message = htmlspecialchars($row['message']);
}

// Handle Add and Update functionality
if (isset($_POST['submit_capsule'])) {
    $from = trim($_POST['from']);
    $to = trim($_POST['to']);
    $title = trim($_POST['title']);
    $year = $_POST['opening_year'];
    $message = mysqli_real_escape_string($conn, trim($_POST["message"]));

    $image1 = $_FILES['image1']['name'] ? "../files/uploads/" . $_FILES['image1']['name'] : null;
    $image2 = $_FILES['image2']['name'] ? "../files/uploads/" . $_FILES['image2']['name'] : null;

    if ($image1) move_uploaded_file($_FILES['image1']['tmp_name'], $image1);
    if ($image2) move_uploaded_file($_FILES['image2']['tmp_name'], $image2);

    if ($edit_mode) {
        $update_query = "UPDATE time_capsule SET 
            sender_name = '$from', 
            recipient_name = '$to', 
            title = '$title', 
            opening_year = '$year', 
            message = '$message'";

        if ($image1) $update_query .= ", image1 = '$image1'";
        if ($image2) $update_query .= ", image2 = '$image2'";

        $update_query .= " WHERE id = $id";
        mysqli_query($conn, $update_query);
    } else {
        $insert_query = "INSERT INTO time_capsule (sender_name, recipient_name, title, opening_year, message, image1, image2) 
            VALUES ('$from', '$to', '$title', '$year', '$message', '$image1', '$image2')";
        mysqli_query($conn, $insert_query);
    }

    echo "<script>window.location.href = 'time_capsule.php';</script>";
}

// Handle Delete functionality
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    mysqli_query($conn, "DELETE FROM time_capsule WHERE id = $id");
    echo "<script>window.location.href = 'time_capsule.php';</script>";
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
    <div class="main-container">
    <div class="acheivement-form">

    <form method="POST" enctype="multipart/form-data">
    <h1 class="syne-custom">Friendship Time Capsule</h1>

    <input type="text" name="from" placeholder="From (Your Name)" value="<?= $from ?>" required>
    <input type="text" name="to" placeholder="To (Recipient's Name)" value="<?= $to ?>" required>
    <input type="text" name="title" placeholder="Title" value="<?= $title ?>" required>
    <input type="number" name="opening_year" placeholder="Opening Year" value="<?= $year ?>" required>

    <label>Image 1:</label>
    <input type="file" name="image1" accept="image/*">
    <label>Image 2:</label>
    <input type="file" name="image2" accept="image/*">

    <textarea name="message" placeholder="Write your message..." required><?= $message ?></textarea>

    <button type="submit" name="submit_capsule">
        <?= $edit_mode ? 'Save Changes' : 'Add Capsule' ?>
    </button>
</form>
    </div>

    <h2>📝 All Time Capsules:</h2>
    <table>
        <tr>
            <th>From</th>
            <th>To</th>
            <th>Title</th>
            <th>Year</th>
            <th>Message</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['sender_name']; ?></td>
            <td><?php echo $row['recipient_name']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['opening_year']; ?></td>
            <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
            <td><img src="<?php echo $row['image1']; ?>" class="img-preview"></td>
            <td><img src="<?php echo $row['image2']; ?>" class="img-preview"></td>
            <td>
            <a href="?edit_id=<?= $row['id'] ?>">Edit</a>
            <a href="?delete_id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
    
    <?php include("./footer.php") ?>
    </main>
</body>
</html>