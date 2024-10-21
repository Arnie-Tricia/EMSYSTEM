<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "emsystem_db";

function executeQuery ($query) {
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbName']);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($conn->query($query) === TRUE) {
        echo "Successful";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    
    $conn->close();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['purpose'] == "add") {
        $addQuery = "INSERT INTO `tbl_employee` (`empUsername`, `empPassword`) VALUES ('" . $_POST['addUsername'] . "', SHA1('" . $_POST['addPassword'] . "'))";
        executeQuery($addQuery);
    }
    else if ($_POST['purpose'] == "edit") {
        if (isset($_POST['editPassword']) && $_POST['editPassword'] !== "") {
            $editQuery = "UPDATE `tbl_employee` SET `empFirstName`='" . $_POST['editFirstName'] . "', `empSurname`='" . $_POST['editLastName'] . "', `empUsername`='" . $_POST['editUsername'] . "', `empPassword`=SHA1('" . $_POST['editPassword'] . "'), `empEmail`='" . $_POST['editEmail'] . "' WHERE `empId`='" . $_POST['editId'] . "'";
        }
        else {
            $editQuery = "UPDATE `tbl_employee` SET `empFirstName`='" . $_POST['editFirstName'] . "', `empSurname`='" . $_POST['editLastName'] . "', `empUsername`='" . $_POST['editUsername'] . "', `empEmail`='" . $_POST['editEmail'] . "' WHERE `empId`='" . $_POST['editId'] . "'";
        }
        executeQuery($editQuery);
    }
    else if ($_POST['purpose'] == "delete") {
        $delQuery = "DELETE FROM `tbl_employee` WHERE `empId`='" . $_POST['delId'] . "'";
        executeQuery($delQuery);
    }
    header('Location: ./list.php');
}