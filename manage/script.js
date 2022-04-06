var selection = document.getElementById("TA");
selection.addEventListener("change", function(){
  var TA = selection.options[selection.selectedIndex].text;

  var table = document.getElementById("notes");
  table.setAttribute("style","visibility:visible");
  for (var i in table.rows) {
    if(i==0) table.rows[0].setAttribute("style", "visibility:visible");
    else{
      var row = table.rows[i];
      var name = row.cells[2].innerHTML;
      if(name===TA) row.setAttribute("style", "visibility:visible");
      else row.setAttribute("style","display:none");
    }
  }
});