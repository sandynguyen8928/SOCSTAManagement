<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="../script.js"></script>
    <title> SOCS TA Management </title>
</head>

<body>
    <!---------------- HEADER --------------> 
    <div class="header">
        <h1>SOCS TA MANAGEMENT</h1>
        <p class="subtitle">McGill | School of Computer Science</p>
    </div>

    <!----------------- NAV BAR -------------->
  <div class="nav">
    <div class="navItem" id="rate">
      <p><a href="../rate/index.html" class="navtitle">Rate a TA</a></p>
    </div>

    <div class="navItem" id="manage">
      <p><a href="../manage/index.html" class="navtitle">Manage TA</a></p>
    </div>

    <div class="navItem" id="admin">
      <p><a href="../admin/TAadmin.php" class="navtitle">Administration</a></p>
    </div>

    <div class="navItem" id="sysop">
      <p><a href="../sysop/index.html" class="navtitle">System Operator</a></p>
    </div>

    <div class="navItem" id="logout">
      <p class="navtitle">Logout</p>
    </div>
  </div>

<div class="allPages">
    <h2 class="optionTitle">Select a TA:</h2>

    <form action="showTAhistory.php" method="post">

        <select name="myTA" id="myTA" value="myTA">
          <?php

            $history = $_POST["history"];

            if ($history == "TA_history") {
                $myfile = fopen("database/TADatabase.csv", "r");
            }
            else {
                $myfile = fopen("database/CourseDatabase.csv", "r");
            }

            $array = array();

            if ($myfile) {
                while (($line = fgets($myfile)) !== false) {
                $param = explode(",", $line);
                $array[] = $param[1];
                }
            }
            foreach($array as $option) {
                echo "<option>".$option."</option>";
            }
          ?>
        </select>

    <input type="submit" value="Submit" class="submitButton">
    </form>
</div>