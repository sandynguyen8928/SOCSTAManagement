<?php 
    include '../header.php';
?>

<!-- Show TA Info from TAadmin_info.php Form -->
<div class="allPages">

  <?php
  $name = $_POST["myTA"];
  
  // Open all files needed
  $myfile1 = fopen("../databases/TADatabase.csv", "r");
  $myfile2 = fopen("../databases/report.csv", "r");
  $myfile3 = fopen("../databases/wishlist.csv", "r");
  $myfile4 = fopen("../databases/performance.csv", "r");
  $myfile5 = fopen("../databases/TACourseHistory.csv", "r");
  $myfile6 = fopen("../databases/TACourseHistory.csv", "r");

  // Arrays holding information needed from files
  $array = array();
  $studentComment = array();
  $perf = array();
  $courses = array();
  $wishlist = array();

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
        if (trim($param[4]) != "NA") {
          $array[] = $param[4];
          $present = 1;
        }
        if (trim($param[6]) != "NA"){
          $studentComment[] = $param[6];
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
    while (($line = fgets($myfile3)) !== false) {
      $param = explode(",", $line);
      if (trim($param[3]) == $name) {
        $wishlist[] = $param[2];
      }
    }
  }

  // Get current date
  $year = 1000;
  $term = "";
  if ($myfile5) {
    while (($line = fgets($myfile5)) !== false) {
      $param = explode(",", $line);
      $date = explode(" ", $param[0]);

      if ($date[2] > $year) {
        $year = $date[2];
        $term = "$date[0] $date[1]";
      }
      if ($date[2] == $year) {
        if ($date[0] == "Fall") {
          $term = "Fall";
        }
        else if($date[0] == "Summer") {
          $term = "Summer";
        }
      }
    }
  }

  if ($myfile6) {
    while (($line = fgets($myfile6)) !== false) {
      $param = explode(",", $line);
      if ($param[3] == $name && $param[0] == "$term $year") {
        $courses[] = $param[1];
      }
    }
  }

  ?>

  <!-- Display all info -->
  <h2 class="titleFeature"><?php echo $name; ?></h2>
  <table class="tableInfo">
    <tr><td>TA Cohort:</td><td><?php echo $array[0]; ?></td></tr>
    <tr><td>Student Rating Average:</td><td><?php echo $array[1]; ?></td></tr>
    <tr><td>Professor Perfomance Log:</td><td><?php foreach($perf as $lol){ echo $lol; echo "<br>";} ?></td></tr>
    <tr><td>Student Rating Comment:</td><td><?php  foreach($studentComment as $lol){ echo $lol; echo "<br>";} ?></td></tr>
    <tr><td>Professor Wish List Membership:</td><td><?php  foreach($wishlist as $lol){ echo $lol; echo "<br>";} ?></td></tr>
    <tr><td>Courses Assigned This Term:</td><td><?php foreach($courses as $lol){ echo $lol; echo "<br>";} ?></td></tr>
  </table>
</div>