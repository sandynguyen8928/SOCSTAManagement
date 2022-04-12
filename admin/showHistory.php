<?php 
    include '../header.php';
?>

<div class="allPages">
    
<?php
$history = $_POST["history"];
$option = $_POST["option"];
$myOption = "";
$myfile = fopen("database/TACourseHistory.csv", "r");

while (($line = fgets($myfile)) !== false) {
        echo "<tr>";
        $param = explode(",", $line);

        if ($history == "Course_history") {

            $myOption = $option[1];

            if ($param[1] == $myOption)
            foreach ($param as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>\n";
        }
        else {
            $myOption = $option[0];
            if ($param[3] == $myOption)
            foreach ($param as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>\n";
        }
}
fclose($myfile);
echo "\n</table></body></html>";
?>

</div>
