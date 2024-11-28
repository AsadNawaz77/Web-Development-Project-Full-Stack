<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Ecommerce";
$conn = mysqli_connect($servername, $username, $password, $database);

if (isset($_GET['course'])) {
    // Retrieve the course name from the query parameter
    $courseName = $_GET['course'];

    // Assuming you have a way to identify the user (e.g., session)
    session_start();

    if (isset($_SESSION["username"])) {
        $userId = $_SESSION['SID'];


        // Insert the course into the cart table
        $sql = "INSERT INTO Cart (user_SID, course_name) VALUES ('$userId', '$courseName')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // echo '<script>displayPopup("Course \'' . $courseName . '\' added to cart successfully!");</script>';
            header("Location: /proj/courses.php?course=" . $courseName);
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: User not logged in.";
    }
} else {
    echo "Error: Course name not provided.";
}


mysqli_close($conn);
