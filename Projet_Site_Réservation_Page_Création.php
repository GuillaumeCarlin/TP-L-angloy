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
        <div class="Positionnement">
            </br>
            <texte class="Date">Afficher la date de la réservation</texte>
            </br>
            <form action="Traitement_Creation.php" method="post" name ="formulaire">
            <fieldset class="fieldsetChoix">
                </br>
                <input type="radio" name = "choix"  id="Formation" value="Formation" onchange="this.form.submit();" required> Formation </br> 
                <input type="radio" name = "choix"  id="Reservation_interne" value="Reservation_interne" onchange="this.form.submit();" required> Reservation_interne </br>
                <input type="radio" name = "choix"  id="Reservation_externe" value="Reservation_externe" onchange="this.form.submit();" required> Reservation_externe </br>
            </fieldset>
        </div>

        <fieldset class="fieldsetFormation_Base">
        </br>
        <texte class='Question_Creation_Base'> Nom de la réservation : <input type='text' id='Reservation_Nom' name='Reservation_Nom' placeholder='Nom de la Reservation'></texte>
        </br>
        </br>
        <texte class='Question_Creation_Base'> Nombre de Participant : <input type='number' id='Reservation_Nom' name='Reservation_Nom' min="0" max="30" >  / 30</texte>
        </br>
        </br>
        <texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class="Descriptif" id='Reservation_Nom' name='Reservation_Nom' placeholder='Nom de la Reservation' ></textarea></texte>
        </fieldset>
        <input type="submit" value="Envoyer" class="BoutonValidation">
        </form>
        </br>
    </body>
</html>