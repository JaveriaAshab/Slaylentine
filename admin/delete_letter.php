<?php 

include("../config.php");
session_start();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM letters WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Letter deleted successfully!'); window.location.href='letters.php';</script>";
    } else {
        echo "<script>alert('Error deleting letter: " . $conn->error . "');</script>";
    }
}

?>