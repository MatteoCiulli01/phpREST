function get()
{
    var xhr = new XMLHttpRequest();

    xhr.open("GET", 'http://localhost:84/phprest/api.php', true);
    //invio la richista ajax
    xhr.onload = function() {
  //scrivo la risposta nel body della pagina
    document.getElementById('risposta').innerHTML = xhr.response;
    };
    xhr.onerror = function(error) { 
        alert('Errore');
    };
    xhr.send();
}

function getId(id)
{
//preparo la richiesta ajax
var xhr = new XMLHttpRequest();

xhr.open("GET",'http://localhost:84/phprest/api.php?id='+id, true);
//invio la richista ajax
xhr.onload = function() {
    //scrivo la risposta nel body della pagina
    document.getElementById('risposta').innerHTML = xhr.response;
};
xhr.onerror = function(error) { 
    alert('Errore');
};
xhr.send(); 
}

function Delete(id)
{
//preparo la richiesta ajax
var xhr = new XMLHttpRequest();
//sincorna
xhr.open("DELETE",'http://localhost:84/phprest/api.php?id='+id, true);
xhr.onload = function() {
    //scrivo la risposta nel body della pagina
    document.getElementById('rispostaId').innerHTML = xhr.response;
};
alert("Canellazione riuscita");
//invio la richista ajax
xhr.onerror = function(error) { 
    alert('Errore');
};
xhr.send();
}


function post()
{
var xhr = new XMLHttpRequest();
var name = document.getElementById('name').value;
var surname = document.getElementById('surname').value;
var SC = document.getElementById('SC').value;
var TC = document.getElementById('TC').value;
//asincrona
xhr.open("POST",'http://localhost:84/phprest/api.php', true);
//configuro la callback di risposta ok
xhr.onload = function(message) {
    //scrivo la risposta nel body della pagina
    document.getElementById('insert').innerHTML = xhr.response;
};
//configuro la callback di errore
xhr.onerror = function(error) { 
    alert('Errore');
};
//invio la richista ajax
xhr.send(JSON.stringify({
"name":name,
"surname":surname,
"SC":SC,
"TC":TC    
}));
}

function put()
{
var xhr = new XMLHttpRequest();
var id = document.getElementById('idI').value;
var name = document.getElementById('name').value;
var surname = document.getElementById('surname').value;
var SC = document.getElementById('SC').value;
var TC = document.getElementById('TC').value;
//asincrona
xhr.open("PUT",'http://localhost:84/phprest/api.php', true);
//configuro la callback di risposta ok
xhr.onload = function(message) {
    //scrivo la risposta nel body della pagina
    document.getElementById('insert').innerHTML = xhr.response;
};
//configuro la callback di errore
xhr.onerror = function(error) { 
    alert('Errore');
};
//invio la richista ajax
xhr.send(JSON.stringify({
"id":id,
"name":name,
"surname":surname,
"SC":SC,
"TC":TC    
}));
}

function patch()
{
var xhr = new XMLHttpRequest();
var id = document.getElementById('idI').value;
var name = document.getElementById('name').value;
var surname = document.getElementById('surname').value;
var SC = document.getElementById('SC').value;
var TC = document.getElementById('TC').value;
//asincrona
xhr.open("PATCH",'http://localhost:84/phprest/api.php', true);
//configuro la callback di risposta ok
xhr.onload = function(message) {
    //scrivo la risposta nel body della pagina
    document.getElementById('insert').innerHTML = xhr.response;
};
//configuro la callback di errore
xhr.onerror = function(error) { 
    alert('Errore');
};
//invio la richista ajax
xhr.send(JSON.stringify({
"id":id,
"name":name,
"surname":surname,
"SC":SC,
"TC":TC    
}));
}