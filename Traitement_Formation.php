<?php

include("Fonction.php");
include("Projet_Site_Reservation_Page_Compte.php");

/* Table reservation */
$Reservation_Nom = $_POST["Reservation_Nom"];
$Reservation_Date = $_POST["Reservation_Date"];
$Reservation_Heure = $_POST["Reservation_Heure"];
$Reservation_Participant = $_POST["Reservation_Participant"];
$Reservation_Descriptif = $_POST["Reservation_Descriptif"];
$Reservation_Duree = $_POST["Reservation_Duree"];

/* Table Formateur */
$Formateur = $_POST["Formateur"];
$AdresseMail = $_POST["AdresseMail"];



$Telephone = $_POST["Telephone"];

$requete = "INSERT INTO reservation(RESERVDate,HeureDebut,HeureFin,'Description',Intitule,NBparticipant) VALUES ($Reservation_Date,$Reservation_Heure,$Reservation_Heure+$Reservation_Duree,'$Reservation_Descriptif','$Reservation_Nom',$Reservation_Participants)"

?>