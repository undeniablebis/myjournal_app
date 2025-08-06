<?php
include '../config/config.php';
$id = $_GET['id'];

//Fetch the existing content
$result = $conn->query("SELECT * FROM journal_entries WHERE id = $id");
$entry = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE journal_entries SET title=?, content=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $content, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}



?>


<?php include '../includes/header.php' ?>
<h1>Edit Entry</h1>
<form method="post">
    <label>Title</label>
    <input type="text" name="title" value="<?php echo $entry['title']; ?>" required><br>
    <label>Content</label>
    <textarea name="content" required><?php echo $entry['content']; ?></textarea><br>
    <button type="submit">Save</button>

</form>

<?php include '../includes/footer.php' ?>