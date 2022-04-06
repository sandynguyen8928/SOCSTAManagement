<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title> SOCS TA Management </title>
</head>

<body>
    <!---------------- HEADER --------------> 
    <div class="header">
        <h1>SOCS TA MANAGEMENT</h1>
        <p class="subtitle">McGill | School of Computer Science</p>
    </div>

    <!----------------- NAV BAR -------------->
  <div class="nav">
    <div class="navItem" id="rate">
      <p><a href="../rate/index.html" class="navtitle">Rate a TA</a></p>
    </div>

    <div class="navItem" id="manage">
      <p><a href="index.html" class="navtitle">Manage TA</a></p>
    </div>

    <div class="navItem" id="admin">
      <p><a href="../admin/index.html" class="navtitle">Administration</a></p>
    </div>

    <div class="navItem" id="sysop">
      <p><a href="../sysop/index.html" class="navtitle">System Operator</a></p>
    </div>

    <div class="navItem" id="logout">
      <p class="navtitle">Logout</p>
    </div>
  </div>
  
    <!----------------- BODY ----------------->
  <div class="body">
    <div class="message">
      <?php
        $term = $_GET["Term"];
        $course = $_GET["Course"];

        echo "Select a TA: <select id=\"TA\">
        <option></option>";
        $file = fopen("performance.csv", "r") or die("Unable to open file");
        $rows = array();
        while(!feof($file)){
          array_push($rows, fgetcsv($file));
        }
        
        $TAs = array();
        foreach($rows as $entry){
          $name = $entry[2];
          if($entry[1]===$course && !in_array($name, $TAs)) {
            array_push($TAs, $entry[2]);
            echo "<option>".$entry[2]."</option>";
          }
        }
        echo "</select>";

        if(isset($_GET["TA"]) && isset($_GET["Comment"])) {
          echo "<p>&nbsp;</p><p>\"".$_GET["Comment"]."\" submitted as a comment for ".$_GET["TA"]."!</p>";
        }
        echo "<p>&nbsp;</p>
        <form action=\"writeCSV.php\" id=\"form\" style=\"display:none\" method=\"post\">
          <input type=\"hidden\" value=$course name=\"Course\"></input>
          <input type=\"hidden\" value=$term name=\"Term\"></input>
          <input type=\"hidden\" id=\"name\" name=\"TA\"></input>
          <textarea id=\"textbox\" name=\"Comment\"></textarea>
          <input type=\"submit\" value=\"Submit\"></input>
        </form>";
        fclose($file);
      ?>
    </div>
  </div>

  <style>
    tr{
      background: rgba(164,156,164,0.1);
    }
    tr:hover{
      background: rgba(164,156,164,0.5);
    }
    tr:first-child:hover{
      background: rgba(164,156,164,0.1);
    }
    th, td{
      border: 1px solid #4A524A;
      padding: 5px;
    }
    table{
      border: 5px solid #A49CA4;
    }
  </style>

  <script>
    var selection = document.getElementById("TA");
    selection.addEventListener("change", function(){
      var TA = selection.options[selection.selectedIndex].text;
      document.getElementById("form").setAttribute("style","display:block");
      document.getElementById("name").setAttribute("value",TA);
      document.getElementById("textbox").setAttribute("placeholder","Please write a comment for "+TA);
    });
  </script>
</body>

</html>