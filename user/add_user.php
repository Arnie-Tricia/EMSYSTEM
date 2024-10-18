<?php

session_start();
$loggedIn = isset($_SESSION['username']);
if (!$loggedIn) {
    header('Location: ../index.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (firstname, lastname, username, password, email) VALUES ('$firstname','$lastname','$username', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add User</h1>
    <form method="post">
         <label>First Name:</label>
        <input type="text" name="firstname" minlength="1" maxlength="20" required>
        <label>Last Name:</label>
        <input type="text" name="lastname" minlength="1" maxlength="20" required>
        <label>Username:</label>
        <input type="text" name="username" minlength="1" maxlength="20" required>
        <label>Email:</label>
        <input type="email" name="email" minlength="1" maxlength="20" required>
        <label>Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter new Password" minlength="1" maxlength="20">
        <label>
            <input type="checkbox" id="showPassword" onclick="showPass()"> <i>Show Password</i>
        </label>
        <div class="buttons">
            <button type="button" onclick="Back()">Back</button>
            <button type="submit">Add User</button>
        </div>
    </form>
</body>

<script>
        function showPass() {
            var password = document.getElementById("password");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }

        function Back() {
            window.location.href = 'index.php';
        }
    </script>
</html>
