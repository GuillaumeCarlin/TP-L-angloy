<html>
    <head> 
        <meta charset="utf-8">
        <title>Prixy Suppression</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>

    <div class="parametre_supression_creation">
        <ul id="menu-accordeon">
            <li><a href="#"><img src="parametre.png" class="imageParametre" ></a>
                <ul>
                    <li><a href="Calendrier/Calendar.php">Accueil</a></li>
                    <li><a href="Projet_Site_Réservation_Page_Connexion.php">Déconnexion</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <body class="body">
    <form method="POST">
    <!-- <form method="POST" action="Traitement_Compte.php"> -->
            <fieldset class="fieldset">
                </br>
                </br>
                <texte class="titre_Compte">Suppression de compte</texte>
                </br>
                </br>
                </br>
                <label for="Utilisateur">
                <input type="texte" class="bouton_Compte" placeholder="Utilisateur" id="Utilisateur" name="Utilisateur" required></label>
                </br>
                </br>
                <input type="password" class="bouton_Compte" placeholder="Mot de passe Administrateur" id="mdpC" name="mdpC" required>
                </br>
                </br>
                </br>
                <input type="submit" class="boutonNvCpt_Compte" value="Supprimer le compte">
                <?php
                ini_set("display_errors","off");
                session_start();
                $utilisateur = $_SESSION["utilisateur"];
                $administrateur = $_SESSION["administrateur"];


                if ($_SERVER["REQUEST_METHOD"] == "POST") { // implemente les valeurs dans $_POST si la methode est la bonne
                    $NomUtilisateur = $_POST["Utilisateur"];
                    $mdp = $_POST['mdp'];
                }


                

                $connexion = mysqli_connect("localhost","root","","bdd_prixy");
                if ($connexion) { 
                    $BDD = mysqli_select_db($connexion,'bdd_prixy');
                    if ($BDD) {

                        //Vérification si l'utilisateur est un admin
                        $Admin = mysqli_query($connexion,"SELECT UTILAdmin FROM utilisateur WHERE UTILNomUtilisateur == '$utilisateur' ;");
                        echo "$Admin";
                        $requete = mysqli_query($connexion,"SELECT count(*) FROM utilisateur where UTILNomUtilisateur ='".$utilisateur."' and UTILAdmin = 1;");
                        $resultatrequete=mysqli_fetch_array($requete);
                        $comptage=$resultatrequete['count(*)'];
                        if ($comptage == 1){
                            $requete2 = mysqli_query($connexion,"SELECT count(*) FROM utilisateur where UTILNomUtilisateur ='".$utilisateur."' and UTILMotDePasse = '".$mdp."';");
                            $resultat=mysqli_fetch_array($requete2);
                            $comptemdp=$resultat['count(*)'];
                            $mdpAdmin = mysqli_query($connexion,"SELECT UTILMotDePasse FROM utilisateur WHERE UTILNomUtilisateur = $utilisateur;");
                            if ($comptemdp == $mdpAdmin){
                                $larequete = mysqli_query($connexion,"DELETE FROM utilisateur WHERE UTILNomUtilisateur = '$NomUtilisateur';");
                            }
                            else{
                                echo "Mauvais Mot de Passe";
                            }
                        }
                        else{
                            echo "L'utilisateur n'est pas Admin";
                        }


                        
                        /*header('Location: Calendrier/Calendar.php');*/
                    }
                }

                ?>
            </fieldset>
        </form>
    </body>
</html>