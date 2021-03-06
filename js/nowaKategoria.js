const element = document.getElementsByTagName('body')[0];
function oknoKategorii()
{
    divek = document.createElement('div');
    divek.id = 'okienko';
    element.appendChild(divek);
    formularz("/php/elementy/kategorie/dodajKategorie.php",divek, tworzKategorie);
}

function podgladKat(kategoria)
{
    divek = document.createElement('div');
    divek.id = 'okienko';
    element.appendChild(divek);
    formularz("/php/elementy/kategorie/podglKategorie.php",divek, rysujKategorie,kategoria);
}

var dialog, form;

function rysujKategorie() {

    dialog = $("#dialog-form").dialog({
        height: 430,
        width: 450,
        buttons: {
            "Ok": function () {
                $(this).dialog("close");
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

function tworzKategorie() {

    dialog = $("#dialog-form").dialog({
        height: 400,
        width: 350,
        buttons: {
            "Dodaj Kategorię": ()=>{
                var nazwa = $("#nazwa").val();     
                var json = { kat:nazwa };
                var url = "/php/elementy/kategorie/nowaKategoria.php";
                
                if(wyslijCB(url,json,wyswietl,'kategorie'))
                    wyswietl('kategorie');
                dialog.dialog("close");
            },
            Cancel: function () {
                $(this).dialog("close");
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
function otworzOknoKategorii() {
        $("#dialog-form").remove();
        $("#okienko").remove();
        oknoKategorii();
        
};

function kategoriaPodglad(kategoria) {
        $("#dialog-form").remove();
        $("#okienko").remove();
        podgladKat(kategoria);
        
};

function kategoriaUsun(wart)
{
    var json = { kat : wart }
    var url = "/php/elementy/kategorie/usunKategoria.php";

    if(wyslij(url,json))
        wyswietl('kategorie');
}