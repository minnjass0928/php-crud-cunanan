<?php
include "config/db.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$row = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $student_no = $_POST['student_no'];
    $fullname = $_POST['fullname'];
    $branch = $_POST['branch'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    mysqli_query($conn, "UPDATE students SET student_no='$student_no', fullname='$fullname', branch='$branch', email='$email', contact='$contact' WHERE id=$id");

    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>update student</title>
</head>
<body>

<h2>update student</h2>

<form method="POST" action="">
    <label>student number:</label><br>
    <input type="text" name="student_no" value="<?php echo $row['student_no']; ?>" required><br><br>

    <label>full name:</label><br>
    <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required><br><br>

    <label>branch:</label><br>
    <select name="branch" required>
        <option <?php if($row['branch']=="manila") echo "selected"; ?>>manila</option>
        <option <?php if($row['branch']=="cebu") echo "selected"; ?>>cebu</option>
        <option <?php if($row['branch']=="davao") echo "selected"; ?>>davao</option>
    </select>
    <br><br>

    <label>email:</label><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    <label>contact:</label><br>
    <input type="text" name="contact" value="<?php echo $row['contact']; ?>"><br><br>

    <button type="submit" name="update">update</button>
</form>

<br>
<a href="read.php">back to list</a>

</body>
</html>