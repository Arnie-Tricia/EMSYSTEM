<?php
session_start(); 
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

$notification = '';

if (isset($_SESSION['notification'])) {
    $notification = $_SESSION['notification'];
    unset($_SESSION['notification']); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'] ?? '';


    $sql = '';

    
    if (!empty($password)) {
       
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashedPassword' WHERE id=$id";
        
       
        $_SESSION['notification'] = "The password updated successfully."; 
    } else {
         $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email' WHERE id=$id";

        $_SESSION['notification'] = "The information updated successfully."; 
    }


    if ($sql && $conn->query($sql) === TRUE) {

        header('Location: edit_user.php?id=' . $id);
        exit();
    } else {
       
        $_SESSION['notification'] = "Error updating user: " . $conn->error;
        header('Location: edit_user.php?id=' . $id);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg+xml" href="../logo.webp" />
</head>
<body>

    <h1>Edit User</h1>

    <?php if (!empty($notification)): ?>
        <div class="notification" style="color: green; text-align: center;"><?php echo htmlspecialchars($notification); ?></div>
    <?php endif; ?>

    <form method="post" onsubmit="return confirmEdit()">
        <label>First Name:</label>
        <input type="text" name="firstname" minlength="1" maxlength="20" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>
        <label>Last Name:</label>
        <input type="text" name="lastname" minlength="1" maxlength="20" value="<?php echo htmlspecialchars($user['lastname']); ?>" required>
        <label>Username:</label>
        <input type="text" name="username" minlength="1" maxlength="20" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        <label>Email:</label>
        <input type="email" name="email" minlength="1" maxlength="20" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <label>Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter new Password" minlength="1" maxlength="20">
        <label>
            <input type="checkbox" id="showPassword" onclick="showPass()"> <i>Show Password</i>
        </label>
        <div class="buttons">
            <button type="button" onclick="Back()">Back</button>
            <button type="submit">Update User</button>
        </div>
    </form>

    <script>
        function showPass() {
            var password = document.getElementById("password");
            password.type = password.type === "password" ? "text" : "password";
        }

        function Back() {
            window.location.href = 'index.php';
        }

        function confirmEdit() {
            return confirm("Are you sure you want to edit this user?");
        }
    </script>
</body>
</html>
