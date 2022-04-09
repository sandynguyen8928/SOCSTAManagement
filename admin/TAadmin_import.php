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

    <?php

        $myWritefile = fopen('TADatabase.csv', 'w') or die('Unable to open files!');

        $import = $_POST["import"];

        $myReadfile = fopen($import, 'r') or die('Unable to open file!');

        if ($myReadfile) {
            while (($line = fgets($myReadfile)) !== false) {

                $param = explode(",", $line);
                fwrite($myWritefile, $param[1]);
                fwrite($myWritefile, "\n");
            }
        }
    ?>

    <!-- TA Admin Import -->

<div class="allPages">
    <h2 class="optionTitle">What do you want to import?</h2>

    <form action="TAadmin_import.php" method="post">

    <div class="courseFunctionContainer">

        <div class="courseFunction">
            <label for="TACohort.csv">TA Cohort</label>
            <input type="radio" id="TACohort.csv" value="TACohort.csv" name="import">

        </div>
        <div class="courseFunction">
            <label for="CourseQuota">Course Quota</label>
            <input type="radio" id="CourseQuota" value="CourseQuota" name="import">
        </div>
    </div>

    <input type="submit" value="Submit">
    </form>
</div>
    </body>
</html>