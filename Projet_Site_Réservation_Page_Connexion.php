<html>
<?php 
    session_set_cookie_params(0);
    session_start(); 
    include("Fonction.php");
    

?>
    <head> 
        <meta charset="utf-8">
        <title>Prixy connexion</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>
    
    

    <body class="body">
    <form  method="post">
        <!-- <form action="Projet_Site_Réservation_Calendrier.php" method="post"> -->
            <fieldset class="fieldset">
                <img src="logoPrixy.png" class="imageLogo">
                <input class="bouton" type="texte" id="Utilisateur" name="Utilisateur" placeholder="Utilisateurs" required>
                </br>
                <input class="bouton" type="password" id="mdp" name="mdp" placeholder="Mot de passe" required>
                </br>
                
                <input class="boutonConnexion" type="submit"  value="Connexion" href="Projet_Site_Réservation_Calendrier.php">
                
            <?php

                
                if ($_SERVER["REQUEST_METHOD"] == "POST") { // implemente les valeurs dans $_POST
                    $utilisateur = htmlspecialchars($_POST["Utilisateur"]);
                    $mdp = htmlspecialchars($_POST["mdp"]);
                }
                
                
            
            
                if (count($_POST)==2){
                    if ($connexion) { 
                        $BDD = mysqli_select_db($connexion,'bdd_prixy');
                        if ($BDD) {
                            ///////////////////////////////////////////////////////////////////////
                            ///////////////////////////////////////////////////////////////////////
                            $lestatutconnexion=false;
                            $requete = mysqli_query($connexion,"SELECT count(*) FROM utilisateur where UTILNomUtilisateur ='".$utilisateur."' and UTILMotDePasse = '".$mdp."';");
                            $resultat=mysqli_fetch_array($requete);
                            $compte=$resultat['count(*)'];
                            
                            // md5() --> hachage
                            if ($compte != 0){
                                echo "<div class=aligement_milieu_connexion> <strong> Connexion en cours ... </strong></div>";
                                header('Location: Projet_Site_Réservation_Calendrier.php');
                            }
                            else{
                                echo"<div class=erreurconnexion><strong> Nom d'utilisateur ou mot de passe incorrecte </strong></div>";
                                
                            } 
                            
                        }
                    }    
                }
            ?>
                
            </fieldset>
        </form>
    </body>
    <!--  <a href="Projet_Site_Réservation_Page_Compte.php">Créer un nouveau compte</a>   -->
</html>