<?php 
    if($_SESSION["username"] == null){
        echo "<div class='nav'>
                    <div class='navItem'>
                    </div>
                </div>";
    }
    else{
        // display navbar
        if ($_SESSION["sysop"] == TRUE){
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
        else if ($_SESSION["administrator"] == TRUE)
        {
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
                <div class='navItem' id='logout'>
                    <a href='/logout.php' class='navtitle'>Logout</a>
                </div>
                </div>";
        }
        else if ($_SESSION["ta"] == TRUE || $_SESSION["professor"] == TRUE){
          echo "<div class='nav'>
                <div class='navItem' id='rate'>
                    <p><a href='/rate/index.php' class='navtitle'>Rate a TA</a></p>
                </div>
                <div class='navItem' id='manage'>
                    <p><a href='/manage/TAManage.php' class='navtitle'>Manage TA</a></p>
                </div>
                <div class='navItem' id='logout'>
                    <a href='/logout.php' class='navtitle'>Logout</a>
                </div>
                </div>";
        }
        else if ($_SESSION["student"] == TRUE){
            echo "<div class='nav'>
                <div class='navItem' id='rate'>
                    <p><a href='/rate/index.php' class='navtitle'>Rate a TA</a></p>
                </div>
                <div class='navItem' id='logout'>
                    <a href='/logout.php' class='navtitle'>Logout</a>
                </div>
                </div>";
        }
        else {
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