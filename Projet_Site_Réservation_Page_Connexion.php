<html>
<?php include("Fonction.php");?>
    <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
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


                    $connexion = mysqli_connect("localhost","root","","bdd_prixy");
                    if ($connexion) { 
                        echo '<br>Connexion au serveur réussie';
                        $BDD = mysqli_select_db($connexion,'bdd_prixy');
                        if ($BDD) {
                            echo '</br>Base de données sélectionnée';
                            ///////////////////////////////////////////////////////////////////////
                            ///////////////////////////////////////////////////////////////////////
                            $lestatutconnexion=false;
                            $requete = mysqli_query($connexion,"SELECT count(*) FROM utilisateur where UTILNomUtilisateur==".$utilisateur." and UTILMotDePasse == ".$mdp.";");
                            $resultat=mysqli_fetch_array($requete);
                            $compte=$resultat['count(*)'];
                            $indice=0;
                            /*
                            for($i=0;$i<1;$i++){
                                echo "</br>".$resultat[0][$i];
                                echo "</br>".$resultat[1][$i];
                                
                            }
                            */
                            if ($compteur != 0){
                                echo"le mdp et le mot de passe sont bon";
                            }
                            else{
                                echo"pb de mdp ou nom d'utilisateur";
                            }
                            /*
                            for($i=0 ; $i<mysqli_num_rows($requete) ; $i++){
                                if($i%2==0){
                                    if($resultat[$i]==$utilisateur){
                                        echo "le nom d'utilisateur est bon";
                                    }
                                    else{
                                        echo "Mauvais nom d'utilisateur";
                                    }
                                }
                                else{
                                    if($resultat[$i]==$mdp){
                                        echo "le mdp est bon";
                                    }
                                    else{
                                        echo "Mauvais mdp";
                                    }
                                }
                            }
                            */
                            
                            /*
                            for($i=0 ; $i<count($resultat) ; $i++){
                                
                                if($i%2==0){
                                    echo"boucle";
                                    if($resultat[$i]==$utilisateur && $resultat[$i+1]==$mdp){
                                        echo"accepté";
                                        $lestatutconnexion=true;
                                    }
                                    else{
                                        echo"non";
                                    }                                       
                                }
                            }
                            */
                            /*
                            if($lestatutconnexion){
                                echo "<div class=erreurconnexion> Identifiant ou mot de passe incorrecte<div>";
                            }
                            */
                            
                        
                            
                        }
                        else{ 
                                echo 'Echec de la sélection de la base'; 
                        }
                    } 
                    else{ 
                        echo '</br>Erreur lors de la connexion';
                    }
                
                
                }
            ?>
                
            </fieldset>
        </form>
    </body>
    <!--  <a href="Projet_Site_Réservation_Page_Compte.php">Créer un nouveau compte</a>   -->
</html>