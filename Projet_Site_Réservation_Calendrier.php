<html>
    <link rel="stylesheet" href="Projet_Site_Réservation_Calendrier.css"/>
    <head>
        
        <fieldset class="fieldsetHead">
            <img src="logoPrixy.png" class="imageLogo">

            <!--
            <button type="button" class="BoutonProfil">
            <img src="profil.png" class="imageProfil">
            </button>

            <button type="button" class="BoutonParametre">
            <img src="parametre.png" class="imageParametre">
            </button>
            -->
            <a href="Projet_Site_Réservation_Page_Connexion.php" class="Deconnexion">Déconnexion</a>
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
                echo '<div id="bdd">Base de données sélectionnée</div>';
                
            }
            else{ 
                    echo '<div id="bdd">Echec de la sélection de la base</div>'; 
            }
        } 
        else{ 
            echo '<div id="srv">Erreur lors de la connexion</div>';
        }
    

    ?>

    <body>

        <input type="week" name="week" id="week" min="2022-W1" class="Semaine">

        <table cellspacing=2>
            <tr>
                <td class="ColonneUne"></td><td class="table"><texte>Lundi</texte></td>    <td class="table"><texte>Mardi</texte></td> <td class="table"><texte>Mercredi</texte></td> <td class="table"><texte>Jeudi</texte></td> <td class="table"><texte>Vendredi</texte></td> 
            </tr>


            <tr>
                <td class="ColonneUne"><texte>9H-12H</texte></td> <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>


            <tr>
            <td class="ColonneUne"></td> <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>


            <tr>
            <td class="ColonneUne">14H-17H</td> <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
        </table>
        </br>
        </br>

        <a href="Projet_Site_Réservation_Page_Réservation.php">
        <button class="boutonCreation"  type="button" value="Création">Création</button>
        </a>
    </body>
</html>