<?php
include '../config/config.php';
$id = $_GET['id'];

$sql = "DELETE FROM journal_entries WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}
