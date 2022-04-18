<?php
    include '../header.php';
    
    // PHP FUNCTIONS 
    // listen for POST request after form is submitted 
    if(isset($_POST["importButton"])){
        $importFile = file_get_contents($_FILES["importFile"]["tmp_name"]);
        $databaseFile = fopen("../databases/profAndCour.csv", "a") or die("Unable to open file!");
        fwrite($databaseFile, $importFile);
        fclose($file);
        fclose($databaseFile);

        // Redirect back to page
        header('Location: importProfCour.php');
    }
?>

<!----------------- BODY ----------------->
</body>
    <div class="body">
        <div class="importContainer">
            <form action="importProfCour.php" method="POST" enctype="multipart/form-data">
                <p>Select file to import: </p> <br>
                <input type="file" name="importFile" id="importFile"> <br> <br>
                <div class="loginButton">
                    <input type="submit" name="importButton" value="Import File" class="loginButton">
                </div> 
            </form>
        </div>
    </div>  
</body>

</html>