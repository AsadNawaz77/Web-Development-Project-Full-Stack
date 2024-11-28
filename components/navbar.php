<?php
session_start();
$isLoggedIn = isset($_SESSION['username']); // Assuming you set 'user name' when the user logs in
if (isset($_SESSION['SID'])) {
    $us =  $_SESSION['SID'];
}
?>

<style>
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
</style>

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
            <img id="profile-picture" src="/proj/img/christopher-campbell-rDEOVtE7vOs-unsplash.jpg" alt="Profile Picture">
            <select id="dropdown-menu" onchange="navigateToPage()">
                <option value="" selected disabled></option>
                <option class="option" value="/proj/php/logout.php">Logout</option>
                <option class="option" value="/proj/user/index.php?id=<?php echo $us; ?>">DashBoard</option>
            </select>
            <!-- <a href="/proj/php/logout.php">Logout</a> -->
        <?php else : ?>
            <a href="/proj/login.php">Login</a>
            <a href="/proj/signup.php">SignUp</a>
        <?php endif; ?>
    </div>
</div>
<script>
    function navigateToPage() {
        let selectedPage = document.getElementById("dropdown-menu").value;
        if (selectedPage) {
            window.location.href = selectedPage;
        }
    }
    const menuIcon = document.getElementById('menu-icon');
    const navLinks = document.querySelector('.nav-links'); // Corrected selector

    menuIcon.addEventListener('click', () => {
        navLinks.classList.toggle('active'); // Toggle the 'active' class on nav links
    });
</script>