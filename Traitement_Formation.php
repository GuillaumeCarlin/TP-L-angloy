<?php

//include("Calendrier.php");
//include("Calendrier.php");

$Reservation_Nom = $_POST["Reservation_Nom"];
$Reservation_Date = $_POST["Reservation_Date"];
$Reservation_Heure = $_POST["Reservation_Heure"];
$Reservation_Duree = $_POST["Reservation_Duree"];
$Reservation_Participant = $_POST["Reservation_Participant"];
$Reservation_Descriptif = $_POST["Reservation_Descriptif"];
$Reservation_Fin = $_POST["Reservation_Heure"] + $_POST["Reservation_Duree"];

$Formateur = $_POST["Formateur"];
$AdresseMail = $_POST["AdresseMail"];
$Telephone = $_POST["Telephone"];

$con = mysqli_connect('localhost','root','');
if ($con) {
    $connectdb = mysqli_select_db($con, 'bdd_prixy');
    if ($connectdb) {
        $requete_reservation = "INSERT INTO `reservation` (`NUMReservation`, `RESERVDate`, `HeureDebut`, `HeureFIN`, `Description`, `Intitule`, `NBparticipant`, `IDSalle`, `UTILNomUtilisateur`) 
        VALUES (NULL, DATE('$Reservation_Date'), '$Reservation_Heure', '$Reservation_Fin', '$Reservation_Descriptif', '$Reservation_Nom', '$Reservation_Participant', '205', 'Admin');";
        $insertion_reservation = mysqli_query($con, $requete_reservation);
        
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

function suppr_event($id) {
    echo 'test';
}

header('Location: Calendrier.php');
?>