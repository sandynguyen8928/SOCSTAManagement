<!DOCTYPE html>

<html>
    <body>
        <?php
        //
        // ----------------- MAIN PROGRAM --------------------------------
        //
            // --------- COMMON WEBPAGE TOP ---------
            display("matter/header.html");

            // --------- ROUTING WEBPAGE BODY -----------
            if (sizeof($_GET)==0 || $_GET["Page"]=="Home") {

            // HOME PAGE
            display("matter/TAadmin_home.html");
            } else if ($_GET["Page"]=="TAadmin_import") {

            // INFO PAGE
            display("matter/TAadmin_import.html");
            } else if ($_GET["Page"]=="TAadmin_info") {

            // INFO PAGE
            display("TAadmin_info.php");
            } else if ($_GET["Page"]=="TAadmin_history") {

                // INFO PAGE
                display("matter/TAadmin_history.html");
                } else if ($_GET["Page"]=="TAadmin_addremove") {

                    // INFO PAGE
                    display("TAadmin_addremove.php");
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