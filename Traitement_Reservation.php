<?php


/* Table reservation */

if (isset($_POST["Reservation_Nom"])) {
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


    /* Table Formateur */

    $Formateur = $_POST["Formateur"];
    $AdresseMail = $_POST["AdresseMail"];
    $Telephone = $_POST["Telephone"];
}
/* Table Client */
if (isset($_POST["NomClient"])) {
    $Client = $_POST["NomClient"];
    $Adresse = $_POST["Adresse"];
    $CodePostal = $_POST["CodePostal"];
    $Ville = $_POST["Ville"];
    $Email = $_POST["Mail"];
    $ClientTelephone = $_POST["Telephone"];
}

/* Table Reservant */
if (isset($_POST["ReservantNom"])) {
    $ReservantNom = $_POST["ReservantNom"];
    $ReservantAdresseMail = $_POST["ReservantAdresseMail"];
    $ReservantTelephone = $_POST["ReservantTelephone"];
}


$con = mysqli_connect('localhost','root','');
if ($con) {
    $connectdb = mysqli_select_db($con, 'bdd_prixy');
    if ($connectdb) {  

        $requete_reservation = "INSERT INTO `reservation` (`id`, `title`, `start_event`, `end_event`, `descriptionEvent`, `participant`, `IDSalle`, `UTILNomUtilisateur`) 
        VALUES (NULL, '$Reservation_Nom', '$start_event', '$end_event', '$Reservation_Descriptif', '$Reservation_Participant', '205', 'Admin');";
        $insertion_reservation = mysqli_query($con, $requete_reservation);


        if($Formateur) {

            $requete_presence_formateur = "SELECT `IDFormateur` FROM `formateur` WHERE `NOMFormateur` = '$Formateur' AND `TELFormateur` = '$Telephone' AND `EMAILFormateur` = '$AdresseMail';";
            $presence_formateur = mysqli_query($con, $requete_presence_formateur);
            if(mysqli_num_rows($presence_formateur)) {} 
            else { 
                $requete_formateur = "INSERT INTO `formateur` (`IDFormateur`, `NOMFormateur`, `EMAILFormateur`, `TELFormateur`) 
                VALUES (NULL, '$Formateur', '$AdresseMail', '$Telephone');";
                $insertion_formateur = mysqli_query($con, $requete_formateur);
            }
            
            $requete_insertion_session = "INSERT INTO `session_formation` (`FORMATIONID`, `NUMReservation`, `IDFormateur`) VALUES (NULL, (SELECT id FROM reservation WHERE title = '$Reservation_Nom' AND start_event = '$start_event' AND descriptionEvent = '$Reservation_Descriptif'), (SELECT IDFormateur FROM formateur WHERE `NOMFormateur` = '$Formateur' AND `TELFormateur` = '$Telephone' AND `EMAILFormateur` = '$AdresseMail'));";
            $insertion_session = mysqli_query($con, $requete_insertion_session);
        }

        elseif($Client) {
            $requete_presence_client = "SELECT `IDClient` FROM `client` WHERE `CLIRaisonSociale` = '$Client' AND `CLIAdresseComplete` = '$Adresse' AND `CLICodePostale` = '$CodePostal' AND `CLITelFixe` = '$ClientTelephone' AND `CLIEmail` = '$Email' AND `CLIVille` = '$Ville';";
            $presence_client = mysqli_query($con, $requete_presence_client);
            if(mysqli_num_rows($presence_client)) {} 
            else {
                $requete_client = "INSERT INTO `client` (`IDCLient`, `CLINom`, `CLIAdresseComplete`, `CLICodePostale`, `CLITelFixe`, `CLIEmail`, `CLIVille`) 
                VALUES (NULL, '$Client', '$Adresse', '$CodePostal', '$ClientTelephone', '$Email', '$Ville');";
                $insertion_client = mysqli_query($con, $requete_client);
            }

            $requete_insertion_externe = "INSERT INTO `reservation_externe` (`RESERVExtID`, `IDClient`, `NUMRESERVATION`) 
            VALUES (NULL, (SELECT `IDClient` FROM `client` WHERE `CLINom` = '$Client' AND `CLIAdresseComplete` = '$Adresse' AND `CLICodePostale` = '$CodePostal' AND `CLITelFixe` = '$ClientTelephone' AND `CLIEmail` = '$Email' AND `CLIVille` = '$Ville'), (SELECT id FROM reservation WHERE title = '$Reservation_Nom' AND start_event = '$start_event' AND descriptionEvent = '$Reservation_Descriptif'));";
            $insertion_externe = mysqli_query($con, $requete_insertion_externe);
        }

        elseif($ReservantNom) {
            
        }
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