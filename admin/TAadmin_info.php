<?php 
    include '../header.php';
?>

<!-- TA Admin Info Page -->
<div class="allPages">

    <!-- Title -->
    <h2 class="optionTitle">Select a TA:</h2>

    <!-- Form -->
    <form action="showTAInfo.php" method="post" class="optionTitle">
      <select name="myTA" id="myTA" value="myTA" class="dropdown">
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
      <input type="submit" value="Submit" class="submitButton">
    </form>
</div>