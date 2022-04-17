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
          if (trim($param[3]) == $name) {
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
    <h2 class="titleFeature"><?php echo $name; ?></h2>
    <table class="tableInfo">
    <tr><td>TA Cohort:</td><td><?php echo $array[0]; ?></td></tr>
    <tr><td>Student Rating Average:</td><td><?php echo $array[1]; ?></td></tr>
    <tr><td>Professor Perfomance Log:</td><td><?php echo $array[2]; ?></td></tr>
    <tr><td>Student Rating Comment:</td><td><?php echo $array[3]; ?></td></tr>
    <tr><td>Professor Wish List Membership:</td><td><?php echo $array[4]; ?></td></tr>
    </table>

</div>