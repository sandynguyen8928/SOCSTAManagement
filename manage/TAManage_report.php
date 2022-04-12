<?php
  $term = $_GET["Term"];
  $course = $_GET["Course"];
  $prof = $_GET["Prof"];
  $name = $_GET["Name"];
   
  $content = "term_month_year,course_num,TA_name,assigned_responsibility,student_rating_avg,performance_comments,student_comments";

  // echo "<p>".$term."</p>";
  // $TACourseHistory = fopen("../admin/database/TACourseHistory.csv", "w") or die("Unable to open file");
// loop through to populate first three columns (term, course, name)
  // while(!feof($TACourseHistory)) {
  //   $line = fgetcsv($TACourseHistory);
    
  //   echo $line;
  // }
// loop through OHR.csv to populate assigned responsibilities, delimited by ;

// loop through student ratings to get avg for each TA

// loop through performance.csv to populate performance log comments, delimited by ;

// loop through student ratings to get student comments, delimited by ;

  // fclose($file);
  // fclose($TACourseHistory);

  // $file = fopen("databases/report.csv", "w") or die("Unable to open file");
  // fwrite($file, $content);
  // fclose($file); 

  header("Location: TAManage.php?Page=TAManage-report&Course=$course&Term=$term&Prof=$prof&Name=$name");
?>