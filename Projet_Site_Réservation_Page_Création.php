<html>
    <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
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
        <div class="Positionnement">
            </br>
            <texte class="Date">Afficher la date de la réservation</texte>
            </br>
            </br>

            <form action="Traitement_Creation.php" method="post" name ="formulaire">
                
            <input type="radio" name = "choix"  id="Formation" value="Formation" required> Formation </br> 
            <input type="radio" name = "choix"  id="Reservation_interne" value="Reservation_interne"  required> Reservation_interne </br>
            <input type="radio" name = "choix"  id="Reservation_externe" value="Reservation_externe"  required> Reservation_externe </br>
            </br>
        </div>

        <fieldset class="fieldsetFormation_Base">
        <texte class='Question_Creation_Base'> Nom de la réservation : <input type='text' id='Reservation_Nom' name='Reservation_Nom' placeholder='Nom de la Reservation'></texte>
        </br>
        </fieldset>
        <input type="submit" value="Envoyer" class="BoutonValidation">
        </form>
        </br>
    </body>
</html>