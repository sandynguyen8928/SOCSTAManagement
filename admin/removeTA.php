<?php 
    include '../header.php';
?>

<!-- TA Admin Add Remove -->

<div class="allPages">

    <form action="removeTA.php" method="post">

    <table>
  <tr>
    <td>
<h4>TA:</h4>
</td>
<td>
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
        </td>
        </tr>
        <td>
        <h4>Course:</h4>
        </td>
        <td>
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
      </td>
      </tr>
      <tr>
        <td>
    <h4>Term:</h4>
      </td>
      <td>
    <select name="myTerm" id="myTerm" value="myTerm">
    <option>Term</option>
        <option>Fall September</option>
        <option>Winter January</option>
        <option>Summer May</option>
    </select>
      </tr>
      <tr><td>
    <h4>Year:</h4>
      </td><td>
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
      </td></tr>
    </table>

    <input type="submit" value="Submit" class="submitButton">
    </form>

    
    <?php

    // $decision = $_POST["remove"];
    $course = $_POST["myCourse"];
    $TA = $_POST["myTA"];
    $term = $_POST["myTerm"];
    $year = $_POST["myYear"];

    $myfile = fopen("database/TACourseHistory.csv", "r");
    $array = array();

        $present = 0;
        $row = 0;
        if ($myfile) {
          while (($line = fgets($myfile)) !== false) {
            $param = explode(",", $line);
            if ($param[1] == $course && $param[3] == $TA && $param[0] == "$term $year" ) {
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
    
    ?>
    
</div>