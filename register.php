<?php 
    // php files to include 
    include 'header.php';
?>

<!-- display register body -->
    <!----------------- BODY ----------------->
  <div class="body">
    <div class="loginContainer">
      <p class="loginText">Register</p>

      <!-- Register form -->
      <form name="registerForm" id="registerForm" action="register.php" method="POST" onsubmit="return checkEmpty()">
        <label for="legal_name">Name</label> 
        <input type="text" name="legal_name" class="loginBox">

        <label for="email">E-mail</label> <br>
        <input type="text" name="email" class="loginBox"><br>

        <label for="student_ID">Student ID Number (If applicable)</label> 
        <input type="text" name="student_ID" class="loginBox"><br>

        <label for="username">Username</label> <br>
        <input type="text" name="username" class="loginBox"><br>

        <label for="password">Password</label> <br>
        <input type="password" name="password" class="loginBox"><br>

        <p> Please select all that apply: <p>
        <input type="radio" name="student" value="true">
        <label>Student</label>
        <input type="radio" name="professor" value="true">
        <label>Professor</label>
        <input type="radio" name="administrator" value="true">
        <label>Administrator</label> 
        <input type="radio" name="ta" value="true">
        <label>TA</label>
        <input type="radio" name="sysop" value="true">
        <label>System Operator</label> <br> <br>

        <label for="courses_registered_in">Courses (Please follow each course with term and separate with semi-colon)<br>Ex: COMP 307 Winter January 2022;COMP 303 Fall September 2021</label> <br>
        <input type="text" name="courses_registered_in" class="loginBox"><br>

        <div class="loginButton">
          <input type="submit" name="registerButton" value="Register" class="loginButton">
        </div> 
      </form>

    </div>
  </div>

  <!-- check for blank entries -->
    <script>
        function checkEmpty() {
            var legal_name = document.forms["registerForm"]["legal_name"].value;
            var email = document.forms["registerForm"]["email"].value;
            var student_ID = document.forms["registerForm"]["student_ID"].value;
            var username = document.forms["registerForm"]["username"].value;
            var password = document.forms["registerForm"]["password"].value;
            var student = document.forms["registerForm"]["student"].value;
            var professor = document.forms["registerForm"]["professor"].value;
            var administrator = document.forms["registerForm"]["administrator"].value;
            var ta = document.forms["registerForm"]["ta"].value;
            var sysop = document.forms["registerForm"]["sysop"].value;

            var courses_registered_in = document.forms["registerForm"]["courses_registered_in"].value;
            if (legal_name == null || legal_name == "", 
                email == null || email == "", 
                username == null ||  username == "", 
                password == null ||  password == "",
                courses_registered_in == null ||  courses_registered_in == "") {
                    alert("Please Fill All Required Fields");
                    return false;
            }
            else if ((student == null || student == "") 
                      && (professor == null || professor == "") 
                      && (administrator == null || administrator == "")
                      && (ta == null || ta == "")
                      && (sysop == null || sysop == ""))  {
                    alert("Please Fill All Required Fields");
                    return false;
            }
        }   
    </script>
</body>

</html> 


<!------ php functions ------->
<?php 
    // listen for POST request after form is submitted 
    if(isset($_POST["registerButton"])){
        // Writes in file
        $myfile = fopen("databases/userInfo.csv", "a") or die("Unable to open file!");
        $string = $_POST["legal_name"].",".$_POST["email"].",".$_POST["student_ID"].",".$_POST["username"].",".$_POST["password"].",".$_POST["student"].",".$_POST["professor"].",".$_POST["administrator"].",".$_POST["ta"].",".$_POST["sysop"].","."[".$_POST["courses_registered_in"]."]"."\n"; 
        fwrite($myfile, $string);
        fclose($myfile); 

        // session for username
        $_SESSION["username"]=$_POST["username"];
        // display secured page 
        header("Location: index.php");
    }

?>