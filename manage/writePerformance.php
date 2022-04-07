<?php
  $comment = "\n".$_POST["Term"] . "," . $_POST["Course"] . "," . $_POST["TA"] . ",\"" . $_POST["Comment"] . "\"";
   
  $file = fopen("performance.csv", "a") or die("Unable to open file");
  fwrite($file, $comment);
  fclose($file); 

  header("Location: performance.php?Term=".$_POST["Term"] . "&Course=" . $_POST["Course"] . "&TA=" . $_POST["TA"] . "&Comment=" . $_POST["Comment"]);
?>