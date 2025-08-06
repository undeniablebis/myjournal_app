<?php include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];


    $sql = "INSERT INTO journal_entries (title, content) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt_error;
    }
}
?>

<?php include '../includes/header.php' ?>
<h1>Add new Entry</h1>
<form method="post">
    <label>Title</label>
    <input type="text" name="title" required><br>
    <label>Content</label>
    <textarea name="content" required></textarea><br>
    <button type="submit">Save</button>

</form>