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