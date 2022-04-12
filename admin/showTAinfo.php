<?php 
    include '../header.php';
?>

<div class="allPages">

    <?php

    $name = $_POST["myTA"];
    
    $myfile1 = fopen("database/TADatabase.csv", "r");
    $myfile2 = fopen("../manage/databases/report.csv", "r");
    $myfile3 = fopen("../manage/databases/wishlist.csv", "r");
    $array = array();

    if ($myfile1) {
        $present=0;
      while (($line = fgets($myfile1)) !== false) {
        $param = explode(",", $line);
        if ($param[1] == $name) {
            $array[] = $param[4];
            $present=1;
            break;
        }
      }
      if ($present == 0) {
        $array[] = " ";
      }
    }

    if ($myfile2) {
        $present=0;
        while (($line = fgets($myfile2)) !== false) {
          $param = explode(",", $line);
          if ($param[2] == $name) {
              $array[] = $param[4];
              $array[] = $param[5];
              $array[] = $param[6];
              $present=1;
              break;
          }
        }
        if ($present == 0) {
            $array[] = " ";
          }
      }

      if ($myfile3) {
        $present=0;
        while (($line = fgets($myfile3)) !== false) {
          $param = explode(",", $line);
          if ($param[3] == $name) {
              $array[] = $param[2];
              $present=1;
              break;
          }
        }
        if ($present == 0) {
            $array[] = " ";
          }
      }

    ?>

    <h2><?php echo $name; ?></h2>
    <p class="infoDisplay">TA Cohort: <?php echo $array[0]; ?></p>
    <p class="infoDisplay">Student Rating Average: <?php echo $array[1]; ?></p>
    <p class="infoDisplay">Professor Perfomance Log: <?php echo $array[2]; ?></p>
    <p class="infoDisplay">Student Rating Comment: <?php echo $array[3]; ?></p>

</div>