<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: /proj/admin/login.php");
    exit();
}

require '../php/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $adminUser = $_POST['adminUser'];
    $id = $_POST['id'];


    // Update Data
    $sql = "UPDATE adminuser SET Name='$name', Password='$pass', Email='$email', AdminUserName='$adminUser' WHERE ID='$id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        header("Location: /proj/admin/profile.php");
        exit();
    }
}
