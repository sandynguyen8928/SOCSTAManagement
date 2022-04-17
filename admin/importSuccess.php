<?php 
    include '../header.php';
?>

<!-- Show Import Success from TAadmin_import.php Form -->

<div class="allPages">

    <!-- Same layout as TAadmin_remove.php, go to line 30 for function -->
    <form action="TAadmin_import.php" method="post">

    <h2 class="optionTitle">What do you want to import?</h2>

    <div class="courseFunctionContainer">

        <div class="courseFunction">
            <label for="TACohort.csv" class="importAddTitle">TA Cohort</label>
            <input type="radio" id="TACohort.csv" value="TACohort.csv" name="import">
        </div>
        <div class="courseFunction">
            <label for="CourseQuota.csv" class="importAddTitle">Course Quota</label>
            <input type="radio" id="CourseQuota.csv" value="CourseQuota.csv" name="import">
        </div>
    </div>

    <input type="submit" value="Submit" class="submitButton">
    <!-- Successful Message -->
    <h2 class="optionTitle">The import has been successful!</h2>
    </form>
</div>

<?php
    // Retrieve data from form
    $import = $_POST["import"];
    $myReadfile = fopen($import, 'r') or die('Unable to open file!');

    if ($myReadfile) {

        // If import TA Cohort
        if ($import == "../database/TACohort.csv") {
          $myWritefileTA = fopen('../database/TADatabase.csv', 'w');
            while (($line = fgets($myReadfile)) !== false) {
                $param = explode(",", $line);

                fwrite($myWritefileTA, $param[0]);
                fwrite($myWritefileTA, ",");

                fwrite($myWritefileTA, $param[1]);
                fwrite($myWritefileTA, ",");

                fwrite($myWritefileTA, $param[2]);
                fwrite($myWritefileTA, ",");

                fwrite($myWritefileTA, $param[14]);
                fwrite($myWritefileTA, ",");

                fwrite($myWritefileTA, $param[15]);
            }
        }

        // If import Course Quota
        else {
            $myWritefileCourse = fopen('../database/CourseDatabase.csv', 'w');
            $line = fgets($myReadfile);
            $str = $line.",Num_TA";
            fwrite($myWritefileCourse, $str);

            while (($line = fgets($myReadfile)) !== false) {
                $param = explode(",", $line);
                $numTA = ceil($param[5] / $param[6]);
                $str = $line.",".$numTA;
                fwrite($myWritefileCourse, $str);
            }
        }
    }
?>