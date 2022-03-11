<html>
    <?php
        function affichage($a) {
            if ($a == 1)
            echo "<div id='Colonne'>
                    <form action='Traitement_Creation.php' method='post' name ='formulaire2'>
                        <fieldset class='FieldsetFormation_Creation'>
                            <div id='test'>
                                </br>
                                <texte class='Question_Creation'>Formateur : <input type='text' id='Formateur' name='Formateur' placeholder='Nom du Formateur' required></texte>
                                </br>
                                </br>
                                <texte class='Question_Creation'>Adresse Mail : <input type='text' id='AdresseMail' name='AdresseMail' placeholder='Adresse Mail'></texte>
                                </br>
                                </br>
                                <texte class='Question_Creation'>Téléphone : <input type='text' id='Telephone' name='Telephone' placeholder='Numéros de Téléphone'></texte>
                            </div>
                        </fieldset>
                    </form>
                </div>";
        }
    ?>
    <head>
        <meta charset="utf-8">
        <title>Prixy création</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>
    
    <?php
    session_start();
    $utilisateur = $_SESSION["utilisateur"];
    $administrateur = $_SESSION["administrateur"];
    ?>

    <fieldset class="fieldsetHead">   
    <img src="logoPrixy_sf.png" class="logo_prixy_head">
    <div class="divparametre">
        <ul id="menu-accordeon">
            <li><a href="#"><img src="parametre.png" class="imageParametre" ></a>
                <ul>
                    <li><a href="Projet_Site_Réservation_Page_Connexion.php">Déconnexion</a></li>
                    <?php
                        if ($administrateur==1){
                            echo'<li><a href="Projet_Site_Reservation_Page_Compte.php">Gestion de compte</a></li>';
                        }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
  </fieldset>
    
    <body class="body">
        <div class="Positionnement">
            </br>
            <texte class="Date">Afficher la date de la réservation</texte>
            </br>
            
            <form action="Traitement_Creation.php" method="post" name ="formulaire">
            <fieldset class="fieldsetChoix">
                </br>
                <input type="radio" name = "choix"  id="Formation" value="Formation" onclick="<?php affichage(4); ?>" required> Formation </br> 
                <input type="radio" name = "choix"  id="Reservation_interne" value="Reservation_interne" onclick="<?php affichage(4); ?>" required> Reservation_interne </br>
                <input type="radio" name = "choix"  id="Reservation_externe" value="Reservation_externe" onclick="<?php affichage(4); ?>" required> Reservation_externe </br>
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
        <!--<input type="submit" value="Envoyer" class="BoutonValidation"> -->
        </form>
        </br>
    </body>
</html>