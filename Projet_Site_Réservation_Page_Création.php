<html>
    <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
    <head>
        <title>Création de la réservation</title>
        <fieldset class="fieldsetHead_Creation">
            <img src="logoPrixy.png" class="imageLogo_Creation">

            <!-- <button type="button" class="BoutonProfil_Creation"> -->
            <img src="profil.png" class="imageProfil_Creation">
            </button>

<<<<<<< HEAD
            <button type="button" onclick=<?php test() ?> class="BoutonParametre_Creation">
=======
            <!-- <button type="button" class="BoutonParametre_Creation"> -->
>>>>>>> 10d205e70c02737a9fe9d4fd65341adbfb20f550
            <img src="parametre.png" class="imageParametre_Creation">
            </button>
            <?php
                function test(){
                    echo"test reussi";
                }
            ?>
        </fieldset>
    </head>

    <body>
        </br>
        <texte class="Date">Afficher la date de la réservation</texte>
        </br>

        <form action="Traitement_Creation.php" method="post" name ="formulaire">
            
        <input type="radio" name = "choix"  id="Formation" value="Formation"> Formation </br> 
        <input type="radio" name = "choix"  id="Reservation_interne" value="Reservation_interne"  > Reservation_interne </br>
        <input type="radio" name = "choix"  id="Reservation_externe" value="Reservation_externe"  > Reservation_externe </br>
        <input type="submit" value="Envoyer">
        </form>
        </br>
    </body>
</html>