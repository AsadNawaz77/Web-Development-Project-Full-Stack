<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $textarea = $_GET['textarea'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Ecommerce";
    $conn = mysqli_connect($servername, $username, $password, $database);


    // Create Table 
    // $sql = "CREATE TABLE IF NOT EXISTS contact (
    //         SID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //         name VARCHAR(50) NOT NULL,
    //         email VARCHAR(50) NOT NULL,
    //         textarea VARCHAR (100) NOT NULL
    //     )";
    // $result = mysqli_query($conn, $sql);
    // if (!$result) {
    //     echo "Error" . mysqli_error($conn);
    // }
    // Insert Value
    $sql = "INSERT INTO contact (name, email, textarea)
                    VALUES ('$name', '$email','$textarea')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: /proj/contact.html");
        exit();
    }
}
?>