<html>
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
                </br>
            <?php

                
                if ($_SERVER["REQUEST_METHOD"] == "POST") { // implemente les valeurs dans $_POST
                    $utilisateur = htmlspecialchars($_POST["Utilisateur"]);
                    $mdp = htmlspecialchars($_POST["mdp"]);
                }

                if (count($_POST)==2){


                    $connexion = mysqli_connect("localhost","root","","bdd_prixy");
                    if ($connexion) { 
                        echo 'Connexion au serveur réussie';
                        $BDD = mysqli_select_db($connexion,'bdd_prixy');
                        if ($BDD) {
                            echo 'Base de données sélectionnée';
                            ///////////////////////////////////////////////////////////////////////
                            ///////////////////////////////////////////////////////////////////////
                            
                            $requete = mysqli_query($connexion,"SELECT * FROM utilisateur;");
                            $resultat=mysqli_fetch_row($requete);
                            for($i=0 ; $i<mysqli_num_rows($requete) ; $i++){
                                if($i%2==0){
                                    if($resultat[$i]==$mdp){
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
                            
                        
                            
                        }
                        else{ 
                                echo 'Echec de la sélection de la base'; 
                        }
                    } 
                    else{ 
                        echo 'Erreur lors de la connexion';
                    }
                
                
                }
            ?>
                
            </fieldset>
        </form>
    </body>
    <!--  <a href="Projet_Site_Réservation_Page_Compte.php">Créer un nouveau compte</a>   -->
</html>