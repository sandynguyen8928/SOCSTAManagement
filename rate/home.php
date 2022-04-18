<?php
  include '../header.php';

  // PHP FUNCTIONS 
  // listen for POST request after form is submitted 
  if(isset($_POST["submitButton"])){
      // Writes in file legal_name,term_month_year,course_num,rating,comment
      $file = fopen("database/TAratings.csv", "a") or die("Unable to open file!");
      $term_month_year = $_POST["term_month"]." ".$_POST["year"];
      $string = $_POST["legal_name"].",".$term_month_year.",".$_POST["course_num"].",".$_POST["rating"].",".$_POST["comment"]."\n";
      fwrite($file, $string);
      fclose($file);

      // Redirect back to page
      header('Location: index.php?Page=home');
  }
?>

<!----------------- BODY ----------------->
<body>
    <div class="body">
      <div class="loginContainer">
        <p class="loginText">Rate a TA</p>

        <form name="rateTAForm" id="rateTAForm" action="home.php" method="POST" onsubmit= "return checkEmpty()">
          
          <label for="legal_name">TA Name</label> <br>
          <input type="text" name="legal_name" class="loginBox"><br>

          <label for="course_num">Course Number</label> <br>
          <input type="text" name="course_num" class="loginBox"><br><br>

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
          </select> <br> <br>

          <p> Please rate on a scale of 1-5: <p>
          <input type="radio" name="rating" value="1">
          <label>1</label>
          <input type="radio" name="rating" value="2">
          <label>2</label>
          <input type="radio" name="rating" value="3">
          <label>3</label> 
          <input type="radio" name="rating" value="4">
          <label>4</label>
          <input type="radio" name="rating" value="4">
          <label>5</label> <br> <br>

  
          <label for="comment">Comment (Optional)</label> <br>
          <input type="text" name="comment" class="loginBox"><br>
  
          <div class="loginButton">
            <input type="submit" name="submitButton" value="Submit" class="loginButton">
          </div> 
        </form>
  
      </div>
    </div>
  
    <!-- check for blank entries -->
    <script>
        function checkEmpty() {
            var rating = document.forms["rateTAForm"]["rating"].value;
            var legal_name = document.forms["rateTAForm"]["legal_name"].value;
            var course_num = document.forms["rateTAForm"]["course_num"].value;
            if (rating == null ||  rating == "",
                legal_name == null ||  legal_name == "",
                course_num == null ||  course_num == ""){
                    alert("Please Fill All Required Fields");
                    return false;
            }
        }   
    </script>
</body>