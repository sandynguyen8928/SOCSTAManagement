<?php 
    include '../header.php';
?>

<div class="allPages">

    <?php

    $name = $_POST["myTA"];
    
    $myfile1 = fopen("database/TADatabase.csv", "r");

    $myfile3 = fopen("../manage/databases/performance.csv", "r");
    $myfile5 = fopen("../manage/databases/wishlist.csv", "r");
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

    if ($myfile3) {
        $present=0;
        while (($line = fgets($myfile3)) !== false) {
          $param = explode(",", $line);
          if ($param[2] == $name) {
              $array[] = $param[4];
              $present=1;
              break;
          }
        }
        if ($present == 0) {
            $array[] = " ";
          }
      }

      if ($myfile5) {
        $present=0;
        while (($line = fgets($myfile5)) !== false) {
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
    <p class="infoDisplay">Professor Performance Log: <?php echo $array[1]; ?></p>
    <p class="infoDisplay">Professor's Wishlist Membership: <?php echo $array[2]; ?></p>

</div>