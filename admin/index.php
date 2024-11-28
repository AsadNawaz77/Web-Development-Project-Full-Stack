<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: /proj/admin/login.php");
    exit();
}
require '../php/connection.php';
$sql = "SELECT C_Name, C_Price, C_Details, C_category, C_Level, C_Picture FROM courses";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Display courses

        $category = 0;
    } else {
        echo "No results found.";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
$LoggedIn = isset($_SESSION['admin']);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/proj/css/admin_styles.css" />

</head>

<body>
    <nav class="navbar bg-body-tertiary fixed-top responsive">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Offcanvas navbar</a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <a href="/proj/index.php">Home</a>
        <a href="/proj/admin/profile.php">Profile</a>
        <a id="darkmode" style="cursor:pointer">DarkMode</a>
        <?php if ($LoggedIn) : ?>
            <a href="/proj/php/admin_logout.php">Logout</a>
            <a href="/proj/admin/index.php">Dashboard</a>
        <?php endif; ?>
    </div>

    <div class="content ">

        <div class="courses">
            <h1 style="text-align: center;">Courses</h1>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                <?php

                if (mysqli_num_rows($result)  > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td data-category="' . $row['C_category'] . '">' . $row['C_Name'] . '</td>';
                        echo '<td>' . $row['C_Level'] . '</td>';
                        echo '<td>' . $row['C_Price'] . '</td>';
                        echo "<td>
                    <form action='/proj/admin/edit.php' method='get' style='display:inline-block;'>
                    <input type='hidden' name='Category' value='" . $row['C_category'] . "'>
                    <input type='submit'  class='btn btn-primary' value='Edit'>
                </form>
                    </td>";
                        echo '</tr>';
                        $category = $row['C_category'];
                    }
                }

                ?>
            </table>
            <?php echo '<button style="margin-left: 100px; margin-top: 30px;" onclick="navigateToCoursePage()" type="button" class="btn btn-primary">Add Course</button>'; ?>

        </div>
        <script>
            function navigateToCoursePage(category) {
                window.location.href = "/proj/admin/add_course.php?category";
            }
            let isDark = true;


            document.getElementById('darkmode').addEventListener('click', function(event) {
                event.preventDefault();
                if (isDark) {
                    document.body.style.backgroundColor = 'white';
                    document.body.style.color = 'black';
                    isDark = false;
                } else {
                    document.body.style.backgroundColor = 'black';
                    document.body.style.color = 'white';
                    isDark = true;
                }

            });
        </script>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>


</html>