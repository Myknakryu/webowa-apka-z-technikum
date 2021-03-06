const selekt = document.getElementById('pomieszczenia');

const edytor = document.getElementById('wyswietlacz');


selekt.value = null;

edytor.value=null;
var bierzacePomieszczenie = 0;
function wyswietl(co) {
    selekt.innerHTML=null;
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            selekt.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/php/elementy/inwentarz/pomieszczeniaGen.php?q="+co, true);
    xhttp.send();
}
wyswietl('all');
const element = document.getElementsByTagName('body')[0];

$("input:radio[name='options']").change(()=> {
   wyswietl($("input:radio[name='options']:checked").val());
});

function okno()
{
    divek = document.createElement('div');
    divek.id = 'okienko';
    divek.innerHTML = form;
    element.appendChild(divek);
     form = formularz("/php/elementy/inwentarz/dodajPomieszczenie.php",divek, tworzPomieszczenie);


}

var dialog, form;

function tworzPomieszczenie() {

    dialog = $("#dialog-form").dialog({
        height: 400,
        width: 350,
        buttons: {
            "Dodaj Pomieszczenie": ()=>{
                
                var nazwa = $("#nazwa").val(), nrSali = $("#nrSali").val();     
                var json = {
                    pom: nazwa,
                    kod: nrSali
                };
                var url = "/php/elementy/inwentarz/nowePomieszczenie.php";
                
                if(wyslij(url,json))
                    wyswietl();
                
                dialog.dialog("close");
            },
            Cancel: function () {
                dialog.dialog("close");
            }
        },
        close: () =>{
            dialog.remove();
            $("#okienko").remove();
            
        }
    });

    form = $("#dialog-form").find("form").on("submit", function (event) {
        event.preventDefault();
        tworzPomieszczenie();
    });
}
function otworzOkno() {
        $("#dialog-form").remove();
        $("#okienko").remove();
        okno();
};


function pokazPomieszczenie(val) {
    var xhttp;    
    bierzacePomieszczenie = val;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        edytor.innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "/php/elementy/inwentarz/pomieszczenieEdytor.php?q="+val, true);
    xhttp.send();
  }
  
  function pokazEdytorPom(val) {
    var xhttp;    
    bierzacePomieszczenie = val;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        edytor.innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "/php/elementy/inwentarz/pomieszczenieEdycja.php?q="+val, true);
    xhttp.send();
  }
  function zapisz(val){
      var elementy = document.getElementsByTagName("input");
        let wartDom= $('#listaWart').text().split(',');
        var i = 0;
        var zmienione = {inw:[], ilo:[]};
        var zmiana = false;
    for(var element of elementy)
    {
        if(element.value!=wartDom[i++]){
             
            zmienione.inw.push(element.id.replace(/\D+/g, ''));
            zmienione.ilo.push(element.value);
            zmiana = true;
        }
    }
    i=0;
    if(zmiana)
    {
        aktualizuj(zmienione, val);
    }
    else
        pokazPomieszczenie(val);
}
function aktualizuj(json, val)
{
    var url = "/php/elementy/inwentarz/edytujInwentarz.php";
    wyslijCB(url,json,pokazPomieszczenie, val);
    
}