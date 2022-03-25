<html>
    <head>
        <meta charset="utf-8">
        <title>EllaSIO bouton</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    </head>

    <?php
        session_start();
        $utilisateur = $_SESSION["utilisateur"];
        $administrateur = $_SESSION["administrateur"];

        if($_SESSION["connexion"]==FALSE){
            header("Location:../Projet_Site_Réservation_Page_Connexion.php");
          }
    ?>
    
    <div class="divlautreparametre">
        <ul id="menu-accordeon">
            <li><a href="#"><img src="parametre.png" class="imageParametre" ></a>
                <ul>
                    <li><a href="Calendrier/Calendar.php">Accueil</a></li>
                    <li><a href="../Projet_Site_Réservation_Page_Connexion.php">Déconnexion</a></li>
                    <?php
                        if ($administrateur==1){
                            echo'<li><a href="../Projet_Site_Reservation_Page_Compte.php">Gestion de compte</a></li>';
                        }
                    ?>
                </ul>
            </li>
        </ul>
    </div>

    <body class = "body">
        <div id = "ajout" class = "troisBouton">
            <fieldset class = "Fieldset_Choix_Bouton">

                <form method="POST" action="Creation_Reservation.php">
                    <button type="submit" name="formation" class = "boutonConnexion Placement_Bouton" >Formation</button>
                </form>

                <form method="POST" action="Creation_Reservation.php">
                    <button type="submit" name="externe" class = "boutonConnexion Placement_Bouton" >Reservation externe</button>
                </form>

                <form method="POST" action="Creation_Reservation.php">
                    <button type="submit" name="interne" class = "boutonConnexion Placement_Bouton" >Reservation interne</button>
                </form>
            </fieldset>
        </div> 
    </body>
</html>