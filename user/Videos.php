<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /proj/login.php");
    exit();
}
$userId = $_GET['id'];

$LoggedIn = isset($_SESSION['username']);
// require '../php/connection.php';
// $sql = "
//     SELECT 
//         courses.C_Name
//     FROM 
//         cart 
//     INNER JOIN 
//         courses ON cart.course_name = courses.C_Name
//     WHERE 
//         cart.course_name = '$course'
// ";
// $name = "";
// $result = mysqli_query($conn, $sql);
// if (!$result) {
//     echo "Error <br>";
// } else {
//     $num = mysqli_num_rows($result);
//     $row = mysqli_fetch_assoc($result);
//     if ($num > 0) {
//         $name = $row['name'];
//     }
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Video</title>
    <link rel="stylesheet" type="text/css" href="/proj/css/admin_styles.css" />

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            padding: 20px;
            height: 100vh;
            position: fixed;
        }

        .sidebar a,
        .sidebar button {
            display: block;
            color: white;
            padding: 10px 0;
            text-decoration: none;
            cursor: pointer;
        }

        .sidebar button {
            padding: 10px 0;
            background: none;
            border: none;
        }

        .sidebar a:hover,
        .sidebar button:hover {
            background-color: #575757;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
            width: 100%;
        }

        .profile-container {
            max-width: 600px;
            margin: auto;
            border: 1px solid white;
            /* background-color: #f4f4f4; */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 16%;
        }

        .video {
            width: 50%;
            margin: 0 auto;
            text-align: center;
            margin-top: 50px;
            display: none;
        }

        .video video {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <button id="video">Video</button>
        <a id="darkmode" style="cursor:pointer">DarkMode</a>
        <?php if ($LoggedIn) : ?>
            <a href="/proj/php/logout.php">Logout</a>
            <a href="/proj/user/index.php?id=<?php echo $userId; ?>">Dashboard</a>
        <?php endif; ?>
    </div>
    <div class="content">
        <div class="drop video" id="drop">
            <p> Video 1 </p>
            <div class="video1 ">
                <video controls>
                    <source src="/proj/videos/281%20What%20Matters%20In%20This%20Section.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="video2 ">
                <video controls>
                    <source src="/proj/videos/281%20What%20Matters%20In%20This%20Section.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="video3 ">
                <video controls>
                    <source src="/proj/videos/281%20What%20Matters%20In%20This%20Section.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

        <script>
            let isOpen = false;
            let count = 1;
            document.getElementById('video').addEventListener('click', function() {
                if (!isOpen) {

                    document.getElementById('drop').style.display = "block";
                    isOpen = true;
                } else {
                    document.getElementById('drop').style.display = "none";
                    isOpen = false;
                }
            })
            let isDark = true;
            document.getElementById('darkmode').addEventListener('click', function(event) {
                event.preventDefault();
                if (isDark) {
                    document.body.style.backgroundColor = 'white';
                    document.body.style.color = 'black';
                    document.getElementById('darkmode').innerText = "DarkMode";
                    isDark = false;
                } else {
                    document.body.style.backgroundColor = 'black';
                    document.body.style.color = 'white';
                    document.getElementById('darkmode').innerText = "LightMode";
                    isDark = true;
                }

            });
        </script>
    </div>
</body>

</html>