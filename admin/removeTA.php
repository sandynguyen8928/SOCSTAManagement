<?php 
    include '../header.php';
?>

<!-- Remove TA from TAadmin_remove.php Form -->
<div class="allPages">
  
  <!-- Same layout as TAadmin_remove.php, go to line 93 for function -->
  <form action="removeTA.php" method="post">

    <!-- Table -->
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

    
  <?php
    // Retrieve data from form
    $course = $_POST["myCourse"];
    $TA = $_POST["myTA"];
    $term = $_POST["myTerm"];
    $year = $_POST["myYear"];
    $myfile = fopen("../databases/TACourseHistory.csv", "r");
    //$myfileCount = fopen("../databases/TACourseHistory.csv", "r");
    $array = array();

    $present = 0;
    $count = 1;
    $numLines = count(file("../databases/TACourseHistory.csv"));

    if ($myfile) {
      while (($line = fgets($myfile)) !== false) {
        $param = explode(",", $line);
        
        // If line corresponds to data retrieved
        if ($param[1] == $course && $param[3] == $TA && $param[0] == "$term $year" ) {
          // Replace line with empty
          $contents = file_get_contents("../databases/TACourseHistory.csv");
          
          if ($count == $numLines) {
            $contents = str_replace("\n".$line,'',$contents);
          }
          else {
            $contents = str_replace($line,'',$contents);
          }
          file_put_contents("../databases/TACourseHistory.csv", $contents);
          $present = 1;
          echo "<h2 class=optionTitle>";
          echo $TA;
          echo " has been successfully removed from ";
          echo $course;
          echo "!</h2>";
          break;
        }
        $count = $count + 1;
      }

      // If we can't find the line info
      if ($present == 0) {
          echo "<h2 class=optionTitle>The TA and Course chosen don't match with our database. Please try again.<h2>";
      }
    }
  ?>
</div>