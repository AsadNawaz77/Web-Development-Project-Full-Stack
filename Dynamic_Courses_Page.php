<?php

require 'php/connection.php';

// Check if a category is provided in the URL
if (isset($_GET['category'])) {
  $category = $_GET['category'];
  // Fetch course information based on the category
  $sql = "SELECT * FROM courses where C_category='$category'";

  $result = mysqli_query($conn, $sql);
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    } else {
      echo "No results found for category: $category";
    }
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else {
  echo "No category selected.";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php echo  '<title>' . $row["C_Name"] . '</title>'; ?>

  <style>
    /* Basic styling for the header and courses */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      /* background-color: #f8f8f8; */
      width: 30%;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      /* border-bottom: 1px solid #ddd; */
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
  </style>
  <link rel="stylesheet" href="/proj/css/styles.css" />
</head>

<body>
  <?php require 'components/navbar.php'  ?>
  <div class="container about">
    <?php echo '<img src="' . $row['C_Picture'] . '" style="width: 400px; height: 400px" />'; ?>
    <div class="main">
      <?php echo  '<h1>' . $row["C_Name"] . '</h1>'; ?>
      <?php echo " <p>" . $row["C_DetailPage_HeadingPara"] . "</p>"; ?>
    </div>
  </div>
  <div class="container us">
    <div class="pic" style="width: 100%">
      <?php echo ' <img src="' . $row["C_Picture"] . '" style="
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 40px 40px 0 0;
          " /> '; ?>
    </div>
    <div class="aboutdata abn" style="padding: 20px 50px; background-color:#0d0d2b">
      <?php echo '<h1 style="text-align: start">' . $row["C_DetailPage_HeroHead"]  . '</h1>'; ?>
      <?php echo ' <p style="text-align: start">' .
        $row["C_DetailPage_HeroPara"] .  '<br /></p>';
      ?>
    </div>
  </div>
  <div class="banner bn" style="min-height: 320px; align-items: center">
    <div class="aleft a">
      <?php echo '<h1 style="font-size: 30px">' . $row["C_DetailPage_BannerLeft_HeadOne"] . '</h1>'; ?>
      <?php echo ' <h2 style="font: 50px">' . $row["C_DetailPage_BannerLeft_HeadTwo"] . '</h2>'; ?>
    </div>
    <div class="acentre a">
      <?php echo '<h1 style="font-size: 30px">' . $row["C_DetailPage_BannerrCentre_HeadOne"] . '</h1>'; ?>
      <?php echo ' <h2 style="font: 50px">' . $row["C_DetailPage_BannerrCentre_HeadTwo"] . '</h2>'; ?>
    </div>
    <div class="aright a">
      <?php echo '<h1 style="font-size: 30px">' . $row["C_DetailPage_BannerrRight_HeadOne"] . '</h1>'; ?>
      <?php echo ' <h2 style="font: 50px">' . $row["C_DetailPage_BannerrRight_HeadTwo"] . '</h2>'; ?>
    </div>
  </div>
  <div class="container">
    <div class="ccontainer">
      <?php echo '<h1 style="font-size: 100px">' . $row["ThirdSec_Head"] . '</h1>'; ?>
      <?php echo '<p style="text-align: center">' .
        $row["ThirdSec_Para"] . '</p>'; ?>
      <button class="bt" onclick="openLink()">Start Learning</button>
      <script>
        function openLink() {
          window.location.href = "/proj/courses.php";
        }
      </script>
    </div>
  </div>
  <div class="container us more" style="
        background: #0d0d2b;
        padding: 0 30px;
        border-radius: 40px;
        margin-bottom: 60px;
      ">
    <div class="aboutdata abo" style="padding: 20px 50px">
      <?php echo '<h1 style="text-align: start">' .
        $row["FourthSec_Head"]
        . '</h1>'; ?>
      <?php echo  '<p style="text-align: start">' .
        $row["FourthSec_Para"] .
        '<button class="bt" onclick="openLink()" style="border: 1px solid black">
          Start Learning
        </button>' . '</p>'; ?>
      <script>
        function openLink() {
          window.location.href = "/proj/courses.php";
        }
      </script>
    </div>
    <div class="pic pi" style="width: 100%">
      <?php echo '<img src="' . $row["C_LastSec_Picture"] . '" style="
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 40px;
          " />'; ?>
    </div>
  </div>
  <?php require 'components/footer.php'  ?>
  <div class="particles"></div>
  <div class="star-background"></div>
  <script type="module" src="/proj/js/script.js"></script>
</body>

</html>