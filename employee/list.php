<?php

session_start();
$loggedIn = isset($_SESSION['username']);
if (!$loggedIn) {
    header('Location: ../index.php');
    exit();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbName = "emsystem_db";
$empNum;
$tableContents = "";

function generateData()
{
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbName']);
    $retrieveSql = "SELECT * FROM `tbl_employee`";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $result = $conn->query($retrieveSql);

        if ($result->num_rows > 0) {
            $GLOBALS['empNum'] = $result->num_rows;
            while ($row = $result->fetch_assoc()) {
                $GLOBALS['tableContents'] .= '<tr class="tbl-row">
                        <td id="ent-' . $row["empId"] . '">' . $row["empFirstName"] . '</td>
                        <td>' . $row["empSurname"] . '</td>
                        <td>' . $row["empUsername"] . '</td>
                        <td>' . $row["empEmail"] . '</td>
                        <td>
                            <div class="action-btn-container">
                                <button type="button"
                                    class="action-btns btn-edit">Edit</button>
                                <button type="button"
                                    class="action-btns btn-delete">Delete</button>
                            </div>
                        </td>
                    </tr>';
            }
        } else {
            $GLOBALS['empNum'] = 0;
        }
    }
    $conn->close();
};
generateData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="list-style.css" />
    <link rel="icon" type="image/svg+xml" href="../logo.webp" />
    <title>Employees</title>
</head>

<body>
    <main>
        <section class="top-section">
            <div class="top-left">
                <div class="title-top-left">
                    <h1>Employees</h1>
                    <span>
                        <p><?= $empNum ?> employee(s)</p>
                    </span>
                </div>
                <p>See your active workforce and make changes</p>
            </div>
            <div class="top-right">
                <button type="button" id="btn-add-employee">+ Add employee</button>
                <button type="button" onclick="logout()">Logout</button>
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
                    <?= $tableContents; ?>
                </tbody>
            </table>
        </section>
    </main>
    <div class="modal">
        <div class="modal-content" id="edit-modal">
            <h3>Enter new details</h3>
            <hr>
            <form action="./process.php" method="post">
                <div class="edit-form-fields">
                    <input type="hidden" name="editId" id="editId" />
                    <input type="hidden" name="purpose" value="edit">
                    <div class="inline">
                        <label for="editFirstName">First Name</label>
                        <input type="text" name="editFirstName" id="editFirstName"
                            required />
                    </div>
                    <div class="inline">
                        <label for="editLastName">Last Name</label>
                        <input type="text" name="editLastName" id="editLastName"
                            required />
                    </div>
                    <div class="inline">
                        <label for="editUsername">Username</label>
                        <input type="text" name="editUsername" id="editUsername"
                            required />
                    </div>
                    <div class="inline">
                        <label
                            for="editPassword">Password</label>
                        <input type="password" name="editPassword" id="editPassword" />
                    </div>
                    <div class="inline">
                        <label
                            for="editEmail">Email</label>
                        <input type="email" name="editEmail" id="editEmail"
                            required />
                    </div>
                </div>
                <div class="edit-buttons">
                    <button type="reset" id="btn-cancel-edit">Cancel</button>
                    <button type="submit" id="btn-save-changes">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal">
        <div class="modal-content" id="add-modal">
            <h3>Add new employee</h3>
            <hr>
            <form action="./process.php" method="post">
                <input type="hidden" name="purpose" value="add">
                <div class="edit-form-fields">
                    <div class="inline">
                        <label for="addFirstName">First Name</label>
                        <input type="text" name="addFirstName" id="addFirstName"
                            required />
                    </div>
                    <div class="inline">
                        <label for="addLastName">Last Name</label>
                        <input type="text" name="addLastName" id="addLastName"
                            required />
                    </div>
                    <div class="inline">
                        <label for="addUsername">Username</label>
                        <input type="text" name="addUsername" id="addUsername"
                            required />
                    </div>
                    <div class="inline">
                        <label
                            for="addPassword">Password</label>
                        <input type="password" name="addPassword" id="addPassword"
                            required />
                    </div>
                    <div class="inline">
                        <label for="addEmail">Email</label>
                        <input type="email" name="addEmail" id="addEmail"
                            required />
                    </div>
                </div>
                <div class="edit-buttons">
                    <button type="reset" id="btn-cancel-add">Cancel</button>
                    <button type="submit" id="btn-confirm">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal">
        <div class="modal-content" id="delete-modal">
            <div class="d-modal-top">
                <button type="button" class="btn-close"></button>
                <div class="image-container">
                    <img src="./assets/images/danger.svg" alt="danger">
                </div>
                <h3>Are you sure?</h3>
                <p>Are you sure you want to delete this employee's
                    credentials?<br>This action cannot be undone.</p>
            </div>
            <form action="./process.php" method="post">
                <input type="hidden" name="delId" id="delId" />
                <input type="hidden" name="purpose" value="delete">
                <button type="submit" id="btn-confirm-delete">Delete</button>
                <button type="reset" id="btn-cancel-delete">Cancel</button>
            </form>
        </div>
    </div>
    <script src="./script.js" defer></script>
</body>

<script>
    // function logout() {
    //         window.location.href = '../index.php';
    //     }

    function logout() {
        window.location.href = 'logout.php';
    }
</script>

</html>