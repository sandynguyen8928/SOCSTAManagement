<?php
  $comment = "\n".$_POST["Term"] . "," . $_POST["Course"] . ",\"" . $_POST["Name"] . "\"," . $_POST["Email"] . "," . $_POST["Position"] . ",\"" . $_POST["Job"] . "\",\"" . $_POST["Hours"] . "\",\"" . $_POST["Location"] . "\"";
   
  $file = fopen("OHR.csv", "a") or die("Unable to open file");
  fwrite($file, $comment);
  fclose($file); 

  header("Location: OHR.php?Term=".$_POST["Term"] . "&Course=" . $_POST["Course"] . "&Name=". $_POST["Name"] . "&Email=" . $_POST["Email"] . "&Job=" . $_POST["Job"] . "&Hours=" . $_POST["Hours"] . "&Location=" . $_POST["Location"]);
?>