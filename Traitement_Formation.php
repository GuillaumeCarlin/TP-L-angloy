<?php

//include("Calendrier.php");

/* Table reservation */

$Reservation_Nom = $_POST["Reservation_Nom"];
$Reservation_Date = $_POST["Reservation_Date"];
$Reservation_Heure = $_POST["Reservation_Heure"];
$Reservation_Duree = $_POST["Reservation_Duree"];
$Reservation_Participant = $_POST["Reservation_Participant"];
$Reservation_Descriptif = $_POST["Reservation_Descriptif"];
$Reservation_Duree = $_POST["Reservation_Duree"];

/* Table Formateur */
$Reservation_Fin = $_POST["Reservation_Heure"] + $_POST["Reservation_Duree"];
$start_event = $Reservation_Date .' '.$Reservation_Heure.':00:00';
$heure_fin = $Reservation_Heure + $Reservation_Duree;
$end_event = $Reservation_Date .' '.$heure_fin.':00:00';


/* Table Formateur */

$Formateur = $_POST["Formateur"];
$AdresseMail = $_POST["AdresseMail"];
$Telephone = $_POST["Telephone"];

$requete = "INSERT INTO reservation(RESERVDate,HeureDebut,HeureFin,'Description',Intitule,NBparticipant) VALUES ($Reservation_Date,$Reservation_Heure,$Reservation_Heure+$Reservation_Duree,'$Reservation_Descriptif','$Reservation_Nom',$Reservation_Participants)";

$con = mysqli_connect('localhost','root','');
if ($con) {
    $connectdb = mysqli_select_db($con, 'bdd_prixy');
    if ($connectdb) {        
        $test = "INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`, `descriptionEvent`, `participant`, `IDSalle`, `UTILNomUtilisateur`, `type`) 
        VALUES (NULL, '$Reservation_Nom', '$start_event', '$end_event', '$Reservation_Descriptif', '$Reservation_Participant', '205', 'Admin', 'formation');";
        $insertion_reservation = mysqli_query($con, $test);
        
        $requete_formateur = "INSERT INTO `formateur` (`IDFormateur`, `NOMFormateur`, `EMAILFormateur`, `TELFormateur`) 
        VALUES (NULL, '$Formateur', '$AdresseMail', '$Telephone');";
        $insertion_formateur = mysqli_query($con, $requete_formateur);

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