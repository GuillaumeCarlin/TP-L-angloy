<?php
    $connexion = mysqli_connect("localhost","root","");
    if ($connexion) { 
        echo 'Connexion au serveur réussie';
        $BDD = mysqli_select_db($connexion,'bdd_prixy');
        if ($BDD) {
            echo '<div id="bdd">Base de données sélectionnée</div>';
            
        }
        else{ 
            echo '<div id="bdd">Echec de la sélection de la base</div>'; 
        }
    } 
    else{ 
        echo '<div id="srv">Erreur lors de la connexion</div>';
    }
?>