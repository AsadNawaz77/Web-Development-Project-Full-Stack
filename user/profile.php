<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /proj/login.php");
    exit();
}
$userId = $_GET['id'];

$LoggedIn = isset($_SESSION['username']);
require '../php/connection.php';
$sql = "SELECT * FROM users where SID='$userId' ";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error <br>";
} else {
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($num > 0) {
        $name = $row['name'];
        $pass = $row['Password'];
        $email = $row['email'];
        $Phone = $row['PhoneNo'];

        $id = $row['SID'];
        $username = $row['username'];
        $Phone = $row['PhoneNo'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        .sidebar a {
            display: block;
            color: white;
            padding: 10px 0;
            text-decoration: none;
        }

        .sidebar a:hover {
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

        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-details {
            list-style: none;
            padding: 0;
        }

        .profile-details li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .profile-details li:last-child {
            border-bottom: none;
        }

        .profile-details span {
            font-weight: bold;
        }

        #update {
            display: none;
        }

        #update form input {
            background: none;
            color: white;
            border: none;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="/proj/index.php">Home</a>
        <a href="/proj/user/profile.php?id=<?php echo $userId; ?>">Profile</a>
        <a id="darkmode" style="cursor:pointer">DarkMode</a>
        <?php if ($LoggedIn) : ?>
            <a href="/proj/php/logout.php">Logout</a>
            <a href="/proj/user/index.php?id=<?php echo $userId; ?>">Dashboard</a>
        <?php endif; ?>
    </div>
    <div class="content">
        <div class="profile-container">
            <h2 id="h2">User Profile</h2>
            <ul class="profile-details " id="show">
                <li><span>Name:</span> <?php echo htmlspecialchars($name); ?></li>
                <li><span>Password:</span> <?php echo htmlspecialchars($pass); ?></li>
                <li><span>Email:</span> <?php echo htmlspecialchars($email); ?></li>
                <li><span>Username:</span> <?php echo htmlspecialchars($username); ?></li>
                <li><span>Phone No:</span> <?php echo htmlspecialchars($Phone); ?></li>
                <?php echo '<button style=" margin-top: 30px;" id="edit"  type="button" class="btn btn-primary">Edit</button>'; ?>


                <script>
                    isfalse = false;
                    document.getElementById('edit').addEventListener("click", function() {
                        if (isfalse) {
                            document.getElementById('show').style.display = "block";
                            document.getElementById('update').style.display = "none";
                            isfalse = false;
                        } else {
                            document.getElementById('h2').innerText = "Edit User Profile ";
                            document.getElementById('show').style.display = "none";
                            document.getElementById('update').style.display = "block";
                            isfalse = true;
                        }
                    })
                    let isDark = localStorage.getItem('darkMode')
                    document.getElementById('darkmode').addEventListener('click', function(event) {
                        event.preventDefault();
                        if (isDark) {
                            document.body.style.backgroundColor = 'white';
                            document.body.style.color = 'black';
                            document.getElementById('darkmode').innerText = "DarkMode";
                            isDark = false;
                            localStorage.setItem('darkMode', isDark);
                        } else {
                            document.body.style.backgroundColor = 'black';
                            document.body.style.color = 'white';
                            document.getElementById('darkmode').innerText = "LightMode";
                            isDark = true;
                            localStorage.setItem('darkMode', isDark);
                        }

                    });

                    function navigateToCoursePage() {
                        window.location.href = "/proj/admin/profile.php";
                    }
                </script>
            </ul>
            <ul class="profile-details" id="update">
                <form action="/proj/php/user_update.php" method="post" name="myForm" onsubmit="return validateform()">
                    
                    <div>
                        <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required />
                    </div>
                    <div>
                        <label for="pass">Password:</label>
                        <input type="password" id="pass" name="pass" value="<?php echo $pass; ?>" required />
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required />
                    </div>
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required />
                    </div>
                    <div>
                        <label for="Phone">Phone Number:</label>
                        <input type="text" id="Phone" name="Phone" value="<?php echo $Phone; ?>" required />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <script>
                    function validateform(event) {
                        let name = document.forms["myForm"]["name"].value;
                        let email = document.forms["myForm"]["email"].value;
                        let phone = document.forms["myForm"]["Phone"].value;
                        let pass = document.forms["myForm"]["pass"].value;
                        let username = document.forms["myForm"]["username"].value;
                        const regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{6,}$/;
                        const nameRegex = /^[a-zA-Z]+(?: [a-zA-Z]+)*$/;
                        const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
                        const phoneRegex = /^(03|\+923)\d{9}$/;
                        const pass_regex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@#$%^&+=])(?!.*username)[a-zA-Z\d@#$%^&+=]{6,}$/;



                        if (!name || !nameRegex.test(name)) {
                            alert("Please enter a valid name No number,special char");
                            return false;
                        }

                        if (!username || !regex.test(username)) {
                            alert("Please enter a valid username Atleast 6 letters no special char");
                            return false;
                        }

                        if (!email || !emailRegex.test(email)) {
                            alert("Please enter a valid email abc@gmail.com");
                            return false;
                        }

                        if (!phone || !phoneRegex.test(phone)) {
                            alert("Please enter a valid phone number in the format '03xxxxxxxxxx'");
                            return false;
                        }

                        if (!pass || !pass_regex.test(pass)) {
                            alert("Enter a valid password Atleast 1 uppercase,lowercase,number and special char");
                            return false;
                        }

                        // If all validations pass, return true
                        return true;
                    }
                </script>


                <!-- <?php echo '<button style="margin-left: 100px; margin-top: 30px;" onclick="navigateToCoursePage()" type="button" class="btn btn-primary">Edit</button>'; ?> -->
            </ul>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>