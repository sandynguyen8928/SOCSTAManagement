<?php 
    include '../header.php';

    // ----------------- MAIN PROGRAM --------------------------------

        // --------- ROUTING WEBPAGE BODY -----------
        if (sizeof($_GET)==0 || $_GET["Page"]=="home") {
            // HOME PAGE
            display("matter/home.html");
        } 
        else {
            // ERROR PAGE
            echo "404: Invalid Page!";
        }
        
    // END MAIN

    // Function: Prints a file into the packet positionally dependent
    function display($path) {
        $file = fopen($path,"r");
        while(!feof($file)) {
        $line = fgets($file);
        echo $line;
        }
        fclose($file);
        }
?>