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
        $row = mysqli_fetch_assoc($result);
        $Name = $row['C_Name'];
        $Level = $row['C_Level'];
        $Price = $row['C_Price'];
    } else {
        echo "No results found.";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

if (isset($_GET['Category'])) {
    $Category = $_GET['Category'];

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if delete button is clicked
        if (isset($_POST['delete'])) {
            // Delete the record
            $sql = "DELETE FROM `courses` WHERE C_category=$Category";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "Record deleted successfully";
                // Redirect back to the main page after deletion
                header("Location: /proj/admin/index.php");
                exit();
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }
        } else {
            // Update the record
            $n = $_POST['Name'];
            $e = $_POST['Level'];
            $p = $_POST['Price'];

            $sql = "UPDATE `courses` SET C_Name='$n', C_Price='$p', C_Level='$e' WHERE C_category='$Category'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "Record updated successfully";
                // Redirect back to the main page after update
                header("Location: /proj/admin/index.php");
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    }
} else {
    echo "Invalid Category!";
    exit();
}

mysqli_close($conn);

$LoggedIn = isset($_SESSION['admin']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" name="Name" value="<?php echo $Name; ?>">
        <label for="name">Level:</label><br>
        <input type="text" id="Level" name="Level" value="<?php echo $Level; ?>"><br>

        <label for="Price">Price:</label><br>
        <input type="text" id="Price" name="Price" value="<?php echo $Price; ?>"><br>

        <input type="submit" name="update" value="Update" onclick="return confirm('Are you sure you want to update this record?')">
        <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this record?')">
    </form>
</body>

</html>