<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $User = $_POST["username"];
    $pass = $_POST["Pass"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Ecommerce";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "SELECT username, Password, SID FROM users WHERE username = '$User'";

    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        if ($pass == $row['Password']) {
            session_start();
            $_SESSION["username"] = $User;
            $_SESSION['SID'] = $row['SID'];
            // echo $_SESSION['SID'];
            // exit();

            // Redirect to homepage
            header("Location: /proj/index.php");
            exit();
        } else {
            // Invalid password
            session_start();
            $_SESSION["error"] = "Invalid Password";
            header("Location: /proj/login.php");
            exit();
        }
    } else {
        // Invalid username
        session_start();
        $_SESSION["error"] = "Invalid Username";
        header("Location: /proj/login.php");
        exit();
    }

    // Close connection
    mysqli_close($conn);
}
