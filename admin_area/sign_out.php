
<?php

session_start();

session_destroy();

echo "<script>alert('You are now logged out. Please come back soon!')</script>";
echo "<script>window.open('index.php','_self')</script>"


?>