<?php 
    include '../header.php';
?>

<!-- TA Admin Add Remove -->

<div class="allPages">

    <form action="addTA.php" method="post">

<table class="tableAddRemove">
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

    </select>
      </td>
      </tr>
      <tr><td>
    <h4>Day:</h4>
      </td><td>
    <select name="myDay" id="myDay" value="myDay">
        <option>Day</option>
        <option>Monday</option>
        <option>Tuesday</option>
        <option>Wednesday</option>
        <option>Thursday</option>
        <option>Friday</option>
    </select>
      </td></tr>
      <tr><td>
    <h4>Time:</h4>
      </td><td>
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
      </td></tr></table>

    <input type="submit" value="Submit" class="submitButton">
    </form>
</div>

    <?php
        $TA=$_POST["myTA"];
        $course=$_POST["myCourse"];
        $term=$_POST["myTerm"];
        $year=$_POST["myYear"];
        $day=$_POST["myDay"];
        $time=$_POST["myTime"];
        $TAid="";
        $addline="";

        $myReadFileCourse=fopen("database/CourseDatabase.csv", "r");
        $myReadFileTA=fopen("database/TADatabase.csv", "r");
        $myWriteFile=fopen("database/TACourseHistory.csv", "a");

        if ($myReadFileCourse) {
            while (($line = fgets($myReadFileCourse)) !== false) {
                $param = explode(",", $line);
                if ($param[1] == $course) {
                    $coursename = $param[3];
                }
            }
        }

        if ($myReadFileTA) {
            while (($line = fgets($myReadFileTA)) !== false) {
                $param = explode(",", $line);
                if ($param[1] == $TA) {
                    $TAid = $param[2];
                }
            }
        }

        $addline .= "\n$term $year,$course,$coursename,$TA,$TAid,$day $time";
        fwrite($myWriteFile, $addline);

        echo "<h2 class=optionTitle>";
        echo $TA;
        echo " has been successfully added to ";
        echo $course;
        echo "!</h2>";


    ?>


</div>