<?php
    function connexion() {
        $con = mysqli_connect('localhost','root','');
        if ($con) {
            $connectdb = mysqli_select_db($con, 'bdd_prixy');
            if ($connectdb) {
                return true;
            }
            else {
                echo 'Erreur de connexion à la base de donnée';
                return false;
            }
        }
        else {
            echo 'Erreur de connexion au serveur';
            return false;
        }
    }
?>