<?php
  // PHP FUNCTIONS 
  // listen for POST request after form is submitted 
  if(isset($_POST["addButton"])){
      // Writes in file
      $file = fopen("database/profAndCour.csv", "a") or die("Unable to open file!");
      $term_month_year = $_POST["term_month"]." ".$_POST["year"];
      $string = $term_month_year.",".$_POST["course_num"].",".$_POST["course_name"].",".$_POST["instructor_assigned_name"]."\n";
      fwrite($file, $string);
      fclose($file);

      // Redirect back to page
      header('Location: index.php?Page=addProfCour');
  }
?>

<!----------------- BODY ----------------->
<body>
    <div class="body">
      <div class="loginContainer">
        <p class="loginText">New Professor and Course</p>

        <!-- New User Info form -->
        <!-- Note: VSC throws an error "A 'return' statement can only be used within a function body" but can be disregarded -->
        <form name="addProfCourForm" id="addProfCourForm" action="addProfCour.php" method="POST" onsubmit= "return checkEmpty()">
          
        <label for="term_month_year">Please select the term and year:</label> <br>
          <select name="term_month" id="term_month" value="term_month">
              <option type="text" value="Fall September">Fall September</option>
              <option type="text" value="Winter January">Winter January</option>
              <option type="text" value="Summer May">Summer May</option>
          </select> 
          <select name="year" id="year" value="year">
              <option type="text" value="2022">2022</option>
              <option type="text" value="2021">2021</option>
              <option type="text" value="2020">2020</option>
              <option type="text" value="2019">2019</option>
              <option type="text" value="2018">2018</option>
              <option type="text" value="2017">2017</option>
          </select> <br>
  
          <label for="course_num">Course Number</label> <br>
          <input type="text" name="course_num" class="loginBox"><br>
  
          <label for="course_name">Course Name</label> 
          <input type="text" name="course_name" class="loginBox"><br>
  
          <label for="instructor_assigned_name">Assigned Instructor's Name</label> <br>
          <input type="text" name="instructor_assigned_name" class="loginBox"><br>

          <div class="loginButton">
            <input type="submit" name="addButton" value="Add Professor and Course" class="loginButton">
          </div> 
        </form>
  
      </div>
    </div>
  
    <!-- check for blank entries -->
    <script>
        function checkEmpty() {
            var term_month = document.forms["addProfCourForm"]["term_month"].value;
            var year = document.forms["addProfCourForm"]["year"].value;
            var course_num = document.forms["addProfCourForm"]["course_num"].value;
            var course_name = document.forms["addProfCourForm"]["course_name"].value;
            var instructor_assigned_name = document.forms["addProfCourForm"]["instructor_assigned_name"].value;
            if (term_month_year == null || term_month_year == "", 
                course_num == null ||  course_num == "", 
                course_name == null ||  course_name == "",
                instructor_assigned_name == null ||  instructor_assigned_name == "") {
                    alert("Please Fill All Required Fields");
                    return false;
            }
        }   
    </script>
</body>