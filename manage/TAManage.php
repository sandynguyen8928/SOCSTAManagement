<?php 
    include '/home/2019/slee347/public_html/SOCSTAManagement/header.php';
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
                display("/home/2019/slee347/public_html/SOCSTAManagement/manage/matter/TAManage_home.html");
            } else if($_GET["Page"]=="TAManage-submitted"){
                
                // INFO PAGE
                display("/home/2019/slee347/public_html/SOCSTAManagement/manage/matter/TAManage_submitted.html");
            } else if ($_GET["Page"]=="TAManage-OHR") {

                // INFO PAGE
                display("/home/2019/slee347/public_html/SOCSTAManagement/manage/matter/TAManage_OHR.html");
            } else if ($_GET["Page"]=="TAManage-performance") {
                
                // INFO PAGE
                display("/home/2019/slee347/public_html/SOCSTAManagement/manage/matter/TAManage_performance.html");
            } else if ($_GET["Page"]=="TAManage-wishlist") {

                // INFO PAGE
                display("/home/2019/slee347/public_html/SOCSTAManagement/manage/matter/TAManage_wishlist.html");
            } else if ($_GET["Page"]=="TAManage-report") {

                // INFO PAGE
                display("/home/2019/slee347/public_html/SOCSTAManagement/manage/matter/TAManage_report.html");
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
                $line = str_replace("USERNAME", $_SESSION["username"], $line);
                $line = str_replace("COURSE", $_GET["Course"], $line);
                $line = str_replace("TERM", $_GET["Term"], $line);
                $line = str_replace("PROF", $_GET["Prof"], $line);
                $line = str_replace("POSITION", $_GET["Position"], $line);
                echo $line;
            }
            
            fclose($file);
        }
        ?>
    </body>
</html>
