<?php

//include("Calendrier.php");

/* Table reservation */

$Reservation_Nom = $_POST["Reservation_Nom"];
$Reservation_Date = $_POST["Reservation_Date"];
$Reservation_Heure = $_POST["Reservation_Heure"];
$Reservation_Duree = $_POST["Reservation_Duree"];
$Reservation_Participant = $_POST["Reservation_Participant"];
$Reservation_Descriptif = $_POST["Reservation_Descriptif"];
$start_event = $Reservation_Date .' '.$Reservation_Heure.':00:00';
$heure_fin = $Reservation_Heure + $Reservation_Duree;
$end_event = $Reservation_Date .' '.$heure_fin.':00:00';


/* Table Formateur */

$Client = $_POST["NomClient"];
$RaisonSociale = $_POST["Entreprise"];
$Adresse = $_POST["Adresse"];
$CodePostal = $_POST["CodePostal"];
$Ville = $_POST["Ville"];
$Email = $_POST["Mail"];
$Telephone = $_POST["Telephone"];

if($_SESSION["connexion"]==FALSE){
    header("Location:Projet_Site_Réservation_Page_Connexion.php");
}

$con = mysqli_connect('localhost','root','');
if ($con) {
    $connectdb = mysqli_select_db($con, 'bdd_prixy');
    if ($connectdb) {        
        $test = "INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`, `descriptionEvent`, `participant`, `IDSalle`, `UTILNomUtilisateur`, `type`) 
        VALUES (NULL, '$Reservation_Nom', '$start_event', '$end_event', '$Reservation_Descriptif', '$Reservation_Participant', '205', 'Admin', 'formation');";
        $insertion_reservation = mysqli_query($con, $test);
        
        $requete_client = "INSERT INTO `client` (`IDCLient`, `CLIRaisonSociale`, `CLIAdresseComplete`, `CLICodePostale`, `CLITelFixe`, `CLITelMobile`, `CLIEmail`, `CLIVille`) 
        VALUES (NULL, '$Client', '$Adresse', '$CodePostal', '$Telephone', '1212121212', '$Email', '$Ville');";
        $insertion_client = mysqli_query($con, $requete_client);

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