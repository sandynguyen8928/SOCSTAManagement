<?php 
    // php files to include 
    include 'header.php';
?>
<?php
    // check if user is logged in function and redirect 
    if ($_SESSION['username'] == null )  {
        // if not logged in, send to login page
        header("Location:login.php");
    }
?>

<!-- if logged in, display welcome page -->
    <!----------------- BODY ----------------->
  <div class="welcomeBody">
    <div class="message">
        <div>
          <h1>Welcome!</h1> 
        </div>
    </div>
    <div class="message2">
      <p>Please selection a function.</p>
    </div>
  </div>
</body>

</html>
