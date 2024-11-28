<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $User = $_POST["username"];
    $pass = $_POST["Pass"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Ecommerce";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "SELECT AdminUserName, Password FROM adminuser WHERE AdminUserName = '$User'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        if ($pass == $row['Password']) {
            session_start();
            $_SESSION["admin"] = $User;
            // $_SESSION['cartCount'] = 0;

            // Redirect to homepage
            header("Location: /proj/admin/index.php");
            exit();
        } else {
            // Invalid password
            session_start();
            $_SESSION["error"] = "Invalid Password";
            header("Location: /proj/admin/login.php");
            exit();
        }
    } else {
        // Invalid username
        session_start();
        $_SESSION["error"] = "Invalid Username";
        header("Location: /proj/admin/login.php");
        exit();
    }

    // Close connection
    mysqli_close($conn);
}
