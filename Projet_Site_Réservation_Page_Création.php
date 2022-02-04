<html>
    <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
    <script>
        function selection(valeur){
            if (valeur == 1){
                document.write("c'est une formation");
            }
            var selection = valeur;
            return valeur
        }
    </script>
    <head>
        <title>Création de la réservation</title>
        <fieldset class="fieldsetHead_Creation">
            <img src="logoPrixy.png" class="imageLogo_Creation">

            <button type="button" class="BoutonProfil_Creation">
            <img src="profil.png" class="imageProfil_Creation">
            </button>

            <button type="button" class="BoutonParametre_Creation">
            <img src="parametre.png" class="imageParametre_Creation">
            </button>
        </fieldset>
    </head>

    <body>
        </br>
        <texte class="Date">Afficher la date de la réservation</texte>
        </br>

        <form action="ton_script.php" method="post" id ="formulaire">
            <!--
            <select name="reservationID" id="reservationID" class="Choix_Creation">
                <option value="Formation" onclick="$selection=1">Formation</option>
                <option value="Réservation Interne" onclick="$selection=2">Réservation Interne</option>
                <option value="Réservation externe" onclick="$selection(3)" >Réservation externe</option>
            </select>
            -->
            <input type="button" id="Formulaire" placeholder="Formulaire" onclick="$selection=selection(1)">
            <input type="button" id="interne" placeholder="interne" onclick="$selection=selection(2)">
            <input type="button" id="externe" placeholder="externe" onclick="$selection=selection(3)">



            </br>
            <div id="Colonne">
                <fieldset class="FieldsetFormation_Creation">
                    <div id="test">
                        </br>
                        <texte class="Question_Creation">Formateur : <input type="text" id="Formateur" name="Formateur" placeholder="Nom du Formateur"></texte>
                        </br>
                        </br>
                        <texte class="Question_Creation">Adresse Mail : <input type="text" id="AdresseMail" name="AdresseMail" placeholder="Adresse Mail"></texte>
                        </br>
                        </br>
                        <texte class="Question_Creation">Téléphone : <input type="text" id="Telephone" name="Telephone" placeholder="Numéros de Téléphone"></texte>
                    </div>
                </fieldset>
            </div>
        </form>
        <?php
        /* $selection=$_POST["reservationID"]; */
        if ($selection == 1){
            echo "La reservation choisis est une formation";
        }
        else if ($selection == 2){
            echo "La reservation choisis est une réservation externe";
        }
        else if ($selection == 3){
            echo "La reservation choisis est une réservation interne";
        }
        ?>
    </body>
</html>