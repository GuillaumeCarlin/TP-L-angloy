<?php

include("Fonction.php");
include("Projet_Site_Reservation_Page_Compte.php");




$Reservation_Nom = $_POST["Reservation_Nom"];
$Reservation_Date = $_POST["Reservation_Date"];
$Reservation_Heure = $_POST["Reservation_Heure"];
$Reservation_Duree = $_POST["Reservation_Duree"];
$Reservation_Participant = $_POST["Reservation_Participant"];
$Reservation_Descriptif = $_POST["Reservation_Descriptif"];
$Formateur = $_POST["Formateur"];
$AdresseMail = $_POST["AdresseMail"];
$Telephone = $_POST["Telephone"];


$con = mysqli_connect('localhost','root','');
if ($con) {
    $connectdb = mysqli_select_db($con, 'bdd_prixy');
    if ($connectdb) {
        $requete = "INSERT INTO `reservation` (`NUMReservation`, `RESERVDate`, `HeureDebut`, `HeureFIN`, `Description`, `Intitule`, `NBparticipant`, `IDSalle`, `UTILNomUtilisateur`) 
        VALUES (NULL, DATE('2022-02-17'), '17:54:56', '18:54:56', 'test2', 'Discret', '12', '205', 'Nathan');";
        $insertion = mysqli_query($con, $requete);
    }
    else {
        echo 'Erreur de connexion à la base de donnée';
    }
}
else {
    echo 'Erreur de connexion au serveur';
}
?>