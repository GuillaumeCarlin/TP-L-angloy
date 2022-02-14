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
        <form action="" method="post" name = "formulaire">
            <div class="colonne">
                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nom de la réservation : <input type='text' id='Reservation_Nom' name='Reservation_Nom' placeholder='Nom de la Reservation' required></texte>
                    </br>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nombre de Participant : <input type='number' id='Reservation_Nom' name='Reservation_Nom' min="0" max="30" required>  / 30</texte>
                    </br>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class="Descriptif" id='Reservation_Nom' name='Reservation_Nom' placeholder='Nom de la Reservation' required></textarea></texte>
                </fieldset>

                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Formateur : <input type='text' id='Formateur' name='Formateur' placeholder='Nom du Formateur' required></texte>
                    </br>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail : <input type='text' id='AdresseMail' name='AdresseMail' placeholder='Adresse Mail' required></texte>
                    </br>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone : <input type='text' id='Telephone' name='Telephone' placeholder='Numéros de Téléphone' required></texte>
                </fieldset>
            </div>
            <input type="submit" value="Envoyer" class="BoutonValidation">
        </form>
    </body>
</html>