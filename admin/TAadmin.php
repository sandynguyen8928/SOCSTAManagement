<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php
        //
        // ----------------- MAIN PROGRAM --------------------------------
        //
            // --------- COMMON WEBPAGE TOP ---------
            display("matter/header.txt");

            // --------- ROUTING WEBPAGE BODY -----------
            if (sizeof($_GET)==0 || $_GET["Page"]=="Home") {

            // HOME PAGE
            display("matter/TAadmin_home.txt");
            } else if ($_GET["Page"]=="TAadmin_import") {

            // INFO PAGE
            display("matter/TAadmin_import.html");
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