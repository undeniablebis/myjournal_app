<?php include '../config/config.php' ?>
<?php include '../includes/header.php' ?>


<h1>My Journal</h1>


<!-- PHP CODE STARTS HERE -->
<?php

$result = $conn->query("SELECT * FROM journal_entries ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()) {
    echo "<h4>{$row['title']}</h4>";
    echo "<p>{$row['content']}</p>";
    echo "<small>{$row['created_at']}</small><br>";
    echo "<a href='edit.php?id={$row['id']}'>Edit</a>";
    echo "<a href='delete.php?id={$row['id']}'>Delete</a>";
}

?>


<!-- PHP CODE ENDS HERE -->

<?php include '../includes/footer.php' ?>