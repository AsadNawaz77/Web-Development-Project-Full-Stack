<?php

session_start();
$isLoggedIn = isset($_SESSION['username']); // Assuming you set 'user_id' when the user logs in
if (!$isLoggedIn) {
    header("Location: /proj/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the JSON data sent by JavaScript
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if ($data && isset($data['courseName'])) {
        $courseName = $data['courseName'];

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "Ecommerce";
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the query
        $sql = "SELECT * FROM courses WHERE C_Name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $courseName);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $courseDetails = mysqli_fetch_assoc($result);
            $_SESSION['cart'][] = $courseDetails; // Add course details to the session
            echo 'Course added to cart successfully';
        } else {
            echo 'Course not found';
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo 'Invalid data';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="/proj/css/styles.css">
</head>

<body>
    <div class="navbar" id="navbar">
        <div class="logo">
            <a href="/proj/index.html" style="font-size: 20px;">E School</a>
        </div>
        <div class="menu-icon" id="menu-icon">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <div class="nav-links">
            <a href="/proj/index.php">Home</a>
            <a href="/proj/about.php">About</a>
            <a href="/proj/courses.php">Courses</a>
            <a href="/proj/contact.php">Contact</a>
            <?php if ($isLoggedIn) : ?>
                <a href="/proj/php/logout.php">Logout</a>
            <?php else : ?>
                <a href="/proj/login.php">Login</a>
                <a href="/proj/signup.php">SignUp</a>
            <?php endif; ?>
        </div>
    </div>
    <script>
        const menuIcon = document.getElementById('menu-icon');
        const navLinks = document.querySelector('.nav-links'); // Corrected selector

        menuIcon.addEventListener('click', () => {
            navLinks.classList.toggle('active'); // Toggle the 'active' class on nav links
        });
    </script>
    <div class="container " style="height: fit-content !important;">
        <h1> Cart </h1>
    </div>
    <div class="container">
        <div class="cart">
            <button>+</button>
                
            <button>-</button>
            <?php
            // Display the cart contents
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $course) {
                    echo '<p>Price: ' . $course['C_Price'] . '  ' . 'Course Name: ' . $course['C_Name'] . '</p>';

                    echo '<hr>';
                }
            } else {
                echo '<p>Your cart is empty.</p>';
            }
            ?>
        </div>
    </div>


    <?php require 'components/footer.php'  ?>
    <div class="particles">
    </div>
    <div class="star-background">
    </div>
    <script type="module" src="/proj/js/script.js">
    </script>
</body>

</html>