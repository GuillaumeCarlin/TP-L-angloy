<?php
/* Table Réservation */
$Reservation_Nom = $_POST["Reservation_Nom"];
$Reservation_Date = $_POST["Reservation_Date"];
$Reservation_Heure = $_POST["Reservation_Heure"];
$Reservation_Participant = $_POST["Reservation_Participant"];
$Reservation_Descriptif = $_POST["Reservation_Descriptif"];
$Reservation_Duree = $_POST["Reservation_Duree"];
$Reservation_Fin = $_POST["Reservation_Heure"] + $_POST["Reservation_Duree"];

$reservant = $_POST["Formateur"];
$AdresseMail = $_POST["AdresseMail"];
$telephone = $_POST["Telephone"];


$requete = "INSERT INTO reservation(RESERVDate,HeureDebut,HeureFin,'Description',Intitule,NBparticipant) VALUES ($Reservation_Date,$Reservation_Heure,$Reservation_Heure+$Reservation_Duree,'$Reservation_Descriptif','$Reservation_Nom',$Reservation_Participants)";
$con = mysqli_connect('localhost','root','');
?>