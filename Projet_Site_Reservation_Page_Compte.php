<html>
    <head> 
        <meta charset="utf-8">
        <title>Prixy compte</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>
    
    <body class="body">
    <form method="POST">
    <!-- <form method="POST" action="Traitement_Compte.php"> -->
            <fieldset class="fieldset">
                </br>
                </br>
                <texte class="titre_Compte">Nouveau compte</texte>
                </br>
                <label for="Utilisateur">
                <input type="texte" class="bouton_Compte" placeholder="Utilisateur" id="Utilisateur" name="Utilisateur" required></label>
                </br>
                <input type="password" class="bouton_Compte" placeholder="Mot de Passe" id="mdp" name="mdp" required>
                </br>
                <input type="password" class="bouton_Compte" placeholder="Confirmer le mot de passe" id="mdpC" name="mdpC" required>
                </br>
                </br>
                </br>
                <div class="check">
                <text class="admin_Compte">Administrateur</text> <input type="checkbox" id="adminID" name='admin' value='True'><label for="adminID"><span class="ui"></span>
                </div>
                <input type="submit" class="boutonNvCpt_Compte" value="Créer un compte">
                <?php
                ini_set("display_errors","off");
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") { // implemente les valeurs dans $_POST si la methode est la bonne
                    $NomUtilisateur = $_POST["Utilisateur"];
                    $mdp = $_POST['mdp'];
                    $mdpC = $_POST['mdpC'];



                    if ($_POST['admin']==True){
                        $declare_admin=1;
                    } 
                }

                $connexion = mysqli_connect("localhost","root","","bdd_prixy");
                if ($connexion) { 
                    $BDD = mysqli_select_db($connexion,'bdd_prixy');
                    if ($BDD) {
                        if(count($_POST)>=3){

                            /*Vérification du mot de passe */
                            if ($mdp == $mdpC){
                                /* Si le mot de passe est bon le compte est créer*/
                                
                                
                                
                                if($declare_admin==1){
                                    
                                    $requete="INSERT INTO utilisateur (UTILNomUtilisateur, UTILMotDePasse, UTILAdmin) VALUES ('$NomUtilisateur', '$mdp', '$declare_admin');";
                                    $larequete = mysqli_query($connexion,$requete);
                                    echo"utilisateur crée";
                                }
                                else{
                                    $requete = "INSERT INTO utilisateur(UTILNomUtilisateur, UTILMotDePasse) VALUES('$NomUtilisateur', '$mdp')";
                                    $larequete = mysqli_query($connexion,$requete);
                                    echo"utilisateur crée";
                                }
                                header('Location: Calendrier/Calendar.php');
                                
                            } 
                            else{
                                echo"<div class=erreur_crea_mdp><strong>Erreur dans le mot de passe</strong></div>";
                            }
                        }
                    }
                }

                ?>
            </fieldset>
        </form>
    </body>
</html>