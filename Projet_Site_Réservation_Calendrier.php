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