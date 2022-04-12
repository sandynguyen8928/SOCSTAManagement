<?php 
    // php files to include 
    include 'header.php';
?>
<?php
    error_reporting(0);
    // check if user is logged in function and redirect 
    if ($_SESSION['username'] != null )  {
        header("Location:index.php");
    }
?>

<body>
    <!----------------- BODY ----------------->
  <div class="body">

    <div class="message">
        <h1>Welcome!</h1>
    </div>

    <div class="loginContainer">
        <p class="loginText">Login</p>
        <form method="POST">
            <label for="username">Username</label> 
            <input type="text" name="username" class="loginBox">
            <label for="password">Password</label>
            <input type="password" name="password" class="loginBox">
            <div class="loginButton">
                <input type="submit" value="Login" name="login" class="loginButton">
            </div>
        </form>

      <div class="message1">
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </div>

    </div>
  </div>
</body>

</html> 

<!---- functions ---->
<?php
    // function for login button to verify account
    // listen for POST request 
    if(isset($_POST["login"])){
        // create vars 
        $username = $_POST["username"];
        $password = $_POST["password"];
    }

    // check if user exists
    $filename = 'userinfo.csv';
    $myfile = file_get_contents($filename);
    // check if username is empty
    if(!empty($username)){
        // verify username
        if(strpos($myfile, $username)) 
        {
            // check if password is empty
            if(!empty($password)){
                // verify password
                if(strpos($myfile, $password)) 
                {
                    //display secured page 
                    $_SESSION["username"]=$username; // make user session
                    $_SESSION["user_type"]=$username; // make user type session 
                    header("Location:login.php");
                }
                else{
                    echo '<script>alert("Password is incorrect.")</script>';
                }
            }
            else {
                echo '<script>alert("Please enter a password.")</script>';
            }
        }
        else{
            echo '<script>alert("User not found.")</script>';
        }
    }
?>