<html>
    <head>
        <meta charset="utf-8">
        <title> Prixy création Formation </title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
        <script src = 'lib/main.js'></script>

        <?php
        session_start();
        $utilisateur = $_SESSION["utilisateur"];
        $administrateur = $_SESSION["administrateur"];

        $ID = isset($_POST['']);
        $NomReservation = "";
        $DateReservation = "2018-01-01";
        $HeureReservation = "";
        $DureeReservation = "";
        $NbParticipant = "";
        $Formateur = "";
        $AdresseMail = "";
        $Telephone = "";
        $Description = "";

        if (isset($ID)){
            $cpt = 1;
 
        }
        else {
            $cpt = 0;
        }



        ?>

        <fieldset class="fieldsetHead">   
            <img src="logoPrixy_sf.png" class="logo_prixy_head">
            <div class="divparametre">
                <ul id="menu-accordeon">
                    <li><a href="#"><img src="parametre.png" class="imageParametre" ></a>
                        <ul>
                            <li><a href="Calendrier/Calendar.php">Accueil</a></li>
                            <li><a href="Projet_Site_Réservation_Page_Connexion.php">Déconnexion</a></li>
                            
                            <?php
                                if ($administrateur==1){
                                echo'<li><a href="Projet_Site_Reservation_Page_Compte.php">Création de compte</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </fieldset>
    </head>

    <body class="body">
        <form action="Traitement_Formation.php" method="post" name ="formulaire">

            <div class="colonne">
                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                
                    
                    <?php 
                        if (isset($_GET["id"])) {
                            $id = $_GET["id"];
                        }
                        $mysqli = mysqli_connect("localhost", "root", "", "bdd_prixy");
                        $query = "SELECT * FROM events WHERE id = $id;";
                        $result = mysqli_query($mysqli, $query);
                        $suppr = "DELETE FROM events WHERE id = $id;";
                        $result2 = mysqli_query($mysqli, $suppr);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $NomReservation = $row["title"];
                            $DateReservation = $row["start_event"];
                            $DateReservation = substr($DateReservation,0,-9);
                            $HeureReservation = $row["start_event"];
                            $HeureReservation = substr($HeureReservation,11,-6);
                            
                            $DureeReservation = $row["end_event"];
                            $DureeReservation = substr($DureeReservation,11,-6);
                            $DureeReservation = $DureeReservation - $HeureReservation;
                            $NbParticipant = $row["participant"];
                            $Description = $row["descriptionEvent"];
                            $Formateur = "";
                            $AdresseMail = "";
                            $Telephone = "";
                        

                        if ($cpt == 1){
                            echo "<texte class='Question_Creation_Base'> Nom de la réservation : <input type='text' id='Reservation_Nom' name='Reservation_Nom'  value='$NomReservation'  required></texte>";
                        }
                        else{
                            echo "<texte class='Question_Creation_Base'> Nom de la réservation : <input type='text' id='Reservation_Nom' name='Reservation_Nom'  placeholder='Nom de la Réservation'  required></texte>";
                        }
                        ?>
                        
                        </br>
                        </br>
                        </br>
                        <?php 
                        if ($cpt == 1){
                            echo "<texte class='Question_Creation_Base'> Date de la formation : <input type='date' id='Reservation_Date' name='Reservation_Date' value = '$DateReservation' required></texte>";
                        }
                        else{
                            echo "<texte class='Question_Creation_Base'> Date de la formation : <input type='date' id='Reservation_Date' name='Reservation_Date' required></texte>";
                        }
                        ?>
                        </br>
                        </br>
                        </br>
                        <?php
                        if ($cpt == 1){
                            echo "<texte class='Question_Creation_Base'> Heure de Réservation : <input type='number' id='Reservation_Heure' name='Reservation_Heure' min='8' max='18' step='1' size='4' value = '$HeureReservation' required> heures</texte>";
                        }
                        else{
                            echo "<texte class='Question_Creation_Base'> Heure de Réservation : <input type='number' id='Reservation_Heure' name='Reservation_Heure' min='8' max='18' step='1' size='4' required> heures</texte>";
                        }
                        ?>
                        </br>
                        </br>
                        </br>
                        <?php
                        if ($cpt == 1){
                            echo "<texte class='Question_Creation_Base'>Durée de la formation : <input type='number' id='Reservation_Duree' name='Reservation_Duree' min='1' step='1' max='5' size='4' value = '$DureeReservation'> heures</texte>";
                        }
                        else{
                            echo "<texte class='Question_Creation_Base'>Durée de la formation : <input type='number' id='Reservation_Duree' name='Reservation_Duree' min='1' step='1' max='5' size='4'> heures</texte>";
                        }
                        ?>
                        </br>
                        </br>
                        </br>
                        <?php
                        if ($cpt == 1){
                            echo "<texte class='Question_Creation_Base'> Nombre de Participant : <input type='number' id='Reservation_Participant' name='Reservation_Participant' min='0' max='30' value='$NbParticipant' required>  / 30</texte>";
                        }
                        else{
                            echo "<texte class='Question_Creation_Base'> Nombre de Participant : <input type='number' id='Reservation_Participant' name='Reservation_Participant' min='0' max='30' required>  / 30</texte>";
                        }
                    
                
                    ?>
                    </br>
                    </br>
                    </br>
                    <?php
                    if ($cpt == 1){
                        echo "<texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class='Descriptif' id='Reservation_Descriptif' name='Reservation_Descriptif' required>$Description</textarea></texte>";
                    }
                    else{
                        echo "<texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class='Descriptif' id='Reservation_Descriptif' name='Reservation_Descriptif' placeholder = 'Description de la Reservation' required></textarea></texte>";
                    }
                }
                    ?>
                </fieldset>

                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <?php
                    if ($cpt == 1){
                        echo "<texte class='Question_Creation_Base'>Formateur : <input type='text' id='Formateur' name='Formateur' value='$Formateur' required></texte>";
                    }
                    else{
                        echo "<texte class='Question_Creation_Base'>Formateur : <input type='text' id='Formateur' name='Formateur' placeholder='Nom du Formateur' required></texte>";
                    }
                    ?>
                    </br>
                    </br>
                    </br>
                    </br>
                    <?php
                    if ($cpt == 1){
                        echo "<texte class='Question_Creation_Base'>Adresse Mail du Formateur : <input type='text' id='AdresseMail' name='AdresseMail' value='$AdresseMail' required></texte>";
                    }
                    else{
                        echo "<texte class='Question_Creation_Base'>Adresse Mail du Formateur : <input type='text' id='AdresseMail' name='AdresseMail' placeholder='Adresse Mail' required></texte>";
                    }
                    ?>
                    </br>
                    </br>
                    </br>
                    </br>
                    <?php
                    if ($cpt == 1){
                        echo "<texte class='Question_Creation_Base'>Téléphone du Formateur : <input type='text' id='Telephone' name='Telephone' value='$Telephone' required></texte>";
                    }
                    else{
                        echo "<texte class='Question_Creation_Base'>Téléphone du Formateur : <input type='text' id='Telephone' name='Telephone' placeholder='Numéros de Téléphone' required></texte>";
                    }
                    ?>
                </fieldset>
            </div>
            <input type="submit" value="Enregistrer" class="BoutonValidation" >
        </form>
    </body>
    
</html>
