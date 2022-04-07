<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
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
      <p><a href="../admin/index.html" class="navtitle">Administration</a></p>
    </div>

    <div class="navItem" id="sysop">
      <p><a href="../sysop/index.html" class="navtitle">System Operator</a></p>
    </div>

    <div class="navItem" id="logout">
      <p class="navtitle">Logout</p>
    </div>
  </div>
  
    <!----------------- BODY ----------------->
  <div class="body">
    <div class="message">
      Select a teacher: <select id="TA">
        <option></option>
        <?php
          $file = fopen("OHR.csv", "r") or die("Unable to open file");
          $rows = array();
          while(!feof($file)){
            array_push($rows, fgetcsv($file));
          }
          
          $TAs = array();
          foreach($rows as $entry){
            $name = $entry[2];
            if($entry[1]===$_GET["Course"] && !in_array($name, $TAs)) {
              array_push($TAs, $entry[2]);
              echo "<option>".$entry[2]."</option>";
            }
          }
          echo "</select>";
          
          if(isset($_GET["TA"]) && isset($_GET["Comment"])) {
            echo "<p>&nbsp;</p><p>\"".$_GET["Comment"]."\" submitted as a comment for ".$_GET["TA"]."!</p>";
          }
          fclose($file);
        ?>
      <p>&nbsp;</p>
    </div>
  </div>
</body>

</html>