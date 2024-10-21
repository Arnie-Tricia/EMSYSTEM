<?php

session_start();
$loggedIn = isset($_SESSION['username']);
if (!$loggedIn) {
    header('Location: ../index.php');
    exit();
}

include 'db.php';
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="top">
        <div class="top-left">
            <h2>Users</h2>
            <p>Get to know your customers</p>
        </div>
        <div class="buttons">
            <a href="add_user.php">+ Add User</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="edit-button">Edit</a>
                    <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="delete-button">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>