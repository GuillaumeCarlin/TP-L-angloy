<html>
    <head>
        <meta charset="utf-8">
        <title> Prixy création Formation </title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
        <script src = 'lib/main.js'></script>

        <?php
        session_start();
        $utilisateur = $_SESSION["utilisateur"];
        $administrateur = $_SESSION["administrateur"];

        if($_SESSION["connexion"]==FALSE){
            header("Location:Projet_Site_Réservation_Page_Connexion.php");
          }

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
                                echo'<li><a href="Projet_Site_Reservation_Page_Compte.php">Gestion de compte</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </fieldset>
    </head>
<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
   
}

?>

<body class="body">
<form action="Traitement_Modification_Formation.php" method="post" name ="formulaire">

<div class="colonne">
    <fieldset class="FieldsetFormation_Creation">
        </br>
        </br>
        </br>
    
        
<?php 

    $mysqli = mysqli_connect("localhost", "root", "", "bdd_prixy");    

    $query = "SELECT * 
    FROM reservation
    WHERE id = $id";
    
    $result = mysqli_query($mysqli, $query);
    
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
        $Salle = $row["IDSalle"];
        $Description = $row["descriptionEvent"];
        $type = $row["type"];
        

        echo "<texte class='Question_Creation_Base'> Nom de la réservation : <input class ='champ_input' type='text' id='Reservation_Nom' name='Reservation_Nom'  value='$NomReservation'  required></texte>";
    ?>
    
    </br></br></br>
    <?php 
        echo "<texte class='Question_Creation_Base'> Date de la formation : <input class ='champ_input' type='date' id='Reservation_Date' name='Reservation_Date' value = '$DateReservation' required></texte>";
    ?>
    </br></br></br>
    <?php
        echo "<texte class='Question_Creation_Base'> Heure de Réservation : <input class ='champ_input' type='number' id='Reservation_Heure' name='Reservation_Heure' min='8' max='18' step='1' size='4' value = '$HeureReservation' required></texte>";
    ?>
    </br></br></br>
    <?php
        echo "<texte class='Question_Creation_Base'>Durée de la formation : <input class ='champ_input' type='number' id='Reservation_Duree' name='Reservation_Duree' min='1' step='1' max='5' size='4' value = '$DureeReservation'></texte>";
    ?>
    </br></br></br>

    <?php
        echo "<texte class='Question_Creation_Base'> Nombre de Participant : <input class ='champ_input' type='number' id='Reservation_Participant' name='Reservation_Participant' min='0' max='30' value='$NbParticipant' required></texte>";                 
    ?>
    </br></br></br>
    <?php
        echo "<texte class='Question_Creation_Base'> Réference de salle : <input class ='champ_input' type='text' id='Reservation_Salle' name='Reservation_Salle' min='0' max='30' value='$Salle' required></texte>";                 
    ?>
    </br></br></br>
    <?php
        echo "<texte class='Question_Creation_Base'> Description : </br></br> <textarea class='Descriptif' id='Reservation_Descriptif' name='Reservation_Descriptif' required>$Description</textarea></texte>";
    ?>
    </fieldset>
    <?php
    }

    if ($type == 'formation') {

        $query_formateur = "SELECT * 
        FROM reservation, formateur, session_formation 
        WHERE id = $id 
        AND formateur.IDFormateur = session_formation.IDFormateur 
        AND reservation.id = session_formation.NUMReservation;";
        
        $result_formateur = mysqli_query($mysqli, $query_formateur);

        while ($row = mysqli_fetch_assoc($result_formateur)) {
            $Formateur = $row["NOMFormateur"];
            $AdresseMail = $row["EMAILFormateur"];
            $Telephone = $row["TELFormateur"];


        ?>
        <fieldset class="FieldsetFormation_Creation">
        </br></br></br>
        <?php
            echo "<texte class='Question_Creation_Base'>Formateur : <input class ='champ_input' type='text' id='Formateur' name='Formateur' value='$Formateur' required></texte>";
        ?>
        </br></br></br></br>
        <?php
            echo "<texte class='Question_Creation_Base'>Adresse Mail du Formateur : <input class ='champ_input' type='text' id='AdresseMail' name='AdresseMail' value='$AdresseMail' required></texte>";
        ?>
        </br></br></br></br>
        <?php
            echo "<texte class='Question_Creation_Base'>Téléphone du Formateur : <input class ='champ_input' type='text' id='Telephone' name='Telephone' value='$Telephone' required></texte>";
        }
    }

    elseif($type == 'externe'){

        $query_externe = "SELECT * 
        FROM reservation, client, reservation_externe
        WHERE id = $id
        AND reservation_externe.IDClient = client.IDClient 
        AND reservation.id = reservation_externe.NUMRESERVATION;";
        
        $result_externe = mysqli_query($mysqli, $query_externe);

        while ($row = mysqli_fetch_assoc($result_externe)) {
            $client = $row["CLINom"];
            $clientAdresse = $row["CLIAdresseComplete"];
            $clientCP = $row["CLICodePostal"];
            $clientVille = $row["CLIVille"];
            $clientMail = $row["CLIEmail"];
            $clientTelephone = $row["CLITelFixe"];

?>
    <fieldset class="FieldsetFormation_Creation">
        </br></br></br>
        <?php
            echo "<texte class='Question_Creation_Base'>Nom du client : <input class ='champ_input' type='text' class='nom' id='nom' name='NomClient' value='$client'></texte>";
        ?>
            </br></br></br>
        <?php
            echo "<texte class='Question_Creation_Base'>Adresse : <input class ='champ_input' type='text' id='adresse' name='Adresse' value='$clientAdresse'></texte>";
        ?>
            </br></br></br>
        <?php
            echo "<texte class='Question_Creation_Base'>Code Postal : <input class ='champ_input' type='text' id='cp' name='CodePostal' value='$clientCP'></texte>";
        ?>
            </br></br></br>
        <?php
            echo "<texte class='Question_Creation_Base'>Ville : <input class ='champ_input' type='text' id='ville' name='Ville' value='$clientVille'></texte>";
        ?>
            </br></br></br>
        <?php
            echo "<texte class='Question_Creation_Base'>Adresse Mail : <input class ='champ_input' type='email' id='email' name='Mail' value='$clientMail'></texte>";
        ?>
            </br></br></br>
        <?php
            echo "<texte class='Question_Creation_Base'>Téléphone : <input class ='champ_input' type='text' id='telephone' name='Telephone' value='$clientTelephone'></texte>";
        ?>
            </br></br>
    </fieldset>


<?php
    }
}

