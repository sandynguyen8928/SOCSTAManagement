<?php
    include '../header.php';
    
    // PHP FUNCTIONS 
    // listen for POST request after form is submitted 
    if(isset($_POST["submitButton"])){
        // find user and delete row/line
        $old = $_POST['old'];
        $new = $_POST['newInfo'];
        $file = '../databases/userinfo.csv';
        $contents = file_get_contents($file);
        $contents = str_replace($old,$new, $contents);
        file_put_contents($file, $contents);

        // Redirect back to page
        header('Location: editUser.php');
    }
?>

<!----------------- BODY ----------------->
</body>
  <div class="body">
        <div class="loginContainer">

            <p>Select User:</p>
            <form name="editUserForm" id="editUserForm" action="editUser.php" method="POST" onsubmit= "return checkEmpty()">
                <select name="user" id="user">
                    <?php
                        // read from userinfo.csv for list of users' names
                        $file = fopen("../databases/userinfo.csv", "r");
                        // $array = array();
                        if($file) {
                            while (($line = fgets($file)) !== false) {
                                $param = explode(",", $line);
                                echo "<option value='{$line}'>$param[0]</option>";
                            }
                        }
                    ?>
                </select> <br> <br>

                <p>Select field to edit: <p>
                <input type="radio" name="field" value="Name">
                <label>Name</label>
                <input type="radio" name="field" value="Email">
                <label>Email</label>
                <input type="radio" name="field" value="Student ID">
                <label>Student ID</label> <br>
                <input type="radio" name="field" value="Username">
                <label>Username</label>
                <input type="radio" name="field" value="Password">
                <label>Password</label>
                <input type="radio" name="field" value="Courses">
                <label>Courses</label><br><br>
                
                <label for="old">Old</label> 
                <input type="text" name="old" class="loginBox">
                <label for="newInfo">New</label> <br>
                <input type="text" name="newInfo" class="loginBox"><br>

                <div class="loginButton">
                    <input type="submit" name="submitButton" value="Edit User" class="loginButton">
                </div> 

            </form>
        </div>
  </div>

    <!-- check for blank entries -->
    <script>
        function checkEmpty() {
            var old = document.forms["editUserForm"]["old"].value;
            var newInfo = document.forms["editUserForm"]["newInfo"].value;
            if (old == null || old == "", 
                newInfo == null || newInfo == "") {
                    alert("Please Fill All Required Fields");
                    return false;
            }
        }   
    </script>
</body>
</html>

