<?php 
    include '../header.php';
?>

<!DOCTYPE html>
<html>
    <body>
        <?php
        //
        // ----------------- MAIN PROGRAM --------------------------------
        //

            // --------- ROUTING WEBPAGE BODY -----------
            if (sizeof($_GET)==0 || $_GET["Page"]=="Home") {

            // HOME PAGE
            display("TAadmin_home.php");
            } else if ($_GET["Page"]=="TAadmin_import") {

            // IMPORT PAGE
            display("TAadmin_import.php");
            } else if ($_GET["Page"]=="TAadmin_info") {

            // INFO PAGE
            display("TAadmin_info.php");
            } else if ($_GET["Page"]=="TAadmin_history") {

            // HISTORY PAGE
            display("TAadmin_history.php");
            } else if ($_GET["Page"]=="TAadmin_add") {

            // ADD PAGE
            display("TAadmin_add.php");
            } else if ($_GET["Page"]=="TAadmin_remove") {

            // REMOVE PAGE
            display("TAadmin_remove.php");
            } else {
    
            
            // ERROR PAGE
            echo "404: Invalid Page!";
            }
            // // --------- COMMON WEBPAGE BOTTOM ----------
            // display("matter/mini5footer.txt");

        // END MAIN

        // Prints a file into the packet positionally dependent
        function display($path) {
            $file = fopen($path,"r");
            while(!feof($file)) {
            $line = fgets($file);
            echo $line;
            }
            fclose($file);
            }
            ?>
    </body>
</html>