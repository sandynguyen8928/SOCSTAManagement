<?php
  $comment = "\n".$_POST["Term"] . "," . $_POST["Course"] . "," . $_POST["Prof"] . "," . $_POST["Name"];
   
  $file = fopen("../databases/wishlist.csv", "a") or die("Unable to open file");
  fwrite($file, $comment);
  fclose($file); 

  header("Location: TAManage.php?Page=Submitted");
?>