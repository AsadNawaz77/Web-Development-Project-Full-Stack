<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/proj/css/styles.css">

</head>

<body>
    <?php require 'components/navbar.php'  ?>
    <div class="container">
        <h1>Welcome to E School</h1>
        <p id="demo"></p>
        <a href="/proj/courses.php" class="cta-button">Learn More</a>
    </div>
    <script>
        let i = 0;
        let txt = 'Join thousands of learners worldwide'; /* The text */
        let speed = 50; /* The speed/duration of the effect in milliseconds */

        function typeWriter() {
            if (i < txt.length) {
                document.getElementById("demo").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
            }
        }
    </script>
    <div class="container c">
        <h1>Featured Courses</h1>
        <div class=" features courses">
            <div class="first feature-item">
                <img src="/proj/img/cs.jpg" alt="">
                <h4>Computer Science</h4>
                <p style="font-size: 15px;  ">Lorem ipsum dolor
                    sit, amet consectetur
                    adipisicing <br> elit.
                    Vel, harum?
                    Laudantium ipsum dolore magnam <br>
                    ut quidem? Maiores nobis sapiente
                </p>
            </div>
            <div class="second feature-item">
                <img src="/proj/img/ai.jpg" alt="">
                <h4>Artificial Intelligence</h4>
                <p style="font-size: 15px;   ">Lorem ipsum dolor
                    sit, amet consectetur
                    adipisicing <br> elit.
                    Vel, harum?
                    Laudantium ipsum dolore magnam <br>
                    ut quidem? Maiores nobis sapiente
                </p>
            </div>
            <div class="third feature-item">
                <img src="/proj/img/se.jpg" alt="">
                <h4>SoftWare Engineering</h4>
                <p style="font-size: 15px; ">Lorem ipsum dolor
                    sit, amet consectetur
                    adipisicing <br> elit.
                    Vel, harum?
                    Laudantium ipsum dolore magnam <br>
                    ut quidem? Maiores nobis sapiente
                </p>
            </div>
        </div>
        <a href="/proj/courses.php" class="cta-button">View More</a>
    </div>

    <div class="container Benefits">
        <h1 style="padding-left: 50px;">Benefits</h1>
        <div class="beni">
            <div class="top fl">
                <img src="/proj/img/trust.png" alt="" style="width: 50px; height: 50px; border-radius: 40%;">
                <p style="font-size: 15px; text-align: start;  ">Lorem ipsum dolor
                    sit, amet consectetur
                    adipisicing <br> elit.
                    Vel, harum?
                    Laudantium ipsum dolore magnam <br>
                    ut quidem? Maiores nobis sapiente
                </p>
            </div>
            <div class="centre fl">
                <img src="/proj/img/reading-book.png" alt="" style="width: 50px; height: 50px; border-radius: 40%;">
                <p style="font-size: 15px; text-align: start;  ">Lorem ipsum dolor
                    sit, amet consectetur
                    adipisicing <br> elit.
                    Vel, harum?
                    Laudantium ipsum dolore magnam <br>
                    ut quidem? Maiores nobis sapiente
                </p>
            </div>
            <div class="bottom fl">
                <img src="/proj/img/trust.png" alt="" style="width: 50px; height: 50px; border-radius: 40%;">
                <p style="font-size: 15px; text-align: start;  ">Lorem ipsum dolor
                    sit, amet consectetur
                    adipisicing <br> elit.
                    Vel, harum?
                    Laudantium ipsum dolore magnam <br>
                    ut quidem? Maiores nobis sapiente
                </p>
            </div>
        </div>
    </div>
    <div class=" container testimonial">

        <h1>Testimonials</h1>

        <div class="repeat">

            <div class="leftarrow" id="leftarrow" style="align-self: center;">
                <img src="/proj/img/left-chevron.png" style="width: 60px; height: 60px;">
            </div>
            <div class="b">
                <div class="test test1" id="test1">
                    <div class="data">
                        <img src="/proj/img/mubariz-mehdizadeh-t3zrEm88ehc-unsplash.jpg" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; transform: translateY(-50px);">

                        <p style="margin-top: -20px;">Lorem ipsum dolor sit amet consectetur adipisicing <br>elit. Eum
                            blanditiis <br> distinctio odio,
                            quis
                            accusamus enim, eius porro quos minima, non fugit <br>libero neque ex debitis. Beatae veniam
                            modi
                            sequi
                            voluptate.

                        </p>
                    </div>
                    <h3>DOE</h3>
                </div>
                <div class="test test2" id="test2">
                    <div class="data">
                        <img src="/proj/img/christopher-campbell-rDEOVtE7vOs-unsplash.jpg" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; transform: translateY(-50px);">

                        <p style="margin-top: -20px;">Lorem ipsum dolor sit amet consectetur adipisicing <br>elit. Eum
                            blanditiis <br> distinctio odio,
                            quis
                            accusamus enim, eius porro quos minima, non fugit <br>libero neque ex debitis. Beatae veniam
                            modi
                            sequi
                            voluptate.

                        </p>
                    </div>
                    <h3>Elizebeth</h3>
                </div>
                <div class="test test3" id="test3">
                    <div class="data">
                        <img src="/proj/img/jonas-kakaroto-mjRwhvqEC0U-unsplash.jpg" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; transform: translateY(-50px);">

                        <p style="margin-top: -20px;">Lorem ipsum dolor sit amet consectetur adipisicing <br>elit. Eum
                            blanditiis <br> distinctio odio,
                            quis
                            accusamus enim, eius porro quos minima, non fugit <br>libero neque ex debitis. Beatae veniam
                            modi
                            sequi
                            voluptate.

                        </p>
                    </div>
                    <h3>JJ</h3>
                </div>
            </div>
            <div class="rightarrow" id="rightarrow" style="align-self: center;">
                <img src="/proj/img/arrow-right.png" style="width: 60px; height: 60px;">
            </div>
        </div>
        <div class="arr"><img src="/proj/img/left-chevron.png" class="prev" id="prev" style="width: 60px; height: 60px;">
            <img src="/proj/img/arrow-right.png" class="next" id="next" style="width: 60px; height: 60px;">
        </div>
        <script>
            const items = document.querySelectorAll('.b .test');
            const right_arrow = document.getElementById('rightarrow');
            const left_arrow = document.getElementById('leftarrow');
            const prev = document.getElementById('prev');
            const next = document.getElementById('next');
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
                        element.style.display = 'none'; // Hide the element after fading out
                        return;
                    }
                    opacity -= 0.05;
                    element.style.opacity = opacity;
                }, 20); // Adjust the interval for smoother or faster fade
            }


            right_arrow.addEventListener('click', function() {
                if (currentIndex !== (items.length - 1)) {
                    fadeOut(items[currentIndex]);
                    items[currentIndex].style.display = 'none'; // Hide current item
                    currentIndex = currentIndex + 1; // Move to the next item or loop back to the start
                    items[currentIndex].style.display = 'block'; // Show next item
                    fadeIn(items[currentIndex]);
                }
            });

            left_arrow.addEventListener('click', function() {
                if (currentIndex > 0) {
                    fadeOut(items[currentIndex]);
                    items[currentIndex].style.display = 'none'; // Hide current item
                    currentIndex--; // Move to the previous item
                    items[currentIndex].style.display = 'block'; // Show previous item
                    fadeIn(items[currentIndex]);
                }
            });
            next.addEventListener('click', function() {
                if (currentIndex !== (items.length - 1)) {
                    fadeOut(items[currentIndex]);
                    items[currentIndex].style.display = 'none'; // Hide current item
                    currentIndex = currentIndex + 1; // Move to the next item or loop back to the start
                    items[currentIndex].style.display = 'block'; // Show next item
                    fadeIn(items[currentIndex]);
                }
            });

            prev.addEventListener('click', function() {
                if (currentIndex > 0) {
                    fadeOut(items[currentIndex]);
                    items[currentIndex].style.display = 'none'; // Hide current item
                    currentIndex--; // Move to the previous item
                    items[currentIndex].style.display = 'block'; // Show previous item
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