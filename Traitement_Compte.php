<?php
include("Fonction.php");
include("Projet_Site_Reservation_Page_Compte.php");

$access=0;

session_start();
session_set_cookie_params(0);
echo $_SESSION["utilisateur"]
/*
/////////////////////////////////////////
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
////////////////////////////////////////////



$requete = mysqli_query($connexion,"SELECT count(*) FROM utilisateur where UTILNomUtilisateur ='".$NomUtilisateur."';");
$resultat=mysqli_fetch_array($requete);
$compte=$resultat['count(*)'];
*/
/* Verification si le nom d'utilisateur existe deja dans la base */
/*
if($compte){
        echo"<div class=erreur_crea_nomutilisateur><strong> Le Nom d'utilisateur existe déja </strong></div>";
    }

else{*/
/*Vérification du mot de passe */ /*
    if ($mdp == $mdpC){
        /* Si le mot de passe est bon le compte est créer
            Vérifie si le compte est déclaré comme administrateur */
        /*
        if($declare_admin){
            $requete="INSERT INTO utilisateur (UTILNomUtilisateur, UTILMotDePasse, UTILAdmin) VALUES ('$NomUtilisateur', '$mdp', '1');";
        }
        else{
            $requete = "INSERT INTO utilisateur(UTILNomUtilisateur, UTILMotDePasse) VALUES('$NomUtilisateur', '$mdp')";
        }
        $resultat = mysqli_query($connexion,$requete) or die(mysqli_error($connexion)); 
        
        /*if ($resultat) {
            echo "Insertion réussie";
        }
        else{
            echo "Echec de l'insertion";
        }*/ /*
    }
    else{
        echo"<div class=erreur_crea_mdp><strong> Le Nom d'utilisateur existe déja </strong></div>";
    }
}


*/
?>