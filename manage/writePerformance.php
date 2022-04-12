<?php
  $comment = "\n".$_POST["Term"] . "," . $_POST["Course"] . "," . $_POST["Prof"] . "," . $_POST["TA"] . "," . $_POST["Comment"] . "";
   
  $file = fopen("databases/performance.csv", "a") or die("Unable to open file");
  fwrite($file, $comment);
  fclose($file); 

  header("Location: TAManage.php?Page=TAManage-submitted");
?>