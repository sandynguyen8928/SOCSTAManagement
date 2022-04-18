<?php
    include '../header.php';
    
    // PHP FUNCTIONS 
    // listen for POST request after form is submitted 
    if(isset($_POST["submitButton"])){
        // find user and delete row/line
        $user = $_POST['user'];
        $file = '../userinfo.csv';
        $contents = file_get_contents($file);
        $contents = str_replace(trim($user)."\n",'', $contents);
        file_put_contents($file, $contents);

        // Redirect back to page
        header('Location: deleteUser.php');
    }
?>

<!----------------- BODY ----------------->
</body>
  <div class="body">
    <div class="loginContainer" style="text-align: center;">
        <h2>Select User:</h2>
        <form name="deleteUserForm" id="deleteUserForm" action="deleteUser.php" method="POST">
            <select name="user" id="user">
                <?php
                    // read from userinfo.csv for list of users' names
                    $file = fopen("../userinfo.csv", "r");
                    // $array = array();
                    if($file) {
                        while (($line = fgets($file)) !== false) {
                            $param = explode(",", $line);
                            echo "<option value='{$line}'>$param[0]</option>";
                            // $array[] = $param[0];
                        }
                    }
                    // foreach($array as $user) {
                        // echo "<option value=$line>{$user}</option>";
                    // }  
                ?>
            </select>
            <div class="loginButton">
                <input type="submit" name="submitButton" value="Delete" class="loginButton">
            </div> 
        </form>
    </div>
  </div>
</body>

</html>