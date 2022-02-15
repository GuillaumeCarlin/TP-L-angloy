<html>
    <head>
        <meta charset="utf-8">
        <title>Prixy création</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>

    <fieldset class="fieldsetHead">   
            <img src="logoPrixy_sf.png" class="imageLogo_Reservation">
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

    <body class="body">
        <form action="Traitement_Reservation_Externe.php" method="post" name = "formulaire">
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
                    <texte class='Question_Creation_Base'> Heure de Réservation : <input type='time' id='Reservation_Heure' name='Reservation_Heure' min='8:00' max='18:00' step='3600' required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Durée de la formation : <input type='time' id='Reservation_Duree' name='Reservation_Duree' min='1:00' step='3600' max='5:00' > </texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nombre de Participant : <input type='number' id='Reservation_Nom' name='Reservation_Nom' min="0" max="30" required>  / 30</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class="Descriptif" id='Reservation_Nom' name='Reservation_Nom' placeholder='Description de la Reservation' required></textarea></texte>
                </fieldset>

                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Nom du client : <input type='text' id='NomClient' name='NomClient' placeholder='Nom du Client'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Entreprise : <input type='text' id='Entreprise' name='Entreprise' placeholder='Entreprise'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse : <input type='text' id='Adresse' name='Adresse' placeholder='Adresse du Client'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Code Postal : <input type='text' id='CodePostal' name='CodePostal' placeholder='Code Postal'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Ville : <input type='text' id='Ville' name='Ville' placeholder='Ville'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail : <input type='email' id='Mail' name='Mail' placeholder='Adresse Mail'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone : <input type='text' id='Telephone' name='Telephone' placeholder='Numéros de Téléphone'></texte>
                    </br>
                    </br>
                </fieldset>
            </div>
            <input type="submit" value="Envoyer" class="BoutonValidation">
        </form>
    </body>
</html>