<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<!-- Open Graph data -->
  <meta property="og:title" content="Fresh Bootstrap Table by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="https://wenzhixin.github.io/fresh-bootstrap-table/full-screen-table.html" />
  <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/31/original/opt_fbt_thumbnail.jpg"/>
  <meta property="og:description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need." />
  <meta property="og:site_name" content="Creative Tim" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
  <link href="assets/css/demo.css" rel="stylesheet" />
  <script src="Funzioni.js"></script>
  <!--   Fonts and icons   -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
  <style>
    .btn {
      background-color: DodgerBlue;
      border: none;
      color: white;
      padding: 12px 16px;
      font-size: 16px;
      cursor: pointer;
    }
    
    /* Darker background on mouse-over */
    .btn:hover {
      background-color: RoyalBlue;
    }
    </style>

   <?php include("class/Student.php");
   session_start();
   ?>
</head>
<body>
<?php 
   $_SESSION["id"] = $_GET["idMod"];
   ?>
    <div>   
        <p style="color:black;font-size:300%;font-family:roboto;">Modifica studente <?php echo $_GET["idMod"];?></p>
        <div style="color:black;"class="fresh-table full-color-orange full-screen-table" >
            <form>
            <label>Name</label>
            <input type="text" id="name" class="form-control" placeholder="insert NAME"   required>
            <label>Surname</label><br>
            <input type="text" id="surname" class="form-control" placeholder="insert SURNAME"	required>
            <label>sidiCode</label>  
            <input type="text" id="SC" class="form-control" placeholder="insert SIDICODE"	required>
             <label >TaxCode</label>
           <input type="text" id="TC" class="form-control" placeholder="insert TAXCODE"	required>
           <button class="btn" onclick="put()">Conferma</button>
           <button type ="reset" class="btn" name="Annulla">Annulla</button>
           </form>
        </div>
    </div>


<script>
  
function put()
{
var xhr = new XMLHttpRequest();
var id = "<?php echo $_SESSION["id"]?>";
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
    var input = document.getElementById("myInput");
    input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
    document.getElementById("myBtn").click();
    }
    });
 
</script>

</body>

</html>
