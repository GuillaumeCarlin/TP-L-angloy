<html>
    <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
    <head>
        
        <fieldset class="fieldsetHead_Creation">
            <img src="logoPrixy.png" class="imageLogo_Creation">

            <button type="button" class="BoutonProfil_Creation">
            <img src="profil.png" class="imageProfil_Creation">
            </button>

            <button type="button" class="BoutonParametre_Creation">
            <img src="parametre.png" class="imageParametre_Creation">
            </button>
        </fieldset>
    </head>

    <body>
        </br>
        <texte class="Date">Afficher la date de la réservation</texte>
        </br>
        <select name="type de réservation" id="type" class="Choix_Creation">
            <option value="Formation">Formation</option>
            <option value="Réservation Interne">Réservation Interne</option>
            <option value="Réservation externe">Réservation externe</option>
        </select>
        </br>
        <div id="Colonne">
            <fieldset class="FieldsetFormation_Creation">
                <div id="test">
                    </br>
                    <texte class="Question_Creation">Formateur : <input type="text" id="Formateur" name="Formateur" placeholder="Nom du Formateur"></texte>
                    </br>
                    </br>
                    <texte class="Question_Creation">Adresse Mail : <input type="text" id="AdresseMail" name="AdresseMail" placeholder="Adresse Mail"></texte>
                    </br>
                    </br>
                    <texte class="Question_Creation">Téléphone : <input type="text" id="Telephone" name="Telephone" placeholder="Numéros de Téléphone"></texte>
                </div>
            </fieldset>
        </div>
    </body>