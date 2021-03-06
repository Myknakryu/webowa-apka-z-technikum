const selekt = document.getElementById('selektor');

selekt.value=null;

function wyswietl(str) {
    var xhttp;    
    if (str == "") {
      document.getElementById("tekst").innerHTML = "";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tekst").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "pomHasInv.php?q="+str, true);
    xhttp.send();
  }