<?php 
    include '../header.php';
?>

<!-- TA Admin History Page -->

<div class="allPages">

    <!-- Form -->
    <form action="showHistory.php" method="post">

    <!-- Title -->
    <h2 class="optionTitle">How do you want to see the history?</h2>

    <div class="courseFunctionContainer">

      <!-- Show History by TA -->
      <div class="courseFunction">
        <label for="TA_history" class="importAddTitle">By TA</label>
        <input type="radio" id="TA_history" value="TA_history" name="history">
        <select id="myTA" value="myTA" name="option[]">
          <!-- Display all TA options from TADatabase.csv -->
          <?php

          $myfile = fopen("../databases/TADatabase.csv", "r");

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

      <!-- Show History by Course -->
      <div class="courseFunction">
        <label for="Course_history" class="importAddTitle">By Course</label>
        <input type="radio" id="Course_history" value="Course_history" name="history">
        <select id="myCourse" value="myCourse" name="option[]">
          <!-- Display all Course options from CourseDatabase.csv -->
          <?php
          $myfile = fopen("../databases/CourseDatabase.csv", "r");
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

      <!-- Show All TA History -->
      <div class="courseFunction">
        <label for="allTA_history" class="importAddTitle">All TAs</label>
        <input type="radio" id="allTA_history" value="allTA_history" name="history">
      </div>
    </div>

      <input type="submit" value="Submit" class="submitButton">
    </form>
  </div>