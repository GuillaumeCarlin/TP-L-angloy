<html>
    <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
    <head>
    <?php
    session_start();
    $utilisateur = $_SESSION["utilisateur"];
    $administrateur = $_SESSION["administrateur"];
    
    if($_SESSION["connexion"]==FALSE){
        header("Location:../Projet_Site_Réservation_Page_Connexion.php");
      }
      
    ?>
        
        <fieldset class="fieldsetHead">   
            <img src="logoPrixy_sf.png" class="logo_prixy_head">
            <div class="divparametre">
                <ul id="menu-accordeon">
                    <li><a href="#"><img src="parametre.png" class="imageParametre" ></a>
                        <ul>
                            <li><a href="../Projet_Site_Réservation_Page_Connexion.php">Déconnexion</a></li>
                            <?php
                                if ($administrateur==1){
                                echo'<li><a href="Projet_Site_Reservation_Page_Compte.php">Gestion de compte</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </fieldset>
    </head>

    </br>
    </br>
    <?php

        ///connexion à mysql et selection de la base de données//
        $connexion = mysqli_connect("localhost","root","","bdd_prixy");
        if ($connexion) { 
            echo 'Connexion au serveur réussie';
            $BDD = mysqli_select_db($connexion,'bdd_prixy');
            if ($BDD) {
                echo 'Base de données sélectionnée';
                
            }
            else{ 
                    echo 'Echec de la sélection de la base'; 
            }
        } 
        else{ 
            echo 'Erreur lors de la connexion';
        }
    

    ?>

    <body>

        <input type="week" name="week" id="week" min="2022-W1" class="Semaine_Calendrier">

        <table cellspacing=2>
            <tr>
                <td class="ColonneUne_Calendrier"></td><td class="table_Calendrier"><texte>Lundi</texte></td>    <td class="table_Calendrier"><texte>Mardi</texte></td> <td class="table_Calendrier"><texte>Mercredi</texte></td> <td class="table_Calendrier"><texte>Jeudi</texte></td> <td class="table_Calendrier"><texte>Vendredi</texte></td> 
            </tr>


            <tr>
                <td class="ColonneUne_Calendrier"><texte>9H-12H</texte></td> <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>


            <tr>
            <td class="ColonneUne_Calendrier"></td> <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>


            <tr>
            <td class="ColonneUne_Calendrier">14H-17H</td> <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
        </table>
        </br>
        </br>

        <a href="Projet_Site_Réservation_Page_Réservation.php">
        <button class="boutonCreation_Calendrier"  type="button" value="Création">Création</button>
        </a>
    </body>
</html>