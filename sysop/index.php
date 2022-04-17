<?php 
    include '../header.php';

    // ----------------- MAIN PROGRAM --------------------------------

        // --------- ROUTING WEBPAGE BODY -----------
        if (sizeof($_GET)==0 || $_GET["Page"]=="home") {
            // HOME PAGE
            display("home.html");
        } 
        else if ($_GET["Page"]=="addUser") {
            // MANAGE USER - add user  
            display("addUser.php"); 
        } 
        else if ($_GET["Page"]=="deleteUser") {
            // MANAGE USER - delete user
            header('Location: deleteUser.php');
        } 
        else if ($_GET["Page"]=="editUser") {
            // MANAGE USER - edit user
            display("matter/editUser.html");
        } 
        else if ($_GET["Page"]=="importProfCour") {
            // INFO PAGE
            display("importProfCour.php");
        } 
        else if ($_GET["Page"]=="addProfCour") {
            // INFO PAGE
            display("addProfCour.php");
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