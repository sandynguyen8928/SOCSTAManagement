<?php ob_start();?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title> SOCS TA Management </title>
</head>

<!---------------- HEADER --------------> 
<div class="header">
    <h1><a href="/index.php">SOCS TA MANAGEMENT</a></h1>
    <p class="subtitle">McGill | School of Computer Science</p>
</div>

<?php 
    // suppress warnings 
    error_reporting(0);
    
    // include navbar.php
    include 'navbar.php';
?>