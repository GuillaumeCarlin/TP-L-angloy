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

    <?php
    session_start();
    if($_SESSION["connexion"]==FALSE){
        header("Location:Projet_Site_Réservation_Page_Connexion.php");
      }
    ?>

    <body class="bodygestion_compte">
    <form method="POST">
    <!-- <form method="POST" action="Traitement_Compte.php"> -->
            <fieldset class="fieldset">
                </br>
                </br>
                </br>
                </br>
                </br>
                <texte class="titre_Compte">Suppression de compte</texte>
                </br>
                </br>
                Veuillez entrer le nom d'utilisateur du compte à supprimer ainsi que le mot de passe administrateur
                </br>
                <label for="Utilisateur">
                <input type="texte" class="bouton_Compte" placeholder="Utilisateur" id="Utilisateur" name="Utilisateur" required></label>
                </br>
                </br>
                <input type="password" class="bouton_Compte" placeholder="Mot de passe Administrateur" id="mdpC" name="mdpC" required>
                </br>
                </br>
                </br>
                <input type="hidden" name="test" id="test" value="True">
                <input type="submit" class="boutonNvCpt_Compte" value="Supprimer le compte">
                <?php
                ini_set("display_errors","off");
                session_start();
                $utilisateur = $_SESSION["utilisateur"];
                $administrateur = $_SESSION["administrateur"];



                if ($_SERVER["REQUEST_METHOD"] == "POST") { // implemente les valeurs dans $_POST si la methode est la bonne
                    $NomUtilisateur = $_POST["Utilisateur"];
                    $mdp = $_POST['mdpC'];
                    $check = $_POST['test'];
                    
                }

                $connexion = mysqli_connect("localhost","root","","bdd_prixy");
                if ($connexion) { 
                    $BDD = mysqli_select_db($connexion,'bdd_prixy');
                    if ($BDD) {

                        // Vérification si l'utilisateur existe
                        // $utilrequete = mysqli_query($connexion,"SELECT * FROM utilisateur where UTILNomUtilisateur ='".$NomUtilisateur."';");
                        // while ($row = mysqli_fetch_assoc($result)) {
                        //     $util = $row["UTILNomUtilisateur"];
                        // }

                        // if ($util == )

                        //Vérification si l'utilisateur est un admin
                        $requete = mysqli_query($connexion,"SELECT count(*) FROM utilisateur where UTILNomUtilisateur ='".$utilisateur."' and UTILAdmin = 1;");
                        $resultatrequete=mysqli_fetch_array($requete);
                        $comptage=$resultatrequete['count(*)'];
                        if ($comptage == 1){
                            //Vérification du mot de passe
                            $requete = mysqli_query($connexion,"SELECT UTILMotDePasse FROM utilisateur where UTILNomUtilisateur = '".$utilisateur."' ;");
                            $resultatrequete=mysqli_fetch_array($requete);
                            $comptage=$resultatrequete['UTILMotDePasse'];
                            $mdp = hash('sha256',$mdp);
                            if ($comptage == $mdp ){
                                if (isset($mdp)){
                                    //Suppression du compte
                                    $larequete = mysqli_query($connexion,"DELETE FROM utilisateur WHERE UTILNomUtilisateur = '$NomUtilisateur';");
                                    echo "
                                    <script>var confirme = confirm('Le compte à bien été supprimé');
                                    if (confirm) {
                                        document.location.href='Calendrier/Calendar.php';
                                    }
                                    
                                    </script>";
                                }
                            }
                            else{
                                if($check=="True"){
                                    echo"<div class=erreur_crea_mdp><strong>Erreur Utilisateur ou mot de passe</strong></div>";
                                }
                            }
                        }
                        else{
                            echo "L'utilisateur n'est pas Admin";
                        }

                    }
                }

                ?>
            </fieldset>
        </form>
    </body>
</html>