<?php
session_start();
$isLoggedIn = isset($_SESSION['username']); // Assuming you set 'user_id' when the user logs in
if (isset($_SESSION['SID'])) {
  $us =  $_SESSION['SID'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=" />
  <title>Contact Us Page</title>
  <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap");

    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background: #0c0c27;
    }

    ::-webkit-scrollbar-thumb {
      background: #ff4081;
      border-radius: 6px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #e00070;
    }

    .navbar {
      position: fixed;
      top: 40px;
      /* Added more margin-top */
      left: 20px;
      right: 20px;
      padding: 10px 20px;
      margin: 0 60px;
      display: flex;
      justify-content: space-between;
      font-size: 16px;
      align-items: center;
      transition: background 0.3s, color 0.1s, top 0.3s, left 0.3s, right 0.3s,
        padding 0.3s, margin 0.3s, box-shadow 0.3s;
      z-index: 1000;
    }

    .navbar.sticky {
      background: #0c0c27;
      color: #ff4081;
      top: 0;
      left: 0;
      right: 0;
      margin: 0;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      /* White shadow */
    }

    .navbar a {
      color: inherit;
      /* Use inherit to ensure color change on scroll */
      text-decoration: none;
      font-weight: 600;
      margin: 0 15px;
      transition: color 0.3s;
    }

    .menu-icon {
      display: none;
      /* Initially hide the menu icon */
    }

    @media screen and (max-width: 768px) {
      .menu-icon {
        display: block;
        cursor: pointer;
        /* Show the menu icon on smaller screens */
      }

      .nav-links {
        display: none;
        /* Initially hide the nav links */
      }

      .nav-links.active {
        display: flex;
        /* Show the nav links when menu is active */
        flex-direction: column;
        align-items: center;
        background: #0c0c27;
        position: absolute;
        top: 60px;
        /* Adjust according to your navbar height */
        left: 0;
        width: 100%;
        height: 250px;
      }

      .nav-links.active a {
        margin: 10px 0;
      }

      .line {
        width: 25px;
        height: 3px;
        background: white;
        margin: 5px;
      }
    }

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url(https://images.pexels.com/photos/325185/pexels-photo-325185.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
      background-size: cover;
      background-position: center;
      position: relative;
    }

    body::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.8);
    }

    section {
      position: relative;
      z-index: 3;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .container {
      max-width: 1080px;
      margin-left: auto;
      margin-right: auto;
      padding-left: 20px;
      padding-right: 20px;
    }

    .section-header {
      margin-bottom: 50px;
      text-align: center;
    }

    .section-header h2 {
      color: #fff;
      font-weight: bold;
      font-size: 3em;
      margin-bottom: 20px;
    }

    .section-header p {
      color: #fff;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
    }

    .contact-info {
      width: 50%;
    }

    .contact-info-item {
      display: flex;
      margin-bottom: 30px;
    }

    .contact-info-icon {
      height: 70px;
      width: 70px;
      background-color: #fff;
      text-align: center;
      border-radius: 50%;
    }

    .contact-info-icon i {
      font-size: 30px;
      line-height: 70px;
    }

    .contact-info-content {
      margin-left: 20px;
    }

    .contact-info-content h4 {
      color: #1da9c0;
      font-size: 1.4em;
      margin-bottom: 5px;
    }

    .contact-info-content p {
      color: #fff;
      font-size: 1em;
    }

    .contact-form {
      background-color: #fff;
      padding: 40px;
      width: 45%;
      padding-bottom: 20px;
      padding-top: 20px;
    }

    .contact-form h2 {
      font-weight: bold;
      font-size: 2em;
      margin-bottom: 10px;
      color: #333;
    }

    .contact-form .input-box {
      position: relative;
      width: 100%;
      margin-top: 10px;
    }

    .contact-form .input-box input,
    .contact-form .input-box textarea {
      width: 100%;
      padding: 5px 0;
      font-size: 16px;
      margin: 10px 0;
      border: none;
      border-bottom: 2px solid #333;
      outline: none;
      resize: none;
    }

    .contact-form .input-box span {
      position: absolute;
      left: 0;
      padding: 5px 0;
      font-size: 16px;
      margin: 10px 0;
      pointer-events: none;
      transition: 0.5s;
      color: #666;
    }

    .contact-form .input-box input:focus~span,
    .contact-form .input-box textarea:focus~span {
      color: #e91e63;
      font-size: 12px;
      transform: translateY(-20px);
    }

    .contact-form .input-box input[type="submit"] {
      width: 100%;
      background: #00bcd4;
      color: #fff;
      border: none;
      cursor: pointer;
      padding: 10px;
      font-size: 18px;
      border: 1px solid #00bcd4;
      transition: 0.5s;
    }

    .contact-form .input-box input[type="submit"]:hover {
      background: #fff;
      color: #00bcd4;
    }

    @media (max-width: 991px) {
      section {
        padding-top: 50px;
        padding-bottom: 50px;
      }

      .row {
        flex-direction: column;
      }

      .contact-info {
        margin-bottom: 40px;
        width: 100%;
      }

      .contact-form {
        width: 100%;
      }
    }

    footer {
      padding: 50px 20px;
      display: flex;
      flex-direction: row;
      background: #0c0c27;
      justify-content: space-around;
      height: 23vh;
      position: relative;
      z-index: 2;
    }

    .pages {
      display: flex;
      flex-direction: column;
    }

    .pages a {
      cursor: pointer;
      color: inherit;
      text-decoration: none;
      font-weight: 600;
      /* margin: 0 15px; */
      transition: color 0.3s;
    }

    .page {
      display: flex;
      flex-direction: column;
      gap: 5px;
    }

    .links a {
      cursor: pointer;
    }

    .links img {
      width: 30px;
      height: 30px;
    }

    .link {
      display: flex;
      flex-direction: row;
      gap: 5px;
    }

    .btn {
      padding: 0.9rem 3rem;
    }

    .foot {
      display: contents;
    }

    .arr {
      display: none;
    }

    @media screen and (max-width: 900px) {
      footer {
        flex-direction: column;
        align-items: center;
        height: max-content;
      }

      .links img {
        width: 20px;
        height: 20px;
      }

      .foot {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .Newsletter {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .Newsletter form {
        text-align: center;
      }

      .links,
      .page {
        text-align: center;
      }

      .link {
        gap: 20px;
      }
    }
  </style>

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
        <!-- <img id="profile-picture" src="/proj/img/christopher-campbell-rDEOVtE7vOs-unsplash.jpg" alt="Profile Picture"> -->
        <select id="dropdown-menu" onchange="navigateToPage()">
          <option value="" selected disabled></option>
          <option class="option" value="/proj/php/logout.php">Logout</option>
          <option class="option" value="/proj/user/index.php?id=<?php echo $us; ?>">DashBoard</option>
        </select>
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

  <section>
    <div class="section-header">
      <div class="container">
        <h2>Contact Us</h2>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text
          ever since the 1500s, when an unknown printer took a galley of type
          and scrambled it to make a type specimen book.
        </p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-home"></i>
            </div>

            <div class="contact-info-content">
              <h4>Address</h4>
              <p>
                4671 Sugar Camp Road,<br />
                Owatonna, Minnesota, <br />55060
              </p>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-phone"></i>
            </div>

            <div class="contact-info-content">
              <h4>Phone</h4>
              <p>571-457-2321</p>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-envelope"></i>
            </div>

            <div class="contact-info-content">
              <h4>Email</h4>
              <p>ntamerrwael@mfano.ga</p>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <form action="/proj/php/contact_us.php" id="contact-form" method="get">
            <h2>Send Message</h2>
            <div class="input-box">
              <input type="text" required="true" name="name" />
              <span>Full Name</span>
            </div>

            <div class="input-box">
              <input type="email" required="true" name="email" />
              <span>Email</span>
            </div>

            <div class="input-box">
              <textarea required="true" name="textarea"></textarea>
              <span>Type your Message...</span>
            </div>

            <div class="input-box">
              <input type="submit" value="Send" name="submit" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

</body>

</html>