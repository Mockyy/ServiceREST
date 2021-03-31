<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>JSON</title>
        <link href="style1.css" rel="stylesheet">
        <!--<link href="icon.jpg" rel="icon">-->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <script>
        $(document).ready(function()
        {
            $.get("traitementBDD.php", function(data, status)
            {
                var clients = JSON.parse(data);
                for (var i = 0; i < clients.length; i++)
                {
                    var client = "Numcli : " + clients[i].NCLI + " Nom : " + clients[i].NOM;
                    client = "<li>" + client + "</li>"

                    $("#ListeClients").append(client);
                }
            })
        });

        function ajouterClient()
        {
            //var snum = document.getElementById("ncli")  Javascipt
            var snum = $("#ncli").val();                //JQuery
            var snom = $("#nom").val();
            var sadresse = $("#adresse").val();
            var sloc = $("#loc").val();
            var scat = $("#cat").val();
            var scompte = $("#compte").val();

            var sClient = {
                NCLI : snum,
                NOM : snom,
                ADRESSE : sadresse,
                LOCALITE : sloc,
                CATEGORIE : scat,
                COMPTE : scompte
            };

            $.post("traitementBDD.php", sClient, function(data){
                console.log(data);
            });
        }
    </script>


    <h1>Ajouter client</h1>
    
    <li>NCLI :      <input type="text" id="ncli"></li>
    <li>Nom :       <input type="text" id="nom"></li>
    <li>Adresse :   <input type="text" id="adresse"></li>
    <li>Localite :  <input type="text" id="loc"></li>
    <li>Categorie : <input type="text" id="cat"></li>
    <li>Compte :    <input type="text" id="compte"></li>
    <button onclick="ajouterClient()">Ajouter client</button>

    <ol id="ListeClients">
    </ol>

    

    <?php
        
    ?>


</html>


