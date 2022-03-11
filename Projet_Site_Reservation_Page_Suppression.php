<html>
    <head> 
        <meta charset="utf-8">
        <title>Prixy Suppression</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>
    
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
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") { // implemente les valeurs dans $_POST si la methode est la bonne
                    $NomUtilisateur = $_POST["Utilisateur"];
                    $mdp = $_POST['mdp'];
                }

                $connexion = mysqli_connect("localhost","root","","bdd_prixy");
                if ($connexion) { 
                    $BDD = mysqli_select_db($connexion,'bdd_prixy');
                    if ($BDD) {
                        /*$Compte = "SELECT UTILNum FROM utilisateur WHERE UTILNomUtilisateur == $NomUtilisateur;";*/
                        $larequete = mysqli_query($connexion,"DELETE FROM utilisateur WHERE UTILNomUtilisateur = '$NomUtilisateur';");
                        /*header('Location: Calendrier/Calendar.php');*/
                        if ($larequete){
                            echo "Base de donnée mise à jour";
                        }
                        
                    }
                }

                ?>
            </fieldset>
        </form>
    </body>
</html>