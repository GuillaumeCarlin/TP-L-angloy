<?php 
include("Fonction.php");
include("Projet_Site_Reservation_Page_Compte.php");

$access=0;

/* Récupération des variables*/
$NomUtilisateur = $_POST["Utilisateur"];
$mdp = $_POST['mdp'];
$mdpC = $_POST['mdpC'];
if ($_POST['declare_admin']){
    $declare_admin = $_POST['declare_admin'];
}


$requete = mysqli_query($connexion,"SELECT count(*) FROM utilisateur where UTILNomUtilisateur ='".$NomUtilisateur."';");
$resultat=mysqli_fetch_array($requete);
$compte=$resultat['count(*)'];

/* Verification si le nom d'utilisateur existe deja dans la base */
if($compte){
        echo"<div class=erreur_crea_nomutilisateur><strong> Le Nom d'utilisateur existe déja </strong></div>";
    }

else{
/*Vérification du mot de passe */
    if ($mdp == $mdpC){
        /* Si le mot de passe est bon le compte est créer
            Vérifie si le compte est déclaré comme administrateur */
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
        }*/
    }
    else{
        echo"<div class=erreur_crea_mdp><strong> Le Nom d'utilisateur existe déja </strong></div>";
    }
}

