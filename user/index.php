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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="../employee/list-style.css">
    <link rel="icon" type="image/svg+xml" href="../logo.webp" />
</head>

<body>
    <main>
        <section class="top-section">
            <div class="top-left">
                <div class="title-top-left">
                    <h1>Users</h1>
                    <span>
                        <p><?= $result->num_rows ?> user(s)</p>
                    </span>
                </div>
                <p>Get to know your valued customers</p>
            </div>
            <div class="top-right">
                <a href="./add_user.php"><button type="button">+ Add user</button></a>
                <a href="./logout.php"><button type="button">Logout</button></a>
            </div>
        </section>
        <section class="bottom-section">
            <table>
                <thead>
                    <tr class="tbl-row">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="tbl-row">
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <div class="action-btn-container">
                                    <a href="edit_user.php?id=<?php echo $row['id']; ?>"><button type="button"
                                            class="action-btns btn-edit">Edit</button></a>
                                    <a href="delete_user.php?id=<?php echo $row['id']; ?>"><button type="button"
                                            class="action-btns btn-delete">Delete</button></a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tableRow = document.querySelectorAll(".tbl-row");

            tableRow.forEach(element => {
                element.firstElementChild.style.paddingLeft = "20px";
                element.lastElementChild.style.paddingRight = "20px";
            });
        });
    </script>
</body>

</html>