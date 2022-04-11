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
        <form action="writeWishlist.php" id="form" method="post"> 
          TA Name: <input type="text" name="Name"><br>
          <input type="hidden" value="<?php echo $_GET["Course"]?>" name="Course"></input>
          <input type="hidden" value="<?php echo $_GET["Term"]?>" name="Term"></input>
          <input type="hidden" value="<?php echo $_GET["Prof"]?>" name="Prof"></input>
          <input type="submit" value="Submit">
        </form>
        <?php
          if(isset($_GET["Name"])) {
              echo "<p>&nbsp;</p><p>".$_GET["Name"]." submitted to the wishlist!</p>";
            }
        ?>
    </div>
  </div>
</body>

</html>