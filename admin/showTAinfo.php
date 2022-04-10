<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="../script.js"></script>
    <title> SOCS TA Management </title>
</head>

<body>
    <!---------------- HEADER --------------> 
    <div class="header">
        <h1>SOCS TA MANAGEMENT</h1>
        <p class="subtitle">McGill | School of Computer Science</p>
    </div>

    <!----------------- NAV BAR -------------->
  <div class="nav">
    <div class="navItem" id="rate">
      <p><a href="../rate/index.html" class="navtitle">Rate a TA</a></p>
    </div>

    <div class="navItem" id="manage">
      <p><a href="../manage/index.html" class="navtitle">Manage TA</a></p>
    </div>

    <div class="navItem" id="admin">
      <p><a href="../admin/TAadmin.php" class="navtitle">Administration</a></p>
    </div>

    <div class="navItem" id="sysop">
      <p><a href="../sysop/index.html" class="navtitle">System Operator</a></p>
    </div>

    <div class="navItem" id="logout">
      <p class="navtitle">Logout</p>
    </div>
  </div>

<div class="allPages">

    <?php

    $name = $_POST["myTA"];
    
    $myfile1 = fopen("database/TADatabase.csv", "r");

    $myfile3 = fopen("../manage/performance.csv", "r");
    $myfile5 = fopen("../manage/wishlist.csv", "r");
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