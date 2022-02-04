<?php
    $connexion = mysqli_connect("localhost","root","");
    if ($connexion) { 
        echo 'Connexion au serveur réussie';
        $BDD = mysqli_select_db($connexion,'bdd_prixy');
        if ($BDD) {
            echo '</br>Base de données sélectionnée';
            
        }
        else{ 
            echo '</br>Echec de la sélection de la base'; 
        }
    } 
    else{ 
        echo 'Erreur lors de la connexion';
    }
?>