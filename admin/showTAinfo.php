<?php 
    include '../header.php';
?>

<!-- Show TA Info from TAadmin_info.php Form -->
<div class="allPages">

  <?php
  $name = $_POST["myTA"];
  
  // Open all files needed
  $myfile1 = fopen("database/TADatabase.csv", "r");
  $myfile2 = fopen("../manage/databases/report.csv", "r");
  $myfile3 = fopen("../manage/databases/wishlist.csv", "r");
  $myfile4 = fopen("../manage/databases/performance.csv", "r");

  // Arrays holding information needed from files
  $array = array();
  $studentComment = "";
  $perf = array();

  // Get TA Cohort info
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

  // Get student rating and comments info
  if ($myfile2) {
    $present=0;
    while (($line = fgets($myfile2)) !== false) {
      $param = explode(",", $line);
      if ($param[2] == $name) {
        if ($param[4] != "NA") {
          $array[] = $param[4];
          $present = 1;
        }
        if ($param[6] != "NA"){
          $studentComment .= $param[6];
        }
      }
    }
    if ($present == 0) {
      $array[] = " ";
    }
  }

  // Get performance log info
  if ($myfile4) {
    while (($line = fgets($myfile4)) !== false) {
      $param = explode(",", $line);
      if ($param[3] == $name) {
        $perf[] = "$param[2]: $param[4]";
      }
    }
  }

  // Get professors' wishlist info
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

  <!-- Display all info -->
  <h2 class="titleFeature"><?php echo $name; ?></h2>
  <table class="tableInfo">
    <tr><td>TA Cohort:</td><td><?php echo $array[0]; ?></td></tr>
    <tr><td>Student Rating Average:</td><td><?php echo $array[1]; ?></td></tr>
    <tr><td>Professor Perfomance Log:</td><td><?php foreach($perf as $lol){ echo $lol; echo "<br>";} ?></td></tr>
    <tr><td>Student Rating Comment:</td><td><?php echo $studentComment ?></td></tr>
    <tr><td>Professor Wish List Membership:</td><td><?php echo $array[2]; ?></td></tr>
  </table>
</div>