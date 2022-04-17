<?php 
    include '../header.php';
?>

<!-- TA Admin Remove Page-->

<div class="allPages">

  <!-- New form -->
  <form action="removeTA.php" method="post">

    <!-- Table -->
    <table class="tableAddRemove">

      <!-- Row 1 -->
      <tr><td><h4>TA:</h4></td>
      <td><select name="myTA" id="myTA" value="myTA">
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
      </select></td></tr>

      <!-- Row 2 -->
      <td><h4>Course:</h4></td>
      <td><select name="myCourse" id="myCourse" value="myCourse">
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
    </select></td></tr>

    <!-- Row 3 -->
    <tr><td><h4>Term:</h4></td>
    <td><select name="myTerm" id="myTerm" value="myTerm">
    <option>Term</option>
        <option>Fall September</option>
        <option>Winter January</option>
        <option>Summer May</option>
    </select></tr>

    <!-- Row 4 -->
    <tr><td><h4>Year:</h4></td>
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
    </td></tr></table>
    <input type="submit" value="Submit" class="submitButton">
  </form>
</div>