<html>
    <head>
        <meta charset="utf-8">
        <title>Prixy création</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>
    <body class = "body">
        <div id = "ajout" class = "troisBouton">
            <fieldset class = "Fieldset_Choix_Bouton">

                <form method="POST" action="Creation_Formation.php">
                    <button type="submit" class = "boutonConnexion Placement_Bouton" >Formation</button>
                </form>

                <form method="POST" action="Creation_Reservation_Externe.php">
                    <button type="submit" class = "boutonConnexion Placement_Bouton" >Reservation externe</button>
                </form>

                <form method="POST" action="Creation_Reservation_Interne.php">
                    <button type="submit" class = "boutonConnexion Placement_Bouton" >Reservation interne</button>
                </form>

            </fieldset>
        </div> 
    </body>
</html>