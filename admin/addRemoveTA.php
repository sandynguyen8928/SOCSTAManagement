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


<!-- TA Admin History -->

<div class="allPages">

    <form action="TAadmin_addremove.php" method="post">

    <h2 class="optionTitle">What do you want to do?</h2>

    <div class="courseFunctionContainer">

        <div class="courseFunction">
            <label for="add_TA" class="TAadminTitle">Add a TA</label>
            <input type="radio" id="add_TA" value="add_TA" name="addremove">

        </div>
        <div class="courseFunction">
            <label for="remove_TA" class="TAadminTitle">Remove a TA</label>
            <input type="radio" id="remove_TA" value="remove_TA" name="addremove">
        </div>
</div>

<div class="courseFunctionContainer">
<div class="courseFunction">
    <select name="myTA" id="myTA" value="myTA">
          <?php
          $myfile = fopen("database/TADatabase.csv", "r");

          $array = array();

          if ($myfile) {
            while (($line = fgets($myfile)) !== false) {
              $param = explode(",", $line);
              $array[] = $param[1];
            }
          }
          foreach($array as $name) {
            echo "<option>".$name."</option>";
          }
          ?>
        </select>
        </div>

        <div class="courseFunction">
    <select name="myCourse" id="myCourse" value="myCourse">
        <?php
        $myfile = fopen("database/CourseDatabase.csv", "r");

        $array = array();

        if ($myfile) {
        while (($line = fgets($myfile)) !== false) {
            $param = explode(",", $line);
            $array[] = $param[1];
        }
        }
        foreach($array as $name) {
        echo "<option>".$name."</option>";
        }
        ?>
    </select>
    </div>
    </div>

    <input type="submit" value="Submit" class="submitButton">
    </form>
    
    <?php

    $decision = $_POST["addremove"];
    $course = $_POST["myCourse"];
    $TA = $_POST["myTA"];

    $myfile = fopen("database/TACourseHistory.csv", "r");
    $array = array();

    if ($decision == "add_TA") {
        if ($myfile) {
            $present=0;
          while (($line = fgets($myfile1)) !== false) {
            $param = explode(",", $line);
            if ($param[1] == $name) {
                $array[] = $param[4];
                $present=1;
                break;
            }
          }
          if ($present == 0) {
            $array[] = " ";
          }
        }
    }
    else {
        $present = 0;
        $row = 0;
        if ($myfile) {
          while (($line = fgets($myfile)) !== false) {
            $param = explode(",", $line);
            if ($param[1] == $course && $param[3] == $TA) {
                $contents = file_get_contents("database/TACourseHistory.csv");
                $contents = str_replace($line,'',$contents);
                file_put_contents("database/TACourseHistory.csv", $contents);
                $present = 1;
                echo "<h2 class=optionTitle>";
                echo $TA;
                echo " has been successfully removed from ";
                echo $course;
                echo "!</h2>";
                break;
            }

          }
          if ($present == 0) {
              echo "<h2 class=optionTitle>The TA and Course chosen don't match with our database. Please try again.<h2>";
          }
        }
    }



    ?>
    
</div>