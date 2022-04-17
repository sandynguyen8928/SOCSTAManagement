<?php 
    include '../header.php';
?>

<!-- TA Admin Add Page -->

<div class="allPages">

  <!-- Form -->
  <form action="addTA.php" method="post">

  <table class="tableAddRemove">

    <!-- Row 1 -->
    <tr><td><h4>TA:</h4></td>
    <td><select name="myTA" id="myTA" value="myTA">
      <?php
      $myfile = fopen("../databases/TADatabase.csv", "r");

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
    </select></td></tr>

    <!-- Row 2 -->
    <td><h4>Course:</h4></td>
    <td><select name="myCourse" id="myCourse" value="myCourse">
      <?php
      $myfile = fopen("../databases/CourseDatabase.csv", "r");

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
    </select></td></tr>

    <!-- Row 3 -->
    <tr><td><h4>Term:</h4></td>
    <td><select name="myTerm" id="myTerm" value="myTerm">
      <option>Term</option>
      <option>Fall September</option>
      <option>Winter January</option>
      <option>Summer May</option>
    </select></tr><tr>
    
    <!-- Row 4 -->
    <td><h4>Year:</h4></td>
    <td><select name="myYear" id="myYear" value="myYear">
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
    </select></td></tr>

    <!-- Row 5 -->
    <tr><td><h4>Day:</h4></td>
    <td><select name="myDay" id="myDay" value="myDay">
      <option>Day</option>
      <option>Monday</option>
      <option>Tuesday</option>
      <option>Wednesday</option>
      <option>Thursday</option>
      <option>Friday</option>
    </select></td></tr>
    
    <!-- Row 5 -->
    <tr><td><h4>Time:</h4></td>
    <td><select name="myTime" id="myTime" value="myTime">
        <option>Time</option>
        <option>8:00AM</option>
        <option>9:00AM</option>
        <option>10:00AM</option>
        <option>11:00AM</option>
        <option>12:00PM</option>
        <option>1:00PM</option>
        <option>2:00PM</option>
        <option>3:00PM</option>
        <option>4:00PM</option>
        <option>5:00PM</option>
    </select></td></tr>
  </table>
  
  <input type="submit" value="Submit" class="submitButton">
  </form>
</div>