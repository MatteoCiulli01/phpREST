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
    get();
};
alert("Canellazione riuscita");
//invio la richista ajax
xhr.onerror = function(error) { 
    alert('Errore');
};
xhr.send();
}

function put(id)
{
alert(id);
var xhr = new XMLHttpRequest();
var name = document.getElementById('name').value;
var surname = document.getElementById('surname').value;
var SC = document.getElementById('SC').value;
var TC = document.getElementById('TC').value;
//asincrona
xhr.open("PUT",'http://localhost:84/phprest/api.php', true);
//configuro la callback di risposta ok
xhr.onload = function(message) {
    //scrivo la risposta nel body della pagina
    location.href="home.html";
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
function post()
{
var xhr = new XMLHttpRequest();
var name = document.getElementById('nameP').value;
var surname = document.getElementById('surnameP').value;
var SC = document.getElementById('SCP').value;
var TC = document.getElementById('TCP').value;
alert(name);
alert(surname);
alert(SC);
alert(TC);
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
"nameP":name,
"surnameP":surname,
"SCP":SC,
"TCP":TC    
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
function AddDiv()
{
    var x = document.getElementById("myADD");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}
function ModDiv(id)
{
    var x = document.getElementById("myDIV");
    document.getElementById("id").innerHTML = id;

    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}