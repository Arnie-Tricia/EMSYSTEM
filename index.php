<?php
session_start();


include './user/db.php'; 

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    if ($userType === 'User') {
       
        $query = "SELECT * FROM users WHERE username = ?";
    } else {
       
        $query = "SELECT * FROM tbl_employee WHERE empUsername = ?";
    }

   
    if ($stmt = $conn->prepare($query)) {
       
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if ($userType === 'User') {
              
                if (password_verify($password, $user['password'])) {
                    $_SESSION['username'] = $username;
                    header("Location: ./user/index.php"); 
                    exit();
                } else {
                    $error = "Invalid username or password. Please try again.";
                }
            } else {
               
                if (SHA1($password) === $user['empPassword']) {
                    $_SESSION['username'] = $username;
                    header("Location: ./employee/list.php"); 
                    exit(); 
                } else {
                    $error = "Invalid username or password. Please try again.";
                }
            }
        } else {
            
            $error = "Invalid username or password. Please try again.";
        }

        $stmt->close();
    } else {
      
        echo "Error preparing query: " . $conn->error;
    }
}
$conn->close();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EM SYSTEM | LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome to</h2>
                    <p>Employee Management<br>System</p>
                </div>
            </div>

            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                  
                    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
                    <form action="index.php" method="POST">
                        <p>
                            <label>Username<span>*</span></label>
                            <input type="text" name="username" class="inputs" placeholder="Enter Your Username" minlength="1" maxlength="20" required>
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" name="password" class="inputs" id="password" placeholder="Enter Your Password" minlength="1" maxlength="20" required>
                        </p>
                         <p>
                            <input type="checkbox" id="showPassword" onclick="showPass()"> Show Password
                        </p>
                        <label>Type<span>*</span></label>
                        <br>
                        <input type="radio" id="user" name="userType" value="User" required>
                        <label for="user">User</label>
                        <input type="radio" id="employee" name="userType" value="Employee" required>
                        <label for="employee">Employee</label>
                        <p>   
                            <input type="submit" name="login" value="Log In">
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        function showPass() {
            var password = document.getElementById("password");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>
</body>

</html>
