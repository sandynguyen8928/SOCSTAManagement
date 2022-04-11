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

    <form action="showHistory.php" method="post">

    <h2 class="optionTitle">How do you want to see the history?</h2>

    <div class="courseFunctionContainer">

        <div class="courseFunction">
            <label for="TA_history" class="TAadminTitle">By TA</label>
            <input type="radio" id="TA_history" value="TA_history" name="history">

            <select id="myTA" value="myTA" name="option[]">
          <?php

            // $history = $_POST["history"];
            $myfile = fopen("database/TADatabase.csv", "r");

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

        </div>
        <div class="courseFunction">
            <label for="Course_history" class="TAadminTitle">By Course</label>
            <input type="radio" id="Course_history" value="Course_history" name="history">

            <select id="myCourse" value="myCourse" name="option[]">
          <?php

            // $history = $_POST["history"];
            $myfile = fopen("database/CourseDatabase.csv", "r");

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
        </div>
    </div>

    <input type="submit" value="Submit" class="submitButton">
    </form>
</div>