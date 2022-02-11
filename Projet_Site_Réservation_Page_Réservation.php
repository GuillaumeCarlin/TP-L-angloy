<html>
    
    <head>
        <title>Détails de la réservation</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>

    
    <fieldset class="fieldsetHead_Reservation">   
        <img src="logoPrixy_sf.png" class="imageLogo_Reservation">
        <!-- <img src="profil.png" class="imageProfil_Reservation" type="button"> -->
        <div class="divparametre">
            <ul id="menu-accordeon">
                <li><a href="#"><img src="parametre.png" class="imageParametre_Reservation" ></a>
                    <ul>
                        <li><a href="Projet_Site_Réservation_Page_Connexion.php">Déconnexion</a></li>
                        <li><a href="Projet_Site_Reservation_Page_Compte.php">Création de compte</a></li>
                    </ul>
                </li>
            </ul>
        </div>
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
        
    </body>
</html>