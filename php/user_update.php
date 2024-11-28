<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /proj/login.php");
    exit();
}

require '../php/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $Phone = $_POST['Phone'];
    $id = $_POST['id'];


    // Update Data
    $sql = "UPDATE users SET name='$name', Password='$pass', email='$email', username='$username',PhoneNo='$Phone' WHERE SID='$id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        $_SESSION['username'] = $username;
        header("Location: /proj/user/profile.php?id={$id}");
        exit();
    }
}
