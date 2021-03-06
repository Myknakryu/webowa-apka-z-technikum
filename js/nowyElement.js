function oknoElementu()
{
    divek = document.createElement('div');
    divek.id = 'okienko';
    element.appendChild(divek);
    formularz("/php/elementy/przedmioty/dodajElement.php",divek, tworzElement);

}

function podgladElem(elem)
{
    divek = document.createElement('div');
    divek.id = 'okienko';
    element.appendChild(divek);
    formularz("/php/elementy/przedmioty/podglElement.php",divek, rysujElement,elem);
}

var dialog, form;

function rysujElement() {

    dialog = $("#dialog-form").dialog({
        height: 515,
        width: 520,
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

function tworzElement() {

    dialog = $("#dialog-form").dialog({
        height: 400,
        width: 400,
        buttons: {
            "Dodaj przedmiot": ()=>{
                
                var nazwa = $("#nazwa").val();
                var producent = $("#producent").val();
                var gwarancja = $("#gwarancja").is(':checked')?1:0;
                var kategoria = $('#selektor').val();
                
                var json = {
                    ele: nazwa,
                    prod: producent,
                    kat: kategoria,
                    gwa: gwarancja
                }
                var url = "/php/elementy/przedmioty/nowyElement.php";
                
                if(wyslijCB(url,json,wyswietl, 'przedmioty'))
                    wyswietl('przedmioty');
                
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
function otworzOknoElementu() {
        $("#dialog-form").remove();
        $("#okienko").remove();
        oknoElementu();

};
function elementPodglad(element) {
        $("#dialog-form").remove();
        $("#okienko").remove();
        podgladElem(element);
        
};

function elementUsun(wart)
{
                var json = { ele : wart}
                var url = "/php/elementy/przedmioty/usunElement.php";
                
                if(wyslij(url,json))
                    wyswietl('przedmioty');
}