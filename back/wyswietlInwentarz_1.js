function oknoInwentarzu(wart)
{
    divek = document.createElement('div');
    divek.id = 'okienko';
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            divek.innerHTML = this.responseText;
        }
    };
    element.appendChild(divek);
    xhttp.open("GET", "elementy/dodajInwentarz.php?pom="+wart, true);
    xhttp.send();

}

var dialog, form;

function tworzInwentarz() {

    dialog = $("#dialog-form").dialog({
        height: 400,
        width: 400,
        buttons: {
            "Dodaj Element": ()=>{
                var nazwa = $("#selektor").val();
                var ilosc = $('#ilosc').val();
                var pomieszczenie = $('#submit').val();
                var insert;
                var url = "elementy/nowyInwentarz.php?inw="+nazwa + '&ilo='+ilosc+'&pom='+pomieszczenie;
                insert = new XMLHttpRequest();
                insert.open("GET", url, true);
                insert.send();
                wyswietl('przedmioty');
                
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
function otworzOknoInwentarzu(wart) {
    
        oknoInwentarzu(wart);
    setTimeout(function () {
    tworzInwentarz();
    dialog = $("#dialog-form");
    $("#dialog-form").dialog("open");
    //    dialog.show();
    },200);
};
function inwentarzUsun(wart)
{
    var insert;
                var url = "elementy/usunInwentarz.php?ele="+wart;
                
                insert = new XMLHttpRequest();
                insert.open("GET", url, true);
                insert.send();
                wyswietl('przedmioty');
}