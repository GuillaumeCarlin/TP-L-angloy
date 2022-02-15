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

$requete = "INSERT INTO reservation(RESERVDate,HeureDebut,'Description',Intitule,NBparticipant)"

?>