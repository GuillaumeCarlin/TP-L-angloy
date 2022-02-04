<html>
    
    <head>
        <title>Détails de la réservation</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>

    
    <fieldset class="fieldsetHead_Reservation">
            <img src="logoPrixy.png" class="imageLogo_Reservation">
            <img src="profil.png" class="imageProfil_Reservation" type="button">
            <!-- ------------------------------------------------------------------------------------ -->
            <!-- ------------------------------------------------------------------------------------ -->
            <!-- ------------------------------------------------------------------------------------ -->

            <img src="parametre.png" onclick=parametre() class="imageParametre_Reservation">
            
    </fieldset>
    
    <body>
        <texte class="Date_Reservation">Afficher la date de la réservation</texte>
        </br>
        <fieldset class="fieldsetPrincipal_Reservation">
            <h1 class="NomReservation_Reservation">Nom de la réservation</h1>
            <texte class="TypeReservation_Reservation">Type de la réservation</texte>
            <fieldset class="fieldsetSecondaire_Reservation">
                <texte>Client : </texte>
                </br>
                <texte>Entreprise : </texte>
                </br>
                <texte>Adresse : </texte>
                </br>
                <texte>Code Postal : </texte>
                </br>
                <texte>Adresse Mail : </texte>
                </br>
                <texte>Téléphone : </texte>
                </br>
            </fieldset>
            </br>
            <texte>Nombre de participant : </texte>
        </fieldset>
        <?php 
            
            if ($parametre){
                echo"ca marhce";
            }
        ?>
    </body>
</html>