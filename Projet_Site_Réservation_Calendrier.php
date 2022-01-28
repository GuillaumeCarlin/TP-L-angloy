<html>
    <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
    <head>
        
        <fieldset class="fieldsetHead_Calendrier">
            <img src="logoPrixy.png" class="imageLogo_Calendrier">

            <!--
            <button type="button" class="BoutonProfil">
            <img src="profil.png" class="imageProfil">
            </button>

            <button type="button" class="BoutonParametre">
            <img src="parametre.png" class="imageParametre">
            </button>
            -->
            <a href="Projet_Site_Réservation_Page_Connexion.php" class="Deconnexion_Calendrier">Déconnexion</a>
        </fieldset>
    </head>

    </br>
    </br>


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