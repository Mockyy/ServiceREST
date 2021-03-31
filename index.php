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
        /////--JQUERY--/////
        $(document).ready(function()
        {
            $.get("traitementBDD.php", function(data, status)
            {
                var clients = JSON.parse(data);
                for (var i = 0; i < clients.length; i++)
                {
                    var client = "Numcli : " + clients[i].NCLI + " Nom : " + clients[i].NOM;
                    client = "<li class=\"elem\">" + client + "</li>"

                    $("#ListeClients").append(client);
                }
            })
        });

        var listeElem = document.getElementsByClassName("elem");
        for (var i = 0; i < listeElem; i++)
        {
            listeElem[i].addEventListener('click', confirmDelete);
        }

        function confirmDelete()
        {
            alert();
        }

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

            ////--JQUERY--////
            $.post("traitementBDD.php", sClient, function(data){
                console.log(data);
            });
        }
    </script>


    <h1>Ajouter client</h1>
    
    <li>
        <label for="ncli">NCLI :</label>
        <input type="text" id="ncli" name="ncli">
    </li>
    <li>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
    </li>
    <li>
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse">
    </li>
    <li>
        <lavel for="localite">Localite :</label>
        <input type="text" id="loc" name="localite">
    </li>
    <li>
        <label for="categorie">Categorie :</label>
        <input type="text" id="cat" name="categorie">
    </li>
    <li>
        <label for="compte">Compte :</label>
        <input type="text" id="compte" name="compte">
    </li>
    <button onclick="ajouterClient()">Ajouter client</button>

    <ol id="ListeClients">
    </ol>

    

    <?php
        
    ?>


</html>


