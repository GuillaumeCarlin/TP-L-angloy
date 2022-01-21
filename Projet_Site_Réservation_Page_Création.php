<html>
    <link rel="stylesheet" href="Projet_Site_Réservation_Page_Création.css"/>
    <head>
        
        <fieldset class="fieldsetHead">
            <img src="logoPrixy.png" class="imageLogo">

            <button type="button" class="BoutonProfil">
            <img src="profil.png" class="imageProfil">
            </button>

            <button type="button" class="BoutonParametre">
            <img src="parametre.png" class="imageParametre">
            </button>
        </fieldset>
    </head>

    <body>
        </br>
        <texte class="Date">Afficher la date de la réservation</texte>
        </br>
        <select name="type de réservation" id="type" class="Choix">
            <option value="Formation">Formation</option>
            <option value="Réservation Interne">Réservation Interne</option>
            <option value="Réservation externe">Réservation externe</option>
        </select>
        </br>
        <div id="Colonne">
            <fieldset class="FieldsetFormation">
                <div id="test">
                    </br>
                    <texte class="Question">Formateur : <input type="text" id="Formateur" name="Formateur" placeholder="Nom du Formateur"></texte>
                    </br>
                    </br>
                    <texte class="Question">Adresse Mail : <input type="text" id="AdresseMail" name="AdresseMail" placeholder="Adresse Mail"></texte>
                    </br>
                    </br>
                    <texte class="Question">Téléphone : <input type="text" id="Telephone" name="Telephone" placeholder="Numéros de Téléphone"></texte>
                </div>
            </fieldset>
        </div>
    </body>