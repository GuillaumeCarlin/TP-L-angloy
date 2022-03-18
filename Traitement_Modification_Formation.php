<?php
session_start();
$utilisateur = $_SESSION["utilisateur"];
$administrateur = $_SESSION["administrateur"];
$id = $_SESSION["idevent"];
if($_SESSION["connexion"]==FALSE){
    header("Location:Projet_Site_Réservation_Page_Connexion.php");
}
/* Table reservation */

$Reservation_Nom = $_POST["Reservation_Nom"];
$Reservation_Date = $_POST["Reservation_Date"];
$Reservation_Heure = $_POST["Reservation_Heure"];
$Reservation_Duree = $_POST["Reservation_Duree"];
$Reservation_Participant = $_POST["Reservation_Participant"];
$Reservation_Descriptif = $_POST["Reservation_Descriptif"];

$Reservation_Fin = $_POST["Reservation_Heure"] + $_POST["Reservation_Duree"];
$start_event = $Reservation_Date .' '.$Reservation_Heure.':00:00';
$heure_fin = $Reservation_Heure + $Reservation_Duree;
$end_event = $Reservation_Date .' '.$heure_fin.':00:00';



$con = mysqli_connect('localhost','root','','bdd_prixy');
if ($con) {
    if (isset($_POST["Formateur"])) {
        $Formateur = $_POST["Formateur"];
        $AdresseMail = $_POST["AdresseMail"];
        $Telephone = $_POST["Telephone"];
    
    $requete_presence_formateur = "SELECT `IDFormateur` FROM `formateur` WHERE `NOMFormateur` = '$Formateur' AND `TELFormateur` = '$Telephone' AND `EMAILFormateur` = '$AdresseMail';";
    $presence_formateur = mysqli_query($con, $requete_presence_formateur);
    if(mysqli_num_rows($presence_formateur)) {} 
    else {
        $requete_formateur = "INSERT INTO `formateur` (`IDFormateur`, `NOMFormateur`, `EMAILFormateur`, `TELFormateur`) VALUES (NULL, '$Formateur', '$AdresseMail', '$Telephone');";
        $insertion_formateur = mysqli_query($con, $requete_formateur);
    }
    $update_formateur_reservation = "UPDATE `session_formation` SET `IDFormateur` = (SELECT IDFormateur FROM formateur WHERE `NOMFormateur` = '$Formateur' AND `TELFormateur` = '$Telephone' AND `EMAILFormateur` = '$AdresseMail') WHERE NUMReservation = $id;";
    $update_form_reservation = mysqli_query($con, $update_formateur_reservation);
    
    $requete_reservation = "UPDATE `reservation` SET `title` = '$Reservation_Nom', `start_event` = '$start_event', `end_event` = '$end_event', `descriptionEvent` = '$Reservation_Descriptif', `participant` = '$Reservation_Participant' WHERE id = $id;";
    $insertion_reservation = mysqli_query($con, $requete_reservation);
    }

    elseif(isset($_POST["NomClient"])) {
        $Client = $_POST["NomClient"];
        $Adresse = $_POST["Adresse"];
        $CodePostal = $_POST["CodePostal"];
        $Ville = $_POST["Ville"];
        $Email = $_POST["Mail"];
        $ClientTelephone = $_POST["Telephone"];

        $requete_presence_client = "SELECT `IDClient` FROM `client` WHERE `CLINom` = '$Client' AND `CLIAdresseComplete` = '$Adresse' AND `CLICodePostal` = '$CodePostal' AND `CLIVille` = '$Ville' AND `CLIEmail` = '$Email' AND `CLITelFixe` = '$ClientTelephone';";
        $presence_client = mysqli_query($con, $requete_presence_client);
        if(mysqli_num_rows($presence_client)) {} 
        else {
            $requete_client = "INSERT INTO `client` (`IDCLient`, `CLINom`, `CLIAdresseComplete`, `CLICodePostal`, `CLIVille`, `CLIEmail`, `CLITelFixe`) 
            VALUES (NULL, '$Client', '$Adresse', '$CodePostal', '$Ville', '$Email', '$ClientTelephone');";
            $insertion_client = mysqli_query($con, $requete_client);
        }

        $update_client_reservation = "UPDATE `reservation_externe` SET `IDClient` = (SELECT `IDClient` FROM `client` WHERE `CLINom` = '$Client' AND `CLIAdresseComplete` = '$Adresse' AND `CLICodePostal` = '$CodePostal' AND `CLIVille` = '$Ville' AND `CLIEmail` = '$Email' AND `CLITelFixe` = '$ClientTelephone') WHERE `reservation_externe`.`NUMRESERVATION` = $id;";
        $update_cli_reservation = mysqli_query($con, $update_client_reservation);
        
        $requete_reservation = "UPDATE `reservation` SET `title` = '$Reservation_Nom', `start_event` = '$start_event', `end_event` = '$end_event', `descriptionEvent` = '$Reservation_Descriptif', `participant` = '$Reservation_Participant' WHERE id = $id;";
        $insertion_reservation = mysqli_query($con, $requete_reservation);

    }



    elseif(isset($_POST["ReservantNom"])) {
        $ReservantNom = $_POST["ReservantNom"];
        $ReservantAdresseMail = $_POST["ReservantAdresseMail"];
        $ReservantTelephone = $_POST["ReservantTelephone"];


        $requete_presence_reservant = "SELECT `IDResponsable` FROM `reservantinterne` WHERE `NOMReservant` = '$ReservantNom' AND `EMAILReservant` = '$ReservantAdresseMail' AND `TELReservant` = '$ReservantTelephone';";
        $presence_reservant = mysqli_query($con, $requete_presence_reservant);
        if(mysqli_num_rows($presence_reservant)) {} 
        else {
            $requete_reservant = "INSERT INTO `reservantinterne` (`IDResponsable`, `NOMReservant`, `EMAILReservant`, `TELReservant`) 
            VALUES (NULL, '$ReservantNom', '$ReservantAdresseMail', '$ReservantTelephone');";
            $insertion_reservant = mysqli_query($con, $requete_reservant);
        }
        $update_reservation_interne = "UPDATE `reservation_interne` SET `IDResponsable` = (SELECT `IDResponsable` FROM `reservantinterne` WHERE `NOMReservant` = '$ReservantNom' AND `EMAILReservant` = '$ReservantAdresseMail' AND `TELReservant` = '$ReservantTelephone') WHERE `reservation_interne`.`NUMReservation` = $id;";
        $reponse_update_reservation_interne = mysqli_query($con, $update_reservation_interne);

        $requete_reservation = "UPDATE `reservation` SET `title` = '$Reservation_Nom', `start_event` = '$start_event', `end_event` = '$end_event', `descriptionEvent` = '$Reservation_Descriptif', `participant` = '$Reservation_Participant' WHERE id = $id;";
        $insertion_reservation = mysqli_query($con, $requete_reservation);
    }

}


else {
    echo 'Erreur de connexion au serveur';
}

header('Location: Calendrier/calendar.php');
?>