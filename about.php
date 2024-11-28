<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About</title>
  <link rel="stylesheet" type="text/css" href="/proj/css/styles.css" />
</head>

<body>
  <?php require 'components/navbar.php'  ?>

  <div class="container about">
    <img src="/proj/img/Learning-cuate.png" style="width: 400px; height: 400px" />
    <div class="main">
      <h1>About US</h1>
      <p>Join thousands of learners worldwide</p>
    </div>
  </div>
  <div class="container us " style="background-color: #0d0d2b;">
    <div class="pic" style="width: 100%">
      <img src="/proj/img/Learning-rafiki.jpg" style="
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 40px 40px 0 0;
          " />
    </div>
    <div class="aboutdata abn" style="padding: 20px 50px">
      <h1 style="text-align: start">Our Galactic Story</h1>
      <p style="text-align: start">
        Welcome to Lumina, the celestial hub of knowledge where we ignite
        minds and illuminate futures through our stellar courses. <br />
        <br />
        Dive into the infinite universe of learning with us and discover the
        boundless possibilities that await you in every corner of our cosmic
        classroom. <br />
        <br />
        Join our constellation of students and let your thirst for knowledge
        be quenched by the brilliance of our expert instructors. <br />
      </p>
    </div>
  </div>
  <div class="banner">
    <div class="aleft a">
      <h1 style="font-size: 100px">100+</h1>
      <h2 style="font: 50px">Courses Offered</h2>
    </div>
    <div class="acentre a">
      <h1 style="font-size: 100px">10K+</h1>
      <h2 style="font: 50px">Happy Students</h2>
    </div>
    <div class="aright a">
      <h1 style="font-size: 100px">5M+</h1>
      <h2 style="font: 50px">
        Knowledge Seekers <br />
        Inspired
      </h2>
    </div>
  </div>

  <div class="container">
    <div class="ccontainer">
      <h1 style="font-size: 100px">Ready to Shine Brighter? Join Us!</h1>
      <p style="text-align: center">
        Embark on a learning adventure like no other and let Lumina guide you
        to the stars of <br />
        knowledge and success.
      </p>
      <button class="bt" onclick="openLink()">Start Learning</button>
      <script>
        function openLink() {
          window.location.href = "/proj/courses.php";
        }
      </script>
    </div>
  </div>
  <div class="container us more" style="background: #0d0d2b; padding: 0 30px; border-radius: 40px">
    <div class="aboutdata abo" style="padding: 20px 50px">
      <h1 style="text-align: start">Unleash Your Potential</h1>
      <p style="text-align: start">
        Welcome to the realm of infinite knowledge and boundless
        possibilities. At our LMS-based website, we don't just sell courses;
        we ignite passions, unlock talents, and transform lives. <br />
        <br />
        Immerse yourself in a universe where learning knows no bounds. Join us
        on a journey where stars align, and dreams take flight. Let's explore,
        discover, and conquer together! <br />
        <br />
        Black background with shining stars? We've got you covered! Our cosmic
        design will transport you to a galaxy of learning like never before.
        Get ready to shine bright like a star in the night sky!<br />
        <button class="bt" onclick="openLink()">Start Learning</button>
        <script>
          function openLink() {
            window.location.href = "/proj/courses.php";
          }
        </script>
      </p>
    </div>
    <div class="pic pi" style="width: 100%">
      <img src="/proj/img/Learning-rafiki.jpg" style="
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 40px;
          " />
    </div>
  </div>
  <div class="container testimonial">
    <h1>Testimonials</h1>

    <div class="repeat">
      <div class="leftarrow" id="leftarrow" style="align-self: center">
        <img src="/proj/img/left-chevron.png" style="width: 60px; height: 60px" />
      </div>
      <div class="b">
        <div class="test test1" id="test1">
          <div class="data">
            <img src="/proj/img/mubariz-mehdizadeh-t3zrEm88ehc-unsplash.jpg" style="
                  width: 100px;
                  height: 100px;
                  border-radius: 50%;
                  object-fit: cover;
                  transform: translateY(-50px);
                " />

            <p style="margin-top: -20px">
              Lorem ipsum dolor sit amet consectetur adipisicing <br />elit.
              Eum blanditiis <br />
              distinctio odio, quis accusamus enim, eius porro quos minima,
              non fugit <br />libero neque ex debitis. Beatae veniam modi
              sequi voluptate.
            </p>
          </div>
          <h3>DOE</h3>
        </div>
        <div class="test test2" id="test2">
          <div class="data">
            <img src="/proj/img/christopher-campbell-rDEOVtE7vOs-unsplash.jpg" style="
                  width: 100px;
                  height: 100px;
                  border-radius: 50%;
                  object-fit: cover;
                  transform: translateY(-50px);
                " />

            <p style="margin-top: -20px">
              Lorem ipsum dolor sit amet consectetur adipisicing <br />elit.
              Eum blanditiis <br />
              distinctio odio, quis accusamus enim, eius porro quos minima,
              non fugit <br />libero neque ex debitis. Beatae veniam modi
              sequi voluptate.
            </p>
          </div>
          <h3>Elizebeth</h3>
        </div>
        <div class="test test3" id="test3">
          <div class="data">
            <img src="/proj/img/jonas-kakaroto-mjRwhvqEC0U-unsplash.jpg" style="
                  width: 100px;
                  height: 100px;
                  border-radius: 50%;
                  object-fit: cover;
                  transform: translateY(-50px);
                " />

            <p style="margin-top: -20px">
              Lorem ipsum dolor sit amet consectetur adipisicing <br />elit.
              Eum blanditiis <br />
              distinctio odio, quis accusamus enim, eius porro quos minima,
              non fugit <br />libero neque ex debitis. Beatae veniam modi
              sequi voluptate.
            </p>
          </div>
          <h3>JJ</h3>
        </div>
      </div>
      <div class="rightarrow" id="rightarrow" style="align-self: center">
        <img src="/proj/img/arrow-right.png" style="width: 60px; height: 60px" />
      </div>
    </div>
    <div class="arr">
      <img src="/proj/img/left-chevron.png" class="prev" id="prev" style="width: 60px; height: 60px" />
      <img src="/proj/img/arrow-right.png" class="next" id="next" style="width: 60px; height: 60px" />
    </div>
    <script>
      const items = document.querySelectorAll(".b .test");
      const right_arrow = document.getElementById("rightarrow");
      const left_arrow = document.getElementById("leftarrow");
      const prev = document.getElementById("prev");
      const next = document.getElementById("next");
      let currentIndex = 0;
      // Function to fade in an element
      function fadeIn(element) {
        let opacity = 0;
        const interval = setInterval(function() {
          if (opacity >= 1) {
            clearInterval(interval);
            return;
          }
          opacity += 0.05;
          element.style.opacity = opacity;
        }, 20); // Adjust the interval for smoother or faster fade
      }

      // Function to fade out an element
      function fadeOut(element) {
        let opacity = 1;
        const interval = setInterval(function() {
          if (opacity <= 0) {
            clearInterval(interval);
            element.style.display = "none"; // Hide the element after fading out
            return;
          }
          opacity -= 0.05;
          element.style.opacity = opacity;
        }, 20); // Adjust the interval for smoother or faster fade
      }

      right_arrow.addEventListener("click", function() {
        if (currentIndex !== items.length - 1) {
          fadeOut(items[currentIndex]);
          items[currentIndex].style.display = "none"; // Hide current item
          currentIndex = currentIndex + 1; // Move to the next item or loop back to the start
          items[currentIndex].style.display = "block"; // Show next item
          fadeIn(items[currentIndex]);
        }
      });

      left_arrow.addEventListener("click", function() {
        if (currentIndex > 0) {
          fadeOut(items[currentIndex]);
          items[currentIndex].style.display = "none"; // Hide current item
          currentIndex--; // Move to the previous item
          items[currentIndex].style.display = "block"; // Show previous item
          fadeIn(items[currentIndex]);
        }
      });
      next.addEventListener("click", function() {
        if (currentIndex !== items.length - 1) {
          fadeOut(items[currentIndex]);
          items[currentIndex].style.display = "none"; // Hide current item
          currentIndex = currentIndex + 1; // Move to the next item or loop back to the start
          items[currentIndex].style.display = "block"; // Show next item
          fadeIn(items[currentIndex]);
        }
      });

      prev.addEventListener("click", function() {
        if (currentIndex > 0) {
          fadeOut(items[currentIndex]);
          items[currentIndex].style.display = "none"; // Hide current item
          currentIndex--; // Move to the previous item
          items[currentIndex].style.display = "block"; // Show previous item
          fadeIn(items[currentIndex]);
        }
      });
    </script>
  </div>
  <?php require 'components/footer.php'  ?>
  <div class="particles"></div>
  <div class="star-background"></div>
  <script type="module" src="/proj/js/script.js"></script>
</body>

</html>