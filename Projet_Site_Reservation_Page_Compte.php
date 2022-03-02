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
                <text class="admin_Compte">Administrateur </text> <input type="checkbox" id="adminID" name='admin' value='True'><label for="adminID"><span class="ui"></span>
                </div>
                <input type="submit" class="boutonNvCpt_Compte" value="Créer un compte">
                <?php
                // ini_set("display_errors","off");
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") { // implemente les valeurs dans $_POST
                    $NomUtilisateur = $_POST["Utilisateur"];
                    $mdp = $_POST['mdp'];
                    $mdpC = $_POST['mdpC'];
                    if ($_POST['declare_admin']){
                        $declare_admin = $_POST['declare_admin'];
                    }
                    
                    if(count($_POST)>=3)

                        /*Vérification du mot de passe */
                        if ($mdp == $mdpC){
                            /* Si le mot de passe est bon le compte est créer*/
                            $requete = "INSERT INTO utilisateur(UTILNomUtilisateur, UTILMotDePasse) VALUES('$NomUtilisateur', '$mdp')";
                            $resultat = mysqli_query($connexion,$requete) or die(mysqli_error($connexion)); 
                            
                            if($declare_admin){
                                $requete="INSERT INTO utilisateur (UTILNomUtilisateur, UTILMotDePasse, UTILAdmin) VALUES ('$NomUtilisateur', '$mdp', '1');";
                                $larequete = mysqli_query($connexion,$requete);
                                echo"utilisateur crée";
                            }
                            else{
                                $requete = "INSERT INTO utilisateur(UTILNomUtilisateur, UTILMotDePasse) VALUES('$NomUtilisateur', '$mdp')";
                                $larequete = mysqli_query($connexion,$requete);
                                echo"utilisateur crée";
                            }
                        } 
                        else{
                            echo"<div class=erreur_crea_mdp><strong> Le Nom d'utilisateur existe déja </strong></div>";
                        }
                    }
                

                
                /*
                if (count($_POST)>=3){
                    $connexion = mysqli_connect("localhost","root","","bdd_formulaire");
                    $requete = mysqli_query($connexion,"SELECT count(*) FROM 'utilisateur' where 'UTILNomUtilisateur' ='NomUtilisateur';");
                    $nbiteration=mysqli_affected_rows($connexion);
                    if($nbiteration>=1){
                        echo"<div class=erreur_crea_nomutilisateur><strong> Le Nom d'utilisateur existe déja </strong></div>";
                        // $resultat=mysqli_fetch_array($requete,MYSQLI_NUM);
                        // $compte=$resultat['count(*)'];
                    }
                    
                    /* Verification si le nom d'utilisateur existe deja dans la base */
                /*
                    if($compte){
                        echo"<div class=erreur_crea_nomutilisateur><strong> Le Nom d'utilisateur existe déja </strong></div>";
                    }
                }
                */
               
            
                /*
                $connexion = mysqli_connect("localhost","root","","bdd_formulaire");
                if (count($_POST)>=3){
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
                                header('Location: calendrier.html');
                            }
                            else{
                                echo"<div class=erreurconnexion><strong> Nom d'utilisateur ou mot de passe incorrecte </strong></div>";
                                
                            } 
                            
                        }
                    }    
                }*/
                ?>
            </fieldset>
        </form>
    </body>
</html>