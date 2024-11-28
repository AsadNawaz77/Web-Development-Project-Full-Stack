<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <h2>Add Course</h2>

    <form action="../php/add_courses_data.php" method="POST" id="courseForm">
        <label for="C_Name">Course Name (Max 30 characters):</label>
        <input type="text" id="C_Name" name="C_Name" maxlength="30" required><br>

        <label for="C_Price">Price (Max 50 characters):</label>
        <input type="text" id="C_Price" name="C_Price" maxlength="50" required><br>

        <label for="C_Details">Details (Max 200 characters):</label>
        <textarea id="C_Details" name="C_Details" rows="4" maxlength="200" required></textarea><br>

        <label for="C_category">Category (Max 300 characters):</label>
        <input type="text" id="C_category" name="C_category" maxlength="300" required><br>

        <label for="C_Level">Level (Max 300 characters):</label>
        <input type="text" id="C_Level" name="C_Level" maxlength="300" required><br>

        <label for="C_Picture">Picture (Max 400 characters):</label>
        <input type="text" id="C_Picture" name="C_Picture" maxlength="400" required><br>

        <label for="C_DetailPage_HeadingPara">Detail Page Heading Paragraph (Max 1000 characters):</label>
        <textarea id="C_DetailPage_HeadingPara" name="C_DetailPage_HeadingPara" rows="4" maxlength="1000" required></textarea><br>

        <label for="C_DetailPage_HeroHead">Detail Page Hero Head (Max 1000 characters):</label>
        <input type="text" id="C_DetailPage_HeroHead" name="C_DetailPage_HeroHead" maxlength="1000" required><br>

        <label for="C_DetailPage_HeroPara">Detail Page Hero Paragraph (Max 3000 characters):</label>
        <textarea id="C_DetailPage_HeroPara" name="C_DetailPage_HeroPara" rows="4" maxlength="3000" required></textarea><br>

        <label for="C_DetailPage_BannerLeft_HeadOne">Detail Page Banner Left Head One (Max 1000 characters):</label>
        <input type="text" id="C_DetailPage_BannerLeft_HeadOne" name="C_DetailPage_BannerLeft_HeadOne" maxlength="1000" required><br>

        <label for="C_DetailPage_BannerLeft_HeadTwo">Detail Page Banner Left Head Two (Max 1000 characters):</label>
        <input type="text" id="C_DetailPage_BannerLeft_HeadTwo" name="C_DetailPage_BannerLeft_HeadTwo" maxlength="1000" required><br>

        <label for="C_DetailPage_BannerrCentre_HeadOne">Detail Page Banner Centre Head One (Max 1000 characters):</label>
        <input type="text" id="C_DetailPage_BannerrCentre_HeadOne" name="C_DetailPage_BannerrCentre_HeadOne" maxlength="1000" required><br>

        <label for="C_DetailPage_BannerrCentre_HeadTwo">Detail Page Banner Centre Head Two (Max 1000 characters):</label>
        <input type="text" id="C_DetailPage_BannerrCentre_HeadTwo" name="C_DetailPage_BannerrCentre_HeadTwo" maxlength="1000" required><br>

        <label for="C_DetailPage_BannerrRight_HeadOne">Detail Page Banner Right Head One (Max 1000 characters):</label>
        <input type="text" id="C_DetailPage_BannerrRight_HeadOne" name="C_DetailPage_BannerrRight_HeadOne" maxlength="1000" required><br>

        <label for="C_DetailPage_BannerrRight_HeadTwo">Detail Page Banner Right Head Two (Max 1000 characters):</label>
        <input type="text" id="C_DetailPage_BannerrRight_HeadTwo" name="C_DetailPage_BannerrRight_HeadTwo" maxlength="1000" required><br>

        <label for="ThirdSec_Head">Third Section Head (Max 300 characters):</label>
        <input type="text" id="ThirdSec_Head" name="ThirdSec_Head" maxlength="300" required><br>

        <label for="ThirdSec_Para">Third Section Paragraph (Max 500 characters):</label>
        <textarea id="ThirdSec_Para" name="ThirdSec_Para" rows="4" maxlength="500" required></textarea><br>

        <label for="FourthSec_Head">Fourth Section Head (Max 300 characters):</label>
        <input type="text" id="FourthSec_Head" name="FourthSec_Head" maxlength="300" required><br>

        <label for="FourthSec_Para">Fourth Section Paragraph (Max 4000 characters):</label>
        <textarea id="FourthSec_Para" name="FourthSec_Para" rows="4" maxlength="4000" required></textarea><br>

        <label for="C_LastSec_Picture">Last Section Picture (Max 400 characters):</label>
        <input type="text" id="C_LastSec_Picture" name="C_LastSec_Picture" maxlength="400" required><br>

        <input type="submit" value="Submit">
    </form>

    <script>
        document.getElementById('courseForm').addEventListener('submit', function(event) {
            var inputs = this.querySelectorAll('input, textarea');
            var isValid = true;
            inputs.forEach(function(input) {
                var maxLength = input.getAttribute('maxlength');
                if (maxLength && input.value.length > parseInt(maxLength)) {
                    isValid = false;
                    var fieldName = input.getAttribute('name');
                    var errorMessageElement = document.getElementById(fieldName + '-error');
                    errorMessageElement.textContent = 'Maximum ' + maxLength + ' characters allowed.';
                }
            });
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>

</body>

</html>