<?php
  // PHP FUNCTIONS 
  // listen for POST request after form is submitted 
  if(isset($_POST["createButton"])){
      // Writes in file
      $myfile = fopen("../userinfo.csv", "a") or die("Unable to open file!");
      $string = $_POST["legal_name"].",".$_POST["email"].",".$_POST["student_ID"].",".$_POST["username"].",".$_POST["password"].",[".$_POST["courses_registered_in"]."]"."\n"; 
      fwrite($myfile, $string);
      fclose($myfile); 

      // Redirect back to page
      header('Location: index.php?Page=addUser');
  }
?>

<!----------------- BODY ----------------->
<body>
    <div class="body">
      <div class="loginContainer">
        <p class="loginText">New User</p>

        <!-- New User Info form -->
        <!-- Note: VSC throws an error "A 'return' statement can only be used within a function body" but can be disregarded -->
        <form name="newUserForm" id="newUserForm" action="addUser.php" method="POST" onsubmit= "return checkEmpty()">
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
  
          <label for="courses_registered_in">Courses</label> <br>
          <input type="text" name="courses_registered_in" class="loginBox"><br>
  
          <div class="loginButton">
            <input type="submit" name="createButton" value="Create User" class="loginButton">
          </div> 
        </form>
  
      </div>
    </div>
  
    <!-- check for blank entries -->
    <script>
        function checkEmpty() {
            var legal_name = document.forms["newUserForm"]["legal_name"].value;
            var email = document.forms["newUserForm"]["email"].value;
            var student_ID = document.forms["newUserForm"]["student_ID"].value;
            var username = document.forms["newUserForm"]["username"].value;
            var password = document.forms["newUserForm"]["password"].value;
            var courses_registered_in = document.forms["newUserForm"]["courses_registered_in"].value;
            if (legal_name == null || legal_name == "", 
                email == null || email == "", 
                username == null ||  username == "", 
                password == null ||  password == "",
                courses_registered_in == null ||  courses_registered_in == "") {
                    alert("Please Fill All Required Fields");
                    return false;
            }
        }   
    </script>
</body>