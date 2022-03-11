<?php


/* Table reservation */

$Reservation_Nom = $_POST["Reservation_Nom"];
$Reservation_Date = $_POST["Reservation_Date"];
$Reservation_Heure = $_POST["Reservation_Heure"];
$Reservation_Duree = $_POST["Reservation_Duree"];
$Reservation_Participant = $_POST["Reservation_Participant"];
$Reservation_Descriptif = $_POST["Reservation_Descriptif"];

/* Table Formateur */
$Reservation_Fin = $_POST["Reservation_Heure"] + $_POST["Reservation_Duree"];
$start_event = $Reservation_Date .' '.$Reservation_Heure.':00:00';
$heure_fin = $Reservation_Heure + $Reservation_Duree;
$end_event = $Reservation_Date .' '.$heure_fin.':00:00';


/* Table Formateur */

$Formateur = $_POST["Formateur"];
$AdresseMail = $_POST["AdresseMail"];
$Telephone = $_POST["Telephone"];

// $suppr = "DELETE FROM events WHERE id = $id;";
// $result2 = mysqli_query($mysqli, $suppr);

// $requete_id_formateur = "SELECT `IDFormateur` FROM `formateur` WHERE `NOMFormateur` = '$Formateur' AND `TELFormateur` = '$Telephone' AND `EMAILFormateur` = '$AdresseMail';";
// $result = $mysqli->query($requete_id_formateur);

$con = mysqli_connect('localhost','root','');
if ($con) {
    $connectdb = mysqli_select_db($con, 'bdd_prixy');
    if ($connectdb) {   
        $modif_formateur = "UPDATE `formateur` SET `NOMFormateur` = '$Formateur', `EMAILFormateur` = '$AdresseMail', `TELFormateur` = '$Telephone' WHERE `formateur`.`IDFormateur` = 80;";  
        
        $requete_formateur = "INSERT INTO `formateur` (`IDFormateur`, `NOMFormateur`, `EMAILFormateur`, `TELFormateur`) 
        VALUES (NULL, '$Formateur', '$AdresseMail', '$Telephone');";
        $insertion_formateur = mysqli_query($con, $requete_formateur);
        
        $requete_reservation = "INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`, `descriptionEvent`, `participant`, `IDSalle`, `UTILNomUtilisateur`, `type`, `IDFormateur`) 
        VALUES (NULL, '$Reservation_Nom', '$start_event', '$end_event', '$Reservation_Descriptif', '$Reservation_Participant', '205', 'Admin', 'formation', (SELECT `IDFormateur` FROM `formateur` WHERE `NOMFormateur` = '$Formateur' AND `TELFormateur` = '$Telephone' AND `EMAILFormateur` = '$AdresseMail'));";
        $insertion_reservation = mysqli_query($con, $requete_reservation);
        
        

    }
    else {
        echo 'Erreur de connexion à la base de donnée';
    }
}
else {
    echo 'Erreur de connexion au serveur';
}

header('Location: Calendrier/calendar.php');
?>