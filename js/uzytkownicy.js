
function reload()
{
    location.reload();
}

var elementy = document.getElementsByTagName("select");
let uprawnieniaDom= $('#listaUpr').text().split(',');
var i = 0;
for(var element of elementy) {
    
    element.value=uprawnieniaDom[i++];
    if(uprawnieniaDom[i-1]==="")
    {
        uprawnieniaDom[i-1]="NULL";
        element.value="NULL";
    };
}
i=0;
function porownanie()
{

    var zmienione = {usr:[], upr:[]};
    var zmiana = false;
    for(var element of elementy)
    {
        if(element.value!=uprawnieniaDom[i++]){
            zmienione.usr.push(element.id.replace(/\D+/g, ''));
            zmienione.upr.push(element.value);
            zmiana = true;
        }
    }
    i=0;
    if(zmiana)
    {
        aktualizuj(zmienione);
    }
}
function aktualizuj(json)
{
    var url = "/php/elementy/aktualizacjaUprawnien.php";
    wyslij(url,json,reload);
    
}
