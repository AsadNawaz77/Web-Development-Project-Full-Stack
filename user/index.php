<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /proj/login.php");
    exit();
}


$userId = $_GET['id'];

require '../php/connection.php';
$sql = "
    SELECT 
        courses.C_Name, 
        courses.C_Price, 
        courses.C_Details, 
        courses.C_category, 
        courses.C_Level, 
        courses.C_Picture 
    FROM 
        cart 
    INNER JOIN 
        courses ON cart.course_name = courses.C_Name
    WHERE 
        cart.user_SID = '$userId'
";

$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Display courses

        $category = 0;
    } else {
        echo "";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
$LoggedIn = isset($_SESSION['username']);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/proj/css/admin_styles.css" />
    <link rel="stylesheet" type="text/css" href="/proj/user/styles.css" />
    <style>
        .responsive {
            display: none;
        }

        @media screen and(max-width:700px) {
            .responsive {
                display: block !important;
            }

        }
    </style>
</head>

<body>
    <nav class="navbar bg-body-tertiary fixed-top responsive ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Offcanvas navbar</a> -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                            <a href="/proj/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/proj/admin/profile.php">Profile</a>
                        </li>
                        <li class="nav-item ">
                            <a id="darkmode" style="cursor:pointer">DarkMode</a>
                        </li>
                        <li class="nav-item">
                            <?php if ($LoggedIn) : ?>
                                <a href="/proj/php/admin_logout.php">Logout</a>
                                <a href="/proj/admin/index.php">Dashboard</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="sidebar" id="sidebar" style="@media screen and (max-width: 700px) {
    .sidebar {
        display: none !important;
    }
}
">
        <a href="/proj/index.php">Home</a>
        <a href="/proj/user/profile.php?id=<?php echo $userId; ?>">Profile</a>
        <a id="darkmoe" style="cursor:pointer">DarkMode</a>
        <?php if ($LoggedIn) : ?>
            <a href="/proj/php/logout.php">Logout</a>
            <a href="/proj/user/index.php?id=<?php echo $userId; ?>">Dashboard</a>
        <?php endif; ?>
        <script>
            let isDark = true;
            document.getElementById('darkmoe').addEventListener('click', function(event) {
                event.preventDefault();
                if (isDark) {
                    document.body.style.backgroundColor = 'white';
                    document.body.style.color = 'black';
                    document.getElementById('darkmoe').innerText = "DarkMode";
                    isDark = false;
                } else {
                    document.body.style.backgroundColor = 'black';
                    document.body.style.color = 'white';
                    document.getElementById('darkmoe').innerText = "LightMode";
                    isDark = true;
                }

            });
        </script>
    </div>

    <div class="content ">
        <h1 class="h1" style="text-align: center; margin-top:50px">My Courses</h1>
        <div class="container us coursee" style="background: none; margin-top: 50px;">

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row > 0) {
                    echo '<div style="height:400px" class="course" data-category="' . $row['C_category'] . '" data-level="' . $row['C_Level'] . '" data-price="' . $row['C_Price']  . '" onclick="navigateToCoursePage(\'' . $userId .  '\')">';
                    echo ' <div class="img" style="width: 100%; border-radius: 40px 40px 0 0">';
                    echo '  <img src="' . $row['C_Picture'] . '" style="width: 100%; border-radius: 40px 40px 0 0">';
                    echo '</div>';
                    echo '<div class="dat">';
                    echo '<h3 id="cs" style="margin-top:11%; color:white !important">' . $row["C_Name"] . '</h3>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo "<p> No Course Added</p>";
                }
            }

            ?>
            <script>
                // function navigateToCoursePage(id) {
                //     window.location.href = "/proj/user/Videos.php?id=" + id;
                // }
            </script>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>


</html>