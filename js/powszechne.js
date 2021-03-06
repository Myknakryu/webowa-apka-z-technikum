

// służy do usuwania i dodawania elementów
async function wyslij(url, json){
$.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: json,
            success: function(response) {
                    console.log('wrocil ajax');
                    if(response == 'dodano'){
                       return 1;
                    }
                    
            },
            error: function() {
                    alert("Błąd!")
                    return 0;
            }
    });

}
// Wersja z callbackiem
async function wyslijCB(url, json, callback, wart=0){
$.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: json,
            success: function(response) {
                    console.log('wrocil ajax');
                    if(response == 'dodano'){
                    callback(wart);   
                    return 1;
                       
                    }
                    
            },
            error: function() {
                    alert("Błąd!")
                    return 0;
            }
    });

}

// Pobiera formularz na główną stronę
async function formularz(url, elem, callback, wart=0)
{
  
    $.ajax({
            url: url,
            dataType: 'html',
            type: 'GET',
            data: { pom : wart},
            success: function(response) {
                    
                    console.log(response);
                    elem.innerHTML = response;
                    element.appendChild(elem);
                    callback();
                    
            },
            error: function(response) {
                    alert('Wystąpił błąd!\n'+response);
            }
        
    });
}
