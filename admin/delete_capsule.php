<?php 

include("../config.php");
session_start();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM time_capsule WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Capsule Deleted!'); window.location.href='time_capsule.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

?>