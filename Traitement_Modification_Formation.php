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


session_start();
$utilisateur = $_SESSION["utilisateur"];
$administrateur = $_SESSION["administrateur"];
$id = $_SESSION["idevent"];
echo ($id);



$con = mysqli_connect('localhost','root','');
if ($con) {
    $connectdb = mysqli_select_db($con, 'bdd_prixy');
    if ($connectdb) { 

        $requete_presence_formateur = "SELECT `IDFormateur` FROM `formateur` WHERE `NOMFormateur` = '$Formateur' AND `TELFormateur` = '$Telephone' AND `EMAILFormateur` = '$AdresseMail';";
        $presence_formateur = mysqli_query($con, $requete_presence_formateur);
        if(mysqli_num_rows($presence_formateur)) {} 
        else {
            $requete_formateur = "INSERT INTO `formateur` (`IDFormateur`, `NOMFormateur`, `EMAILFormateur`, `TELFormateur`) VALUES (NULL, '$Formateur', '$AdresseMail', '$Telephone');";
            $insertion_formateur = mysqli_query($con, $requete_formateur);
        }
        $update_formateur_reservation = "UPDATE `reservation` SET `IDFormateur` = (SELECT IDFormateur FROM formateur WHERE `NOMFormateur` = '$Formateur' AND `TELFormateur` = '$Telephone' AND `EMAILFormateur` = '$AdresseMail') WHERE `events`.`id` = $id;";
        $update_form_reservation = mysqli_query($con, $update_formateur_reservation);
        
        $requete_reservation = "UPDATE `reservation` SET `title` = '$Reservation_Nom', `start_event` = '$start_event', `end_event` = '$end_event', `descriptionEvent` = '$Reservation_Descriptif', `participant` = '$Reservation_Participant' WHERE `events`.`id` = $id;";
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