elseif ($type == 'interne') {

    $query_interne = "SELECT * 
    FROM reservation, reservantinterne, reservation_interne
    WHERE id = $id
    AND reservation_interne.IDResponsable = reservantinterne.IDResponsable 
    AND reservation.id = reservation_interne.NUMReservation;";
    
    $result_interne = mysqli_query($mysqli, $query_interne);

    while ($row = mysqli_fetch_assoc($result_interne)) {
        $NOMReservant = $row["NOMReservant"];
        $EMAILReservant = $row["EMAILReservant"];
        $TELReservant = $row["TELReservant"];



?>
    <fieldset class="FieldsetFormation_Creation">
    </br></br></br>
    <?php
    echo "<texte class='Question_Creation_Base'>Réservant : <input class ='champ_input' type='text' class='nom' id='nom' name='ReservantNom' value = '$NOMReservant'></texte>";
    ?>
    </br></br></br>
    <?php
    echo "<texte class='Question_Creation_Base'>Adresse Mail : <input class ='champ_input' type='text' id='email' name='ReservantAdresseMail' value ='$EMAILReservant'></texte>";
    ?>
    </br></br></br>
    <?php
    echo "<texte class='Question_Creation_Base'>Téléphone : <input class ='champ_input' type='text' id='telephone' name='ReservantTelephone' value = '$TELReservant'></texte>";
    ?>
    </br></br></br>         
</fieldset>

<?php
}
}
$_SESSION["idevent"] = $id ;

        ?>
    </fieldset>
</div>
<a href="Calendrier/delete.php" class="BoutonSuppression">Supprimer</button></a>
<input type="submit" value="Enregistrer" class="BoutonValidation" >
</form>
<!-- <button name="button" class="BoutonSuppression"> -->

</body>

</html>