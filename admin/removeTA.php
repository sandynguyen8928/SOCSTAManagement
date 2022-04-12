<?php 
    include '../header.php';
?>

<!-- TA Admin Remove -->

<div class="allPages">

    <form action="removeTA.php" method="post">

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

    // $decision = $_POST["remove"];
    $course = $_POST["myCourse"];
    $TA = $_POST["myTA"];

    $myfile = fopen("database/TACourseHistory.csv", "r");
    $array = array();

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
    
    ?>
    
</div>