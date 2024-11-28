<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $Phone = $_POST['Phone'];
    $email = $_POST['Email'];
    $Password = $_POST['Pass'];
    $Username = $_POST['username'];

    // db connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Ecommerce";
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check if username already exists
    $sql = "SELECT * FROM Users WHERE username='$Username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['signup_errors'] = "Username already in use. Please choose another username.";
        
        header("Location: /proj/signup.php");
        exit();
    } else {
        // Insert Value
        $sql = "INSERT INTO Users (name, email, PhoneNo, Password, username)
                    VALUES ('$name', '$email', '$Phone', '$Password', '$Username')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Signup successful!";
            // Redirect to a success page
            header("Location: /proj/login.php");
            exit();
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
}
