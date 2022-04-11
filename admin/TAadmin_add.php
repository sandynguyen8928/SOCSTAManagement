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


<!-- TA Admin Add Remove -->

<div class="allPages">

    <form action="addTA.php" method="post">

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

    <select name="myTerm" id="myTerm" value="myTerm">
    <option>Term</option>
        <option>Fall September</option>
        <option>Winter January</option>
        <option>Summer May</option>
    </select>

    <select name="myYear" id="myYear" value="myYear">
    <option>Year</option>
        <option>2010</option>
        <option>2011</option>
        <option>2012</option>
        <option>2013</option>
        <option>2014</option>
        <option>2015</option>
        <option>2016</option>
        <option>2017</option>
        <option>2018</option>
        <option>2019</option>
        <option>2020</option>
        <option>2021</option>
        <option>2022</option>
        <option>2023</option>
        <option>2024</option>
        <option>2025</option>
        <option>2026</option>
        <option>2027</option>
        <option>2028</option>
        <option>2029</option>
        <option>2030</option>

    </select>
    <select name="myDay" id="myDay" value="myDay">
        <option>Day</option>
        <option>Monday</option>
        <option>Tuesday</option>
        <option>Wednesday</option>
        <option>Thursday</option>
        <option>Friday</option>
    </select>
    <select name="myTime" id="myTime" value="myTime">
        <option>Time</option>
        <option>8:00AM</option>
        <option>8:30AM</option>
        <option>9:00AM</option>
        <option>9:30AM</option>
        <option>10:00AM</option>
        <option>10:30AM</option>
        <option>11:00AM</option>
        <option>11:30AM</option>
        <option>12:00PM</option>
        <option>12:30PM</option>
        <option>1:00PM</option>
        <option>1:30PM</option>
        <option>2:00PM</option>
        <option>2:30PM</option>
        <option>3:00PM</option>
        <option>3:30PM</option>
        <option>4:00PM</option>
        <option>4:30PM</option>
        <option>5:00PM</option>
        <option>5:30PM</option>
        <option>6:00PM</option>
        <option>6:30PM</option>
        <option>7:00PM</option>
        <option>7:30PM</option>
        <option>8:00PM</option>
        <option>8:30PM</option>
    </select>
    </div>
    </div>

    <input type="submit" value="Submit" class="submitButton">
    </form>
</div>