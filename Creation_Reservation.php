<html>
    <head>
        <meta charset="utf-8">
        <title> Prixy création Formation</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
        <script src = 'lib/main.js'></script>

        <?php
        session_start();
        $utilisateur = $_SESSION["utilisateur"];
        $administrateur = $_SESSION["administrateur"];
        ?>

        <fieldset class="fieldsetHead">   
            <img src="logoPrixy_sf.png" class="logo_prixy_head">
            <div class="divparametre">
                <ul id="menu-accordeon">
                    <li><a href="#"><img src="parametre.png" class="imageParametre" ></a>
                        <ul>
                            <li><a href="Calendrier/Calendar.php">Accueil</a></li>
                            <li><a href="Projet_Site_Réservation_Page_Connexion.php">Déconnexion</a></li>
                            
                            <?php
                                if ($administrateur==1){
                                    echo'<li><a href="Projet_Site_Reservation_Page_Compte.php">Création de compte</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </fieldset>
    
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script>
            $(document).ready(function(){
                $(document).on('keydown', '.nom', function() {
                    var id = this.id;
                    var splitid = id.split('_');
                    var index = splitid[1];

                    // Initialize jQuery UI autocomplete
                    $( '#'+id ).autocomplete({
                        source: function( request, response ) {
                            $.ajax({
                                url: "z_getDetails.php",
                                type: 'post',
                                dataType: "json",
                                data: {
                                    search: request.term,request:'f1'
                                },
                                success: function( data ) {response( data );}
                            });
                        },
                        select: function (event, ui) {
                            $(this).val(ui.item.label); // display the selected text
                            var userid = ui.item.value; // selected value

                            // AJAX
                            $.ajax({
                                url: 'z_getDetails.php',
                                type: 'post',
                                data: {userid:userid,request:'f2'},
                                dataType: 'json',
                                success:function(response){
                                    var len = response.length;

                                    if(len > 0){
                                        var id = response[0]['id'];
                                        var nom = response[0]['nom'];
                                        var email = response[0]['email'];
                                        var telephone = response[0]['telephone'];
                
                                        // Set value to textboxes
                                        document.getElementById('nom').value = nom;
                                        document.getElementById('telephone').value = telephone;
                                        document.getElementById('email').value = email;
                                    }
                                }
                            });
                            return false;
                               
                        }
                    });
                });
            });
        </script>

        <?php  

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $cpt = 1;
    }
    else {
        $cpt = 0;
    }
    
        ?>
        
    </head>

    <body class="body">
        <form action="Traitement_Reservation.php" method="post" name ="formulaire">
            <?php 
            if ($cpt == 0) {         
            ?>
            <div class="colonne">
                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nom de la réservation : <input class="z" type='text' id='Reservation_Nom' name='Reservation_Nom' placeholder='Nom de la Reservation' required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Date de la réservation : <input class="z" type='date' id='Reservation_Date' name='Reservation_Date' required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Heure de réservation : <input class="z" type='number' id='Reservation_Heure' name='Reservation_Heure' min='8' max='18' step='1' size="4" required> heures</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Durée de la réservation : <input class="z" type='number' id='Reservation_Duree' name='Reservation_Duree' min='1' step='1' max='5' size="4"> heures</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nombre de Participant : <input class="z" type='number' id='Reservation_Participant' name='Reservation_Participant' min="0" max="30" required>  / 30</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class="Descriptif" id='Reservation_Descriptif' name='Reservation_Descriptif' placeholder='Description de la Reservation' required></textarea></texte>
                </fieldset>
                <?php
                if (isset($_POST['formation'])) {
                ?>
    
                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Nom du Formateur : <input type='text' class="z" id='nom' name='Formateur' placeholder='Nom du Formateur' required></texte>
                    </br>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail du Formateur : <input class="z" type='text' id='email' name='AdresseMail' placeholder='Adresse Mail' required></texte>
                    </br>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone du Formateur : <input class="z" type='text' id='telephone' name='Telephone' placeholder='Numéros de Téléphone' required></texte>
                </fieldset>
            
        <?php }
            elseif (isset($_POST['externe'])) {
                ?>
                    <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Nom du client : <input class="z" type='text' class='nom' id='nom' name='NomClient' placeholder='Nom du Client'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse : <input class="z" type='text' id='adresse' name='Adresse' placeholder='Adresse du Client'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Code Postal : <input class="z" type='text' id='cp' name='CodePostal' placeholder='Code Postal'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Ville : <input class="z" type='text' id='ville' name='Ville' placeholder='Ville'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail : <input class="z" type='email' id='email' name='Mail' placeholder='Adresse Mail'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone : <input class="z" type='text' id='telephone' name='Telephone' placeholder='Numéros de Téléphone'></texte>
                    </br>
                    </br>
                </fieldset>

                <?php
            }
            elseif (isset($_POST['interne'])) {
                ?>
                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Réservant : <input class="z" type='text' class="nom" id='nom' name='ReservantNom' placeholder='Nom du Formateur'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail : <input class="z" type='text' id='email' name='ReservantAdresseMail' placeholder='Adresse Mail'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone : <input class="z" type='text' id='telephone' name='ReservantTelephone' placeholder='Numéros de Téléphone'></texte>
                    </br>
                    </br>
                    </br>                
                </fieldset>
            
            <?php
            }
            ?>
            </div>
            <input type="submit" value="Envoyer" class="BoutonValidation">
    <?php
        }

    ?>
    </fieldset>
</div>
<input type="submit" value="Enregistrer" class="BoutonValidation" >
        </form>
    </body>
    
</html>
