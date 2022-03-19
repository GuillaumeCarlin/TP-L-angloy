<?php

//delete.php


session_start();
if($_SESSION["idevent"]) {

    $mysqli = mysqli_connect("localhost", "root", "", "bdd_prixy");
    $id = $_SESSION["idevent"];

    $query = "SELECT * 
    FROM reservation
    WHERE id = $id";

    $result = mysqli_query($mysqli, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $type = $row["type"];
    }
    if ($type == 'formation') {
        $requete_suppr_sessionformation = "DELETE FROM `session_formation` WHERE `session_formation`.`NUMReservation` = $id;";
        $result1 = mysqli_query($mysqli, $requete_suppr_sessionformation);

        $requete_suppr_formation = "DELETE FROM `reservation` WHERE `reservation`.`id` = $id;";
        $result2 = mysqli_query($mysqli, $requete_suppr_formation);
    
    }


    elseif ($type == 'externe') {
        $requete_suppr_reservationexterne = "DELETE FROM `reservation_externe` WHERE `reservation_externe`.`NUMRESERVATION` = $id";
        $result3 = mysqli_query($mysqli, $requete_suppr_reservationexterne);

        $requete_suppr_externe = "DELETE FROM `reservation` WHERE `reservation`.`id` = $id;";
        $result4 = mysqli_query($mysqli, $requete_suppr_externe);
    
    }


    elseif ($type == 'interne') {
        $requete_suppr_reservationinterne = "DELETE FROM `reservation_interne` WHERE `reservation_interne`.`NUMReservation` = $id";
        $result5 = mysqli_query($mysqli, $requete_suppr_reservationinterne);

        $requete_suppr_interne = "DELETE FROM `reservation` WHERE `reservation`.`id` = $id;";
        $result6 = mysqli_query($mysqli, $requete_suppr_interne);
    
    }
    header('Location: ../Calendrier/calendar.php');

}

?>