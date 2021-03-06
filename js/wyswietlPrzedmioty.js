const selekt = document.getElementById("wynik");
function wyswietl(el) {
    selekt.innerHTML=null;
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            selekt.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/php/elementy/"+el+"/"+el+".php", true);
    xhttp.send();
}
