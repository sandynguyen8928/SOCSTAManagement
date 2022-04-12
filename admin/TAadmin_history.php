<?php 
    include '../header.php';
?>

<div class="allPages">

    <form action="showHistory.php" method="post">

    <h2 class="optionTitle">How do you want to see the history?</h2>

    <div class="courseFunctionContainer">

        <div class="courseFunction">
            <label for="TA_history" class="importAddTitle">By TA</label>
            <input type="radio" id="TA_history" value="TA_history" name="history">

            <select id="myTA" value="myTA" name="option[]">
          <?php

            // $history = $_POST["history"];
            $myfile = fopen("database/TADatabase.csv", "r");

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
        <div class="courseFunction">
            <label for="Course_history" class="importAddTitle">By Course</label>
            <input type="radio" id="Course_history" value="Course_history" name="history">

            <select id="myCourse" value="myCourse" name="option[]">
          <?php

            // $history = $_POST["history"];
            $myfile = fopen("database/CourseDatabase.csv", "r");

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
    </div>

    <input type="submit" value="Submit" class="submitButton">
    </form>
</div>