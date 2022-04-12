<?php 
    include '../header.php';

    // ----------------- MAIN PROGRAM --------------------------------

        // --------- ROUTING WEBPAGE BODY -----------
        if (sizeof($_GET)==0 || $_GET["Page"]=="home") {
            // HOME PAGE
            display("matter/home.html");
        } 
        else if ($_GET["Page"]=="addUser") {
            // MANAGE USER - add user
            display("matter/addUser.html");
        } 
        else if ($_GET["Page"]=="deleteUser") {
            // MANAGER USER - delete user
            display("matter/deleteUser.html");
        } 
        else if ($_GET["Page"]=="editUser") {
            // MANAGE USER - edit user
            display("matter/editUser.html");
        } 
        else if ($_GET["Page"]=="importProfCour") {
            // INFO PAGE
            display("matter/importProfCour.html");
        } 
        else if ($_GET["Page"]=="addProfCour") {
            // INFO PAGE
            display("matter/addProfCour.html");
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