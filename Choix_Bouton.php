<html>
    <head>
        <meta charset="utf-8">
        <title>Prixy création</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>
    <body class = "body">
        <div id = "ajout" class = "troisBouton">
            <fieldset class = "fieldset">
                <form method="POST" action="Creation_Formation.php">
                    <button type="submit" class = "boutonConnexion" >Formation</button>
                </form>

                <form method="POST" action="Creation_Reservation_Externe.php">
                    <button type="submit" class = "boutonConnexion" >Reservation externe</button>
                </form>

                <form method="POST" action="Creation_Reservation_Interne.php">
                    <button type="submit" class = "boutonConnexion" >Reservation interne</button>
                </form>
            </fieldset>
        </div> 
    <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = mysqli_connect("localhost", "root", "", "bdd_prixy");
        
        $query = "SELECT * FROM reservation";
        
        $result = mysqli_query($mysqli, $query);
        
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            printf("%s (%s)\n", $row["Intitule"], $row["IDSalle"]);
        }
    ?>
    </body>
</html>