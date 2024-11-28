<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /proj/login.php");
    exit();
}

require 'php/connection.php';
$sql = "SELECT C_Name, C_Price, C_Details, C_category, C_Level, C_Picture FROM courses";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Display courses
    } else {
        echo "No results found.";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
$us =  $_SESSION['username'];

$sq = "SELECT SID from users where username='$us'";

$r = mysqli_query($conn, $sq);


if ($r) {
    // Fetch the row as an associative array

    if (mysqli_num_rows($r) > 0) {
        $ro = mysqli_fetch_assoc($r);
        // Access the SID column from the fetched row
        $us = $ro['SID'];
    }
} else {
    // Handle query execution error
    echo "Error executing query: " . mysqli_error($conn);
}


$isLoggedIn = true; // Since the user is logged in on this page
if (isset($_GET['course'])) {
    $course = $_GET['course'];
    echo '<script>alert("Course \'' . $course . '\' added to cart successfully!");</script>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="/proj/css/styles.css">
    <style>
        /* Basic styling for the header and courses */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            width: 30%;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header .search-bar {
            display: none;
            flex: 1;
            margin-right: 20px;
        }

        .header input[type="text"] {
            display: flex;
            gap: 10px;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .header .filters {
            display: flex;
            gap: 10px;
        }

        .header .filters select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .course {
            width: 400px;
            border-radius: 40px;
            margin: 10px 0;
            background-color: #0d0d2b;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .course:hover {
            background: linear-gradient(135deg, #e00070, #ff4081);
            box-shadow: 0 0 25px rgba(255, 64, 129, 0.7);
        }

        .a-image {
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .a-image:hover {
            box-shadow: 0 0 25px rgba(255, 64, 129, 0.7);
        }

        .ct:hover {
            background: linear-gradient(135deg, #0d0d2b, #0d0d2b);
            box-shadow: 0 0 25px rgba(24, 20, 60, 0.7);
        }

        .coursee {
            flex-wrap: wrap !important;
            width: 100%;
            margin: auto;
            background-color: inherit;
            flex-direction: row;
        }

        @media screen and (max-width: 1040px) {
            .filters {
                display: none !important;
            }

            .search-bar {
                display: block !important;
            }
        }

        #profile-picture {
            object-fit: cover;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            /* Make the image round */
            margin-right: 10px;
            /* Add some spacing between the image and the dropdown */
        }

        /* Style for the dropdown menu */
        #dropdown-menu {


            /* Adjust padding for the select element */
            background: inherit;
            width: 3px;
            /* Add arrow icon */
            background-size: 20px;
            cursor: pointer;
            /* Change cursor to pointer on hover */
        }

        .option {
            color: inherit;
            text-decoration: none;
            font-weight: 600;
            margin: 0 15px;
            transition: color 0.3s;
            color: #ff4081;
        }

        @media screen and (max-width:354px) {
            .navbar {
                margin: 0;
            }
        }

        .ct {
            border: 1px solid black;
        }
    </style>

</head>

<body>
    <div class="navbar" id="navbar">
        <div class="logo">
            <a href="/index.html" style="font-size: 20px;">E School</a>
        </div>
        <div class="header">
            <div class="search-bar">
                <input type="text" id="search-input" placeholder="Search...">
            </div>
            <div class="filters">
                <select id="category-filter">
                    <option value="">Category</option>
                    <option value="category1">Category 1</option>
                    <option value="category2">Category 2</option>
                    <option value="category3">Category 3</option>
                    <option value="category4">Category 4</option>
                </select>
                <select id="level-filter">
                    <option value="">Level</option>
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <select id="price-filter">
                    <option value="">Price</option>
                    <option value="$40">$40</option>
                    <option value="$70">$70</option>
                    <option value="$80">$80</option>
                    <option value="$100">$100</option>
                </select>
            </div>
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
                <img id="profile-picture" src="/proj/img/christopher-campbell-rDEOVtE7vOs-unsplash.jpg" alt="Profile Picture">
                <select id="dropdown-menu" onchange="navigateToPage()">
                    <option value="" selected disabled></option>
                    <option class="option" value="/proj/php/logout.php">Logout</option>
                    <option class="option" value="/proj/user/index.php?id=<?php echo $ro["SID"]; ?>">DashBoard</option>
                </select>
                </select>
                <!-- <a href="/proj/php/logout.php">Logout</a> -->
            <?php else : ?>
                <a href="/proj/login.php">Login</a>
                <a href="/proj/signup.php">SignUp</a>
            <?php endif; ?>
        </div>

    </div>

    <script>
        const menuIcon = document.getElementById('menu-icon');
        const navLinks = document.querySelector('.nav-links');

        menuIcon.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        function navigateToPage() {
            let selectedPage = document.getElementById("dropdown-menu").value;
            if (selectedPage) {
                window.location.href = selectedPage;
            }
        }
    </script>

    <div class="container about main-courses">
        <div class="main" style="text-align: center;">
            <h1>Courses</h1>
            <p>Join thousands of learners worldwide</p>
        </div>
    </div>

    <div class="container us coursee">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="course" data-category="' . $row['C_category'] . '" data-level="' . $row['C_Level'] . '" data-price="' . $row['C_Price'] . '" onclick="navigateToCoursePage(\'' . $row['C_category'] . '\')">';
            echo ' <div class="img" style="width: 100%; border-radius: 40px 40px 0 0">';
            echo '  <img src="' . $row['C_Picture'] . '" style="width: 100%; border-radius: 40px 40px 0 0">';
            echo '</div>';

            echo '<div class="dat">';
            echo '<h3 id="cs">' . $row["C_Name"] . '</h3>';
            echo ' <p>' . $row["C_Details"] . '</p>';
            echo ' <p>' . $row["C_Price"] . '</p>';
            echo '<button type="button" class="cta-button ct addToCartButton btn btn-primary" 
                data-toggle="modal" data-target="#exampleModal" 
                data-course-name="' . $row["C_Name"] . '" 
                style="cursor: pointer; text-decoration: none; color: white; padding: 10px; width: 90%; margin-bottom: 40px;" 
                id="addToCartButton" onclick="addToCart(event, \'' . $row["C_Name"] . '\', \'' . $ro["SID"] . '\')">
                 Buy Now
               </button>';

            echo '</div>';
            echo '</div>';
        }

        ?>

    </div>

    <script>
        function addToCart(event, courseName, SID) {
            event.stopPropagation(); // Stop event propagation to parent elements

            // Redirect to addToCart.php with courseName and SID
            window.location.href = "/proj/php/addToCart.php?course=" + courseName + "&SID=" + SID;
        }



        // document.querySelectorAll('.addToCartButton').forEach(button => {
        //     button.addEventListener('click', function() {
        //         const courseName = this.getAttribute('data-course-name');
        //         let loggedIn = <?php echo json_encode($isLoggedIn) ?>;
        //         if (!loggedIn) {
        //             window.location.href = '/proj/loginphp';
        //         } else {
        //             // fetch('/proj/add_to_cart.php', {
        //             //         method: 'POST',
        //             //         headers: {
        //             //             'Content-Type': 'application/json'
        //             //         },
        //             //         body: JSON.stringify({
        //             //             courseName: courseName
        //             //         })
        //             //     })
        //             //     .then(response => response.text())
        //             //     .then(responseText => {
        //             //         console.log('Response from PHP:', responseText);
        //             //         // Redirect to add_to_cart.php or update the UI accordingly
        //             //         window.location.href = '/proj/add_to_cart.php';
        //             //     })
        //             //     .catch(error => {
        //             //         console.error('Error:', error);
        //             //     });


        //         }
        //     }); // Add a closing brace here
        // });
        function filterCourses() {
            const categoryFilter = document.getElementById('category-filter').value;
            const levelFilter = document.getElementById('level-filter').value;
            const priceFilter = document.getElementById('price-filter').value;
            const searchQuery = document.getElementById('search-input').value.toLowerCase();

            const courses = document.querySelectorAll('.course');

            courses.forEach(course => {
                const category = course.getAttribute('data-category');
                const level = course.getAttribute('data-level');
                const price = course.getAttribute('data-price');
                const title = course.querySelector('h3').textContent.toLowerCase();

                let isVisible = true;

                if (categoryFilter && category !== categoryFilter) {
                    isVisible = false;
                }

                if (levelFilter && level !== levelFilter) {
                    isVisible = false;
                }

                if (priceFilter && price !== priceFilter) {
                    isVisible = false;
                }

                if (searchQuery && !title.includes(searchQuery)) {
                    isVisible = false;
                }

                course.style.display = isVisible ? '' : 'none';
            });
        }

        function navigateToCoursePage(category) {
            window.location.href = "/proj/Dynamic_Courses_Page.php?category=" + category;
        }
        document.getElementById('category-filter').addEventListener('change', filterCourses);
        document.getElementById('level-filter').addEventListener('change', filterCourses);
        document.getElementById('price-filter').addEventListener('change', filterCourses);
        document.getElementById('search-input').addEventListener('input', filterCourses);
    </script>

    <?php require 'components/footer.php' ?>
    <div class="particles"></div>
    <div class="star-background"></div>
    <script type="module" src="/proj/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>