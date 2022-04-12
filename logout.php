<?php 
    // php files to include 
    include 'header.php';
?>
<?php
    // remove all session variables
    session_unset();
    // direct back to login page logged out
    header("Location:index.php");
?>