<html>
    <?php 
        
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
                
                
            
                $connexion = mysqli_connect("localhost","root","","bdd_prixy");
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
                                
                                session_start();
                                
                                $_SESSION["utilisateur"]=$utilisateur;
                                $requete = mysqli_query($connexion,"SELECT count(*) FROM utilisateur where UTILNomUtilisateur ='".$utilisateur."' and UTILAdmin = 1;");
                                $resultatrequete=mysqli_fetch_array($requete);
                                $comptage=$resultatrequete['count(*)'];
                                if($comptage != 0){
                                    $_SESSION["administrateur"]=1;
                                }
                                else{
                                    $_SESSION["administrateur"]=0;
                                }
                                header('Location: Calendrier/Calendar.php');
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
</html>