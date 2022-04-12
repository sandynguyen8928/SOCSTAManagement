<?php 
    if($_SESSION["username"] == null){
      error_reporting(0);
        echo "<div class='nav'>
                    <div class='navItem'>
                    </div>
                </div>";
    }
    else{
    //else if ($_SESSION["user_type"] == "student")  {
        // display navbar
        echo "<div class='nav'>
                    <div class='navItem' id='rate'>
                        <p><a href='/rate/index.php' class='navtitle'>Rate a TA</a></p>
                    </div>
                    <div class='navItem' id='manage'>
                        <p><a href='/manage/TAManage.php' class='navtitle'>Manage TA</a></p>
                    </div>

                    <div class='navItem' id='admin'>
                        <p><a href='/admin/TAadmin.php' class='navtitle'>Administration</a></p>
                    </div>

                    <div class='navItem' id='sysop'>
                        <p><a href='/sysop/index.php' class='navtitle'>System Operator</a></p>
                    </div>

                    <div class='navItem' id='logout'>
                        <a href='/logout.php' class='navtitle'>Logout</a>
                    </div>
                </div>";
    }
?>

<!----------------- NAV BAR -------------->
<!-- <div class="nav">
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
      <a href="logout.php" class="navtitle">Logout</a>
    </div>
  </div> -->