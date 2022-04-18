<?php 
    include '../header.php';
?>

<!-- Show History from TAadmin_history.php Form -->
<div class="allPages">
    <table class="tableHistory">
    <?php

        // Retrieve data from form
        $history = $_POST["history"];
        $option = $_POST["option"];
        $myOption = "";
        $myReadfile = fopen("../databases/TACourseHistory.csv", "r") or die("Unable to open file");

        // Loop through each line
        while (($line = fgets($myReadfile)) !== false) {
                echo "<tr>";

                $param = explode(",", $line);

                // If want to see all TA History
                if ($history == "allTA_history") {
                    foreach ($param as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                }

                // If want to see a course's history
                else if ($history == "Course_history") {

                    $myOption = $option[1];

                    if ($param[1] == $myOption)
                    foreach ($param as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>\n";
                }

                // If want to see a TA's history
                else if ($history == "TA_history"){
                    $myOption = $option[0];
                    if ($param[3] == $myOption)
                    foreach ($param as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>\n";
                }
        }
        fclose($myReadfile);
        echo "\n</table></body></html>";
    ?>

</div>
