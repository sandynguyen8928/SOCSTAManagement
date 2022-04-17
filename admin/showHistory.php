<?php 
    include '../header.php';
?>

<div class="allPages">
<table class="tableHistory">
    
<?php
$history = $_POST["history"];
$option = $_POST["option"];
$myOption = "";
$myReadfile = fopen("database/TACourseHistory.csv", "r") or die("Unable to open file");

while (($line = fgets($myReadfile)) !== false) {
        echo "<tr>";

        $param = explode(",", $line);

        if ($history == "allTA_history") {
            foreach ($param as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
        }

        else if ($history == "Course_history") {

            $myOption = $option[1];

            if ($param[1] == $myOption)
            foreach ($param as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>\n";
        }
        else if ($history == "TA_history"){
            $myOption = $option[0];
            if ($param[3] == $myOption)
            foreach ($param as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>\n";
        }
}

if (!empty($array)) {
    foreach ($array as $TA) {
        echo $TA;
    }
}
fclose($myReadfile);
echo "\n</table></body></html>";
?>

</div>
