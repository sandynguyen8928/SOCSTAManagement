<?php
  $comment = "\n".$_POST["Term"] . "," . $_POST["Course"] . ",\"" . $_POST["Prof"] . "\",\"" . $_POST["Name"] . "\"";
   
  $file = fopen("wishlist.csv", "a") or die("Unable to open file");
  fwrite($file, $comment);
  fclose($file); 

  header("Location: wishlist.php?Term=".$_POST["Term"] . "&Course=" . $_POST["Course"] . "&Name=" . $_POST["Name"]);
?>