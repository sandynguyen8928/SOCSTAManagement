<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
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
      <p><a href="../manage/index.html" class="navtitle">Manage TA</a></p>
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
        if(sizeof($_GET)>=2) {
          echo "Select a teacher: <select id=\"TA\">
          <option></option>";
        
          $file = fopen("report.csv", "r") or die("Unable to open file");
          $rows = array();
          while(!feof($file)){
            array_push($rows, fgetcsv($file));
          }
          
          $TAs = array();
          foreach($rows as $entry){
            $name = $entry[2];
            if($entry[1]===$_GET["Course"] && !in_array($name, $TAs)) {
              array_push($TAs, $entry[2]);
              echo "<option>".$entry[2]."</option>";
            }
          }
          echo "</select>";
          
          if(isset($_GET["TA"]) && isset($_GET["Comment"])) {
            echo "<p>&nbsp;</p><p>\"".$_GET["Comment"]."\" submitted as a comment for ".$_GET["TA"]."!</p>";
          }
          fclose($file);
        } else echo "Submitted!";
      ?>
      <p>&nbsp;</p>
      <table id="schedule" style="display:none">
        <thead><th></th><th>MON</th><th>TUE</th><th>WED</th><th>THU</th><th>FRI</th></thead>
        <tr><th>8:00</th><td class="unclaimed" id="Monday 8-9am"></td><td class="unclaimed" id="Tuesday 8-9am"></td><td class="unclaimed" id="Wednesday 8-9am"></td><td class="unclaimed" id="Thursday 8-9am"></td><td class="unclaimed" id="Friday 8-9am"></td></tr>
        <tr><th>9:00</th><td class="unclaimed" id="Monday 9-10am"></td><td class="unclaimed" id="Tuesday 9-10am"></td><td class="unclaimed" id="Wednesday 9-10am"></td><td class="unclaimed" id="Thursday 9-10am"></td><td class="unclaimed" id="Friday 9-10am"></td></tr>
        <tr><th>10:00</th><td class="unclaimed" id="Monday 10-11am"></td><td class="unclaimed" id="Tuesday 10-11am"></td><td class="unclaimed" id="Wednesday 10-11am"></td><td class="unclaimed" id="Thursday 10-11am"></td><td class="unclaimed" id="Friday 10-11am"></td></tr>
        <tr><th>11:00</th><td class="unclaimed" id="Monday 11am-12pm"></td><td class="unclaimed" id="Tuesday 11am-12pm"></td><td class="unclaimed" id="Wednesday 11am-12pm"></td><td class="unclaimed" id="Thursday 11am-12pm"></td><td class="unclaimed" id="Friday 11am-12pm"></td></tr>
        <tr><th>12:00</th><td class="unclaimed" id="Monday 12-1pm"></td><td class="unclaimed" id="Tuesday 12-1pm"></td><td class="unclaimed" id="Wednesday 12-1pm"></td><td class="unclaimed" id="Thursday 12-1pm"></td><td class="unclaimed" id="Friday 12-1pm"></td></tr>
        <tr><th>13:00</th><td class="unclaimed" id="Monday 1-2pm"></td><td class="unclaimed" id="Tuesday 1-2pm"></td><td class="unclaimed" id="Wednesday 1-2pm"></td><td class="unclaimed" id="Thursday 1-2pm"></td><td class="unclaimed" id="Friday 1-2pm"></td></tr>
        <tr><th>14:00</th><td class="unclaimed" id="Monday 2-3pm"></td><td class="unclaimed" id="Tuesday 2-3pm"></td><td class="unclaimed" id="Wednesday 2-3pm"></td><td class="unclaimed" id="Thursday 2-3pm"></td><td class="unclaimed" id="Friday 2-3pm"></td></tr>
        <tr><th>15:00</th><td class="unclaimed" id="Monday 3-4pm"></td><td class="unclaimed" id="Tuesday 3-4pm"></td><td class="unclaimed" id="Wednesday 3-4pm"></td><td class="unclaimed" id="Thursday 3-4pm"></td><td class="unclaimed" id="Friday 3-4pm"></td></tr>
        <tr><th>16:00</th><td class="unclaimed" id="Monday 4-5pm"></td><td class="unclaimed" id="Tuesday 4-5pm"></td><td class="unclaimed" id="Wednesday 4-5pm"></td><td class="unclaimed" id="Thursday 4-5pm"></td><td class="unclaimed" id="Friday 4-5pm"></td></tr>
        <tr><th>17:00</th><td class="unclaimed" id="Monday 5-6pm"></td><td class="unclaimed" id="Tuesday 5-6pm"></td><td class="unclaimed" id="Wednesday 5-6pm"></td><td class="unclaimed" id="Thursday 5-6pm"></td><td class="unclaimed" id="Friday 5-6pm"></td></tr>
      </table>
      <p>&nbsp;</p>
      <form action="writeOHR.php" id="form" style="display:none" method="post">
        <input type="hidden" value="<?php echo $_GET["Course"]?>" name="Course"></input>
        <input type="hidden" value="<?php echo $_GET["Term"]?>" name="Term"></input>
        <input type="hidden" id="name" name="Name"></input>
        Time: <p id="OHText"></p><input type="hidden" id="OH" name="Hours"></input><br>
        Preferred email:<input type="email" placeholder="@mcgill.ca or @mail.mcgill.ca" name="Email"><br>
        Position: <select name="Position">
          <option></option>
          <option>Instructor</option>
          <option>Teaching Assistant</option>
          <option>Course Assistant</option>
        </select><br>
        Job: <select name="Job">
          <option></option>
          <option>Lecture</option>
          <option>Office Hour</option>
          <option>Tutorial</option>
        </select><br>
        Location: <input type="text" name="Location"></input><br>
        Other responsibilities: <br><textarea name="Responsibilities"></textarea>
        <input type="submit" value="Submit"></input>
      </form>
    </div>
  </div>

  <script>
    var selection = document.getElementById("TA");
    selection.addEventListener("change", function(){
      var TA = selection.options[selection.selectedIndex].text;
      showSchedule();
      document.getElementById("form").setAttribute("style","display:block");
      document.getElementById("name").setAttribute("value",TA);
    });

    var OHTable = document.getElementsByClassName("unclaimed");
    var OHText = document.getElementById("OHText");
    var OHInput = document.getElementById("OH");
    for(var time of OHTable){
      time.onclick = function(){
        var newValue = OHInput.value;
        if(this.getAttribute("class")==="unclaimed") {
          this.setAttribute("class", "claimed");

          if(newValue.length>0) newValue += "; ";
          newValue += this.id;

          var selectedTime = document.createElement("p");
          selectedTime.id = this.id;
          selectedTime.innerHTML = this.id;
          OHText.appendChild(selectedTime);
        }
        else {
          this.setAttribute("class", "unclaimed");
          for(child of OHText.children){
            if(child.id===this.id) OHText.removeChild(child);
          }

          newValue = newValue.replace(this.id, "");
          
          if(newValue.includes("; ;")) newValue = newValue.replace("; ; ", "; ");
          if(newValue.startsWith("; ")) newValue = newValue.replace("; ", "");
          if(newValue.endsWith("; ")) newValue = newValue.replace("; ", "");
        }
        OHInput.setAttribute("value", newValue);
      }
    }

    function showSchedule(){
      document.getElementById("schedule").setAttribute("style","display:block");

      try{
        var asyncReq = new XMLHttpRequest();
        asyncReq.addEventListener("readystatechange", function(){
          if(asyncReq.readyState==4 && asyncReq.status==200){
            var text = this.responseText;
            var entries = new Array();
            var entry = "";
            for(var i=0; i<text.length; i++){
              if(text[i]==="\n") {
                entries.push(entry);
                entry="";
              }
              else entry+=text[i];
            }
            entries.push(entry);
            for(var i=1; i<entries.length; i++){
              var data = entries[i].split(',');
              var OH = data[6].replace(/\"/g,"");
              var times = OH.split("; ");
              for(time of times){
                var node = document.getElementById(time);
                node.setAttribute("class","claimed");
                node.innerHTML = data[2]+"<br>"+data[5];
              }
            }
          }
        });
        asyncReq.open("GET", "OHR.csv", true);
        asyncReq.send();
      } catch (exception) {
        alert("Request failed.");
      }
    }
  </script>

  <?php
  if(sizeof($_GET)==1){
    echo '<script>',
    'showSchedule();',
    '</script>';
  }
  ?>
</body>

</html>