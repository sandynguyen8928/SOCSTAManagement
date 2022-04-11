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

        $import = $_POST["import"];
        $myReadfile = fopen($import, 'r') or die('Unable to open file!');

        if ($myReadfile) {
            if ($import == "database/TACohort.csv") {
              $myWritefileTA = fopen('database/TADatabase.csv', 'w');
                while (($line = fgets($myReadfile)) !== false) {
                    $param = explode(",", $line);

                    fwrite($myWritefileTA, $param[0]);
                    fwrite($myWritefileTA, ",");

                    fwrite($myWritefileTA, $param[1]);
                    fwrite($myWritefileTA, ",");

                    fwrite($myWritefileTA, $param[2]);
                    fwrite($myWritefileTA, ",");

                    fwrite($myWritefileTA, $param[14]);
                    fwrite($myWritefileTA, ",");

                    fwrite($myWritefileTA, $param[15]);
                }
            }
            else {
              $myWritefileCourse = fopen('database/CourseDatabase.csv', 'w');
              $line = fgets($myReadfile);
              $str = $line.",Num_TA";
              fwrite($myWritefileCourse, $str);

              while (($line = fgets($myReadfile)) !== false) {

                $param = explode(",", $line);

                $numTA = ceil($param[5] / $param[6]);

                $str = $line.",".$numTA;

                fwrite($myWritefileCourse, $str);
            }
          }
        }
    ?>

<!-- TA Admin Import -->

<div class="allPages">

    <form action="TAadmin_import.php" method="post">

    <h2 class="optionTitle">What do you want to import?</h2>

    <div class="courseFunctionContainer">

        <div class="courseFunction">
            <label for="TACohort.csv" class="TAadminTitle">TA Cohort</label>
            <input type="radio" id="TACohort.csv" value="TACohort.csv" name="import">
        </div>
        <div class="courseFunction">
            <label for="CourseQuota.csv" class="TAadminTitle">Course Quota</label>
            <input type="radio" id="CourseQuota.csv" value="CourseQuota.csv" name="import">
        </div>
    </div>

    <input type="submit" value="Submit" class="submitButton">
    <h2 class="optionTitle">The import has been successful!</h2>
    </form>
</div>
    </body>
</html>