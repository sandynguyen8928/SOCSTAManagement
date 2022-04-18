<?php 
    // get fields
    $file = fopen("databases/userInfo.csv","r");
    if($file){
      while(($line = fgets($file)) !== false){
        $param = explode(",",$line);
        if($param[3] == $_SESSION["username"]){
          $_SESSION["student"] = $param[5];
          $_SESSION["professor"] = $param[6];
          $_SESSION["administrator"] = $param[7];
          $_SESSION["ta"] = $param[8];
          $_SESSION["sysop"] = $param[9];
        }
      }
    }
    fclose($file);

    // conditonal navbar
    if($_SESSION["username"] == null){
        echo "<div class='nav'>
                    <div class='navItem'>
                    </div>
                </div>";
    }
    else{
        // display navbar
        if ($_SESSION["sysop"] == "true"){
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
        else if ($_SESSION["administrator"] == "true")
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
        else if ($_SESSION["ta"] == "true" || $_SESSION["professor"] == "true"){
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
        else if ($_SESSION["student"] == "true"){
            echo "<div class='nav'>
                <div class='navItem' id='rate'>
                    <p><a href='/rate/index.php' class='navtitle'>Rate a TA</a></p>
                </div>
                <div class='navItem' id='logout'>
                    <a href='/logout.php' class='navtitle'>Logout</a>
                </div>
                </div>";
        }
    }
?>