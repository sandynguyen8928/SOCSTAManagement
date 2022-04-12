<?php
  $comment = "\n".$_POST["Term"] . "," . $_POST["Course"] . "," . $_POST["Name"] . "," . $_POST["Email"] . "," . $_POST["Position"] . "," . $_POST["Job"] . "," . $_POST["Hours"] . "," . $_POST["Location"] . "," . $_POST["Responsibilities"] . "";
   
  $file = fopen("databases/OHR.csv", "a") or die("Unable to open file");
  fwrite($file, $comment);
  fclose($file); 

  header("Location: TAManage.php?Page=Submitted");
?>