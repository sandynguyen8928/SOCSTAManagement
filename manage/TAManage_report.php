<?php

  $entries = array(
    array(
      ('entry_key') => "term_month_year,course_num,TA_name,",
      ('assigned_responsibility') => "assigned_responsibility,",
      ('student_rating_avg') => "student_rating_avg,",
      ('performance_comments') => "performance_comments,",
      ('student_comments') => "student_comments"
    )
  );
  
  $TACourseHistory = fopen("/home/2019/slee347/public_html/SOCSTAManagement/databases/TACourseHistory.csv", "r") or die("Unable to open file");
  // move pointer to after header row
  fgets($TACourseHistory);
  // loop through to populate first three columns (term, course, name)
  while(!feof($TACourseHistory)) {
    $line = fgetcsv($TACourseHistory);
    $entry_key = "\n".$line[0].','.$line[1].','.$line[3].',';
    array_push($entries, array(
      ('entry_key') => $entry_key,
      ('assigned_responsibility') => "",
      ('student_rating_avg') => array(),
      ('performance_comments') => array(),
      ('student_comments') => array()));
  }
  fclose($TACourseHistory);

// loop through OHR.csv to populate assigned responsibilities, delimited by ;
  $OHR = fopen("/home/2019/slee347/public_html/SOCSTAManagement/databases/OHR.csv", "r") or die("Unable to open file");
  // move pointer to after header row
  fgetcsv($OHR);
  while(!feof($OHR)) {
    $line = fgetcsv($OHR);
    
    // assigned responsibilities
    $job = $line[5];
    $other_resp = $line[8];
    $assigned_responsibilities = $job.';'.$other_resp.',';

    // set up entry key
    $term = $line[0];
    $course = $line[1];
    $name = $line[2];
    $entry = "\n".$term.','.$course.','.$name.',';

    // check for entry key equality in $entries; if match, then push to array
    foreach($entries as &$row){
      if(strcmp($entry,$row["entry_key"])==0) {
        $row['assigned_responsibility'] = $assigned_responsibilities;
      }
    }
  }
  fclose($OHR);



// loop through student ratings to get avg for each TA
  $rate = fopen("/home/2019/slee347/public_html/SOCSTAManagement/databases/TAratings.csv", "r") or die("Unable to open file");
  // move pointer to after header row
  fgetcsv($rate);
  while(!feof($rate)) {
    $line = fgetcsv($rate);

    // student rating
    $rating = intval($line[3]);

    // entry key
    $term = $line[1];
    $course = $line[2];
    $name = $line[0];
    $entry = "\n".$term.','.$course.','.$name.',';
    
    // check for entry key equality in $entries; if match, then push to array
    foreach($entries as &$row){
      if(strcmp($entry,$row['entry_key'])==0) {
        array_push($row['student_rating_avg'], $rating);
      }
    }
  }
  fclose($rate);
  
  // loop through performance.csv to populate performance log comments, delimited by ;
  $performance = fopen("/home/2019/slee347/public_html/SOCSTAManagement/databases/performance.csv", "r") or die("Unable to open file");
  // move pointer to after header row
  fgetcsv($performance);
  while(!feof($performance)) {
    $line = fgetcsv($performance);

    // prof comment
    $comment = $line[4];
    // entry key
    $term = $line[0];
    $course = $line[1];
    $name = $line[3];
    $entry = "\n".$term.','.$course.','.$name.',';
    
    // check for entry key equality in $entries; if match, then push to array
    foreach($entries as &$row){
      if(strcmp($entry,$row['entry_key'])==0) {
        array_push($row['performance_comments'], $comment);
      }
    }
    
  }
  fclose($performance);

// loop through student ratings to get student comments, delimited by ;
  $performance = fopen("/home/2019/slee347/public_html/SOCSTAManagement/databases/TAratings.csv", "r") or die("Unable to open file");
  // move pointer to after header row
  fgetcsv($performance);
  while(!feof($performance)) {
    $line = fgetcsv($performance);

    // student comment
    $comment = $line[4];
    // entry key
    $term = $line[1];
    $course = $line[2];
    $name = $line[0];
    $entry = "\n".$term.','.$course.','.$name.',';
  
    // check for entry key equality in $entries; if match, then push to array
    foreach($entries as &$row){
      if(strcmp($entry,$row['entry_key'])==0) {
        array_push($row['student_comments'], $comment);
      }
    }
  }
  fclose($performance);

  // loop through entries to calculate average student rating & compile comments into one text field
  for($i=1; $i<count($entries); $i++) {
    $row = &$entries[$i];

    $assigned_responsibilities = &$row['assigned_responsibility'];
    if(strcmp($assigned_responsibilities,"")==0) $assigned_responsibilities = "NA,";

    // calculate student ratings
    // if not countable, that means there are no ratings to display
    $student_ratings = &$row['student_rating_avg'];
    if(sizeof($student_ratings)>0) {
      $sum = 0;
      $count = 0;
      foreach($student_ratings as $rating){
        $sum = $sum+$rating;
        $count = $count+1;
      }
      $average = $sum/$count;
      $student_ratings = $average.',';
    } else $student_ratings = "NA,";
    
    // compile prof comments
    // if not countable, that means there are no comments to display
    $prof_comments = &$row['performance_comments'];
    if(sizeof($prof_comments)>0) {
      $field = "";
      foreach($prof_comments as $comment){
        $field=$field.$comment;
        if(strcmp($comment,$prof_comments[count($prof_comments)-1])!=0) $field=$field.';';
      }
      $prof_comments = $field.',';
    } else $prof_comments ="NA,";

    // compile student comments
    // if not countable, that means there are no comments to display
    $student_comments = &$row['student_comments'];
    if(sizeof($student_comments)>0) {
      $field = "";
      foreach($student_comments as $comment){
        $field=$field.$comment;
        if(strcmp($comment,$student_comments[count($student_comments)-1])!=0) $field=$field.';';
      }
      $student_comments = $field;
    } else $student_comments = "NA";
    
  }

  // write to report.csv
  $file = fopen("/home/2019/slee347/public_html/SOCSTAManagement/databases/report.csv", "w") or die("Unable to open file");
  foreach($entries as &$row){
    foreach($row as $data) fwrite($file, $data);
  }
  fclose($file); 

  $course = $_GET["Course"];
  $term = $_GET["Term"];
  $prof = $_GET["Prof"];
  $name = $_GET["Name"];
  header("Location: TAManage.php?Page=TAManage-report&Course=$course&Term=$term&Prof=$prof&Name=$name");
?>
