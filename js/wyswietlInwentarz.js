

function oknoInwentarzu(wart)
{
    
   
    divek = document.createElement('div');
    divek.id = 'okienko';
    element.appendChild(divek);
    formularz("/php/elementy/inwentarz/dodajInwentarz.php",divek, tworzInwentarz,wart);
         
}

function oknoWlasciciel(wart)
{
    
   
    divek = document.createElement('div');
    divek.id = 'okienko';
    element.appendChild(divek);
    formularz("/php/elementy/inwentarz/nadajForm.php",divek, tworzWlasciciel,wart);
         
}

var dialog, form;

function zapytanie()
{
    var url = '/php/elementy/inwentarz/nowyInwentarz.php';
 
    var nazwa = $("#selektor").val();
    var ilosc = $('#ilosc').val();
    var pomieszczenie = $('#submit').val();
                
    var json = {
                    inw: nazwa,
                    ilo: ilosc,
                    pom: pomieszczenie
            };
    
    if(wyslijCB(url, json,pokazPomieszczenie,pomieszczenie))
         pokazPomieszczenie(pomieszczenie);
    
}

function tworzInwentarz() {

    dialog = $("#dialog-form").dialog({
        height: 350,
        width: 600,
        buttons: {
            "Dodaj do inwentarzu": ()=>{
                
                zapytanie();
                
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

function tworzWlasciciel() {

    dialog = $("#dialog-form").dialog({
        height: 260,
        width: 410,
        buttons: {
            "Zmień właściciela": ()=>{
                
                var url = '/php/elementy/inwentarz/nadajInwentarz.php';
 
                 var user = $("#selektor").val();
                 var pomieszczenie = $('#submit').val();
                 
                var json = {
                    usr: user,
                    pom: pomieszczenie
                };
                if(wyslij(url, json))
         pokazPomieszczenie(pomieszczenie);
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


function otworzOknoInwentarzu(wart) {
        $("#dialog-form").remove();
        $("#okienko").remove();
        oknoInwentarzu(wart);
    
};
function otworzOknoWlasciciel(wart) {
        $("#dialog-form").remove();
        $("#okienko").remove();
        oknoWlasciciel(wart);
    
};
function inwentarzUsun(wart)
{

    var url = "/php/elementy/inwentarz/usunInwentarz.php";
    var json = {
        ele:wart
    }
    if(wyslij(url, json, pokazPomieszczenie, bierzacePomieszczenie))
        pokazPomieszczenie(bierzacePomieszczenie);
}