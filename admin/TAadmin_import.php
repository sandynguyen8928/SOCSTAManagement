<!DOCTYPE html>

<html>
	<body>

    <?php
        function readFile($myFile) {
            $myReadfile = fopen($myFile, "r") or die("Unable to open file!");

            $myfile = fopen("TADatabase", "w") or die("Unable to open file!");

            while(!feof($file)) {
                $line = fgets($file);
                fwrite($myWriteFile, $line)
            }
            fclose($file);
            }   
        
    ?>

    </body>
</html>