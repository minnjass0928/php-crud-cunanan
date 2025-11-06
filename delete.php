<?php
include "config/db.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$row = mysqli_fetch_assoc($query);

if (isset($_POST['confirm'])) {
    mysqli_query($conn, "DELETE FROM students WHERE id = $id");
    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>delete student</title>
</head>
<body>

<h2>delete student</h2>

<p>are you sure you want to delete:</p>

<p><strong><?php echo $row['fullname']; ?></strong> (<?php echo $row['student_no']; ?>)</p>

<form method="POST">
    <button type="submit" name="confirm">yes, delete</button>
</form>

<br>
<a href="read.php">cancel</a>

</body>
</html>
