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
      <form action="writeOHR.php" id="form" method="post">
        Name: <input type="text" name="Name"><br>
        Email: <input type="email" name="Email" placeholder="@mcgill.ca"><br>
        Job: <select name="Job">
          <option value=""></option>
          <option value="lecture">Lecture</option>
          <option value="office">Office hours</option>
          <option value="tutorial">Tutorial</option>
        </select><br>
        Office hours: <input type="text" name="Hours"><br>
        Office location: <input type="text" name="Location"><br>
        <input type="hidden" value="<?php echo $_GET["Course"]?>" name="Course"></input>
        <input type="hidden" value="<?php echo $_GET["Term"]?>" name="Term"></input>
        <input type="hidden" value="<?php echo $_GET["Position"]?>" name="Position"></input>
        <input type="submit" value="Submit">
      </form>

      <?php
        if(isset($_GET["Term"]) && isset($_GET["Course"]) && isset($_GET["Name"]) && isset($_GET["Email"]) && isset($_GET["Job"]) && isset($_GET["Hours"]) && isset($_GET["Location"])){
          echo "<p>Office hours and responsibilities submitted!</p>";
          echo "<p>Submission details: </p>"
        }
      ?>
    </div>
  </div>
</body>

</html>