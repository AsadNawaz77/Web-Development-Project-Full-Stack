<?php
session_start();
$LoggedIn = isset($_SESSION['admin']); // Check if the user is logged in

// If the user is already logged in, redirect them to the homepage
if ($LoggedIn) {
    header("Location: /proj/index.php");
    exit();
}

$error = isset($_SESSION["error"]) ? $_SESSION["error"] : "";
unset($_SESSION["error"]); // Clear the error message after displaying it
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;

        }

        body {
            margin: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #000;
        }

        h1 {
            color: #000;
            text-align: center;
            margin: 0;
            margin-bottom: 10px;
        }

        form {
            width: 100%;
            background-color: rgba(255, 255, 255, 1);
            padding: 20px;
            border-radius: 12px;
            z-index: 9999;
            box-shadow: 0px 0px 10px #fff;
        }

        form input {
            width: 100%;
            padding: 12px;
            border: 1px solid black;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        form input:focus {
            outline: none;
            border-color: #394867;
            transition: .3s;
        }

        form label {
            position: relative;
            height: 100%;
            display: block;
        }

        form input[type="submit"] {
            border: none;
            background-color: #394867;
            color: #fff;
        }

        form label span {
            font-size: 10px;
            position: absolute;
            top: -7px;
            left: 20px;
            transition: .3s;
            background-color: #fff;
            padding: 2px;
        }

        label>input:focus+span {
            color: #394867;
            font-size: 12px;
            transition: .3s;
            top: -10px;
        }

        .termofuse {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .termofuse input[type="checkbox"] {
            width: 15px;
            height: 15px;
            margin: 0;
        }

        .termofuse a {
            color: #394867;
            text-decoration: none;
        }

        @property --angle {
            syntax: "<angle>";
            initial-value: 0deg;
            inherits: false;
        }


        @keyframes rotate {
            0% {
                --angle: 0deg;
            }

            100% {
                --angle: 360deg;
            }
        }

        .moving-border {
            width: 400px;
            border: 1px solid black;
            /* height: 300px; */
            position: relative;
            background: #111;
            /* padding: 4px; */
            border-radius: 12px;
            z-index: 9999;
        }

        .moving-border::before,
        .moving-border::after {
            content: "";
            position: absolute;
            inset: -0.2rem;
            z-index: -1;
            background: linear-gradient(var(--angle),
                    #032146, #C3F2FF, #b00);
            animation: rotate 10s linear infinite;
            border-radius: 12px;
        }

        .moving-border::after {
            filter: blur(10px);
        }
    </style>

</head>

<body>

    <div class="moving-border">
        <form action="/proj/php/adminLogin_data.php" method="post" name="myForm">
            <h1>ADMIN LOG IN</h1>

            <label for="username">
                <input type="text" name="username" id="username" required>
                <span>Username</span>
            </label>

            <label for="Pass">
                <input type="password" name="Pass" id="Pass" required>
                <span>PASSWORD</span>
            </label>

            <input type="submit" value="Submit" style="cursor: pointer;" onclick="validateform()">

            <!-- <p style="text-align: center;">Didn't have an account <span><a href="/proj/signup.php">Sign Up</a></span></p> -->
            <?php if ($error) : ?>
                <p style="color: red; text-align:center;"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>

    </div>

    <script>
        function validateForm() {
            let pass = document.forms["myForm"]["Pass"].value;
            let username = document.forms["myForm"]["username"].value;
            const regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=])(?!.*[\W_])(?!.*\d)(?!.*\W_)(?!.*\d_)(?!.*\W\d)[A-Za-z\d@#$%^&+=]{6,}$/;
            if (!username) {
                alert("Name must be filled out");
                return false;
            } else if (!regex.test(username)) {
                alert("Please enter a valid name");
                return false;
            }

            if (!pass) {
                alert("Write The Password")
                return false;
            }

            return true;
        }
    </script>
</body>

</html>