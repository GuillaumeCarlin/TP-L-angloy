<html>
    <head> 
        <meta charset="utf-8">
        <title>Prixy compte</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>

    
    <body class="body">
        <form method="POST" action="Traitement_Compte.php">
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
<<<<<<< HEAD
                    <text class="admin_Compte">Administrateur </text> <input type="checkbox" name="declare_admin" id="declare_admin"/><label for="declare_admin"><span class="ui"></span>
=======
                <text class="admin_Compte">Administrateur </text> <input type="checkbox" id="adminID" name='admin' value='True'><label for="adminID"><span class="ui"></span>
>>>>>>> 27aebe59a451a38aa8603fdab057f6426b058605
                </div>
                <input type="submit" class="boutonNvCpt_Compte" value="Créer un compte">
            </fieldset>
        </form>
    </body>
</html>