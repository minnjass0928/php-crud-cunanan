<?php
include "config/db.php";
$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>view students</title>
</head>
<body>

<h2>student list</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>id</th>
        <th>student no</th>
        <th>full name</th>
        <th>branch</th>
        <th>email</th>
        <th>contact</th>
        <th>date added</th>
        <th>actions</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['student_no']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <td><?php echo $row['branch']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['contact']; ?></td>
        <td><?php echo $row['date_added']; ?></td>
        <td>
            <a href="update.php?id=<?php echo $row['id']; ?>">edit</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="create.php">add new student</a>
<br><br>
<a href="index.php">back to homepage</a>

</body>
</html>