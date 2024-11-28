<?php
session_start();
session_unset();
session_destroy();

header("Location: /proj/index.php"); // Redirect to the homepage or login page
exit();
?>