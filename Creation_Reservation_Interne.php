<html>
    <head>
        <meta charset="utf-8">
        <title>Prixy création</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    

        <fieldset class="fieldsetHead">   
                <img src="logoPrixy_sf.png" class="logo_prixy_head">
                <div class="divparametre">
                    <ul id="menu-accordeon">
                        <li><a href="#"><img src="parametre.png" class="imageParametre" ></a>
                            <ul>
                                <li><a href="Projet_Site_Réservation_Page_Connexion.php">Déconnexion</a></li>
                                <li><a href="Projet_Site_Reservation_Page_Compte.php">Création de compte</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </fieldset>
    </head>
    <body class="body">
        <form action="Traitement_Reservation_Interne.php" method="post" name = "formulaire">
            <div class="colonne">
            <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nom de la réservation : <input type='text' id='Reservation_Nom' name='Reservation_Nom' placeholder='Nom de la Reservation' required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Date de la formation : <input type='date' id='Reservation_Date' name='Reservation_Date' required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Heure de Réservation : <input type='number' id='Reservation_Heure' name='Reservation_Heure' min='8' max='18' step='1' size="4" required> heures</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Durée de la formation : <input type='number' id='Reservation_Duree' name='Reservation_Duree' min='1' step='1' max='5' size="4"> heures</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nombre de Participant : <input type='number' id='Reservation_Participant' name='Reservation_Participant' min="0" max="30" required>  / 30</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class="Descriptif" id='Reservation_Descriptif' name='Reservation_Descriptif' placeholder='Description de la Reservation' required></textarea></texte>
                </fieldset>

                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Réservant : <input type='text' id='Formateur' name='Formateur' placeholder='Nom du Formateur'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail : <input type='text' id='AdresseMail' name='AdresseMail' placeholder='Adresse Mail'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone : <input type='text' id='Telephone' name='Telephone' placeholder='Numéros de Téléphone'></texte>
                    </br>
                    </br>
                    </br>                
                </fieldset>
            </div>
            <input type="submit" value="Envoyer" class="BoutonValidation">
        </form>
    </body>
</html>