<?php
include("Fonction.php");
include("Projet_Site_Reservation_Page_Compte.php");

$access=0;

/* Récupération des variables*/
$NomUtilisateur = $_POST["Utilisateur"];
$mdp = $_POST['mdp'];
$mdpC = $_POST['mdpC'];
/*$admin = $_POST['admin'];*/
$admin=isset($_POST['admin']) ? $_POST['admin'] : NULL;
$admin=!empty($_POST['admin']) ? $_POST['admin'] : NULL;

echo $admin;

/*Vérification du mot de passe */
if ($mdp == $mdpC){
    /* Si le mot de passe est bon le compte est créer*/
    $requete = "INSERT INTO utilisateur(UTILNomUtilisateur, UTILMotDePasse, UTILAdmin) VALUES('$NomUtilisateur', '$mdp', '$admin')";
    $resultat = mysqli_query($connexion,$requete) or die(mysqli_error($connexion)); 
    /*if ($resultat) {
        echo "Insertion réussie";
    }
    else{
        echo "Echec de l'insertion";
    }*/
}
else{
    
}
?>
<html>
    <meta http-equiv="Refresh" content="0; Calendrier.html" />
</html>