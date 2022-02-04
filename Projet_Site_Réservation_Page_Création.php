<html>
    <head>
        <meta charset="utf-8">
        <title>Prixy création</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>
    
    <fieldset class="fieldsetHead_Creation">
            
            <img src="logoPrixy.png" class="imageLogo_Creation">
            
            <img src="profil.png" class="imageProfil_Creation">

            <img src="parametre.png" class="imageParametre_Creation">
    </fieldset>
    
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