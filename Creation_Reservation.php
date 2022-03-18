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

        <?php  

        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $cpt = 1;
        }
        else {
            $cpt = 0;
        }
        ?>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

        <?php
            if (isset($_POST['formation'])) {
        ?>

        <script>
            $(document).ready(function(){
                $(document).on('keydown', '.nomF', function() {
                    var id = this.id;

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
                                        document.getElementById('nomF').value = nom;
                                        document.getElementById('telephoneF').value = telephone;
                                        document.getElementById('emailF').value = email;
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
            }
            elseif (isset($_POST['externe'])) {
        ?>
        <script>
            $(document).ready(function(){
                $(document).on('keydown', '.nomRe', function() {
                    var id = this.id;

                    // Initialize jQuery UI autocomplete
                    $( '#'+id ).autocomplete({
                        source: function( request, response ) {
                            $.ajax({
                                url: "z_getDetails.php",
                                type: 'post',
                                dataType: "json",
                                data: {
                                    search: request.term,request:'re1'
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
                                data: {userid:userid,request:'re2'},
                                dataType: 'json',
                                success:function(response){

                                    var len = response.length;

                                    if(len > 0){
                                        var id = response[0]['id'];
                                        var nom = response[0]['nom'];
                                        var email = response[0]['email'];
                                        var telephone = response[0]['telephone'];
                                        var adresse = response[0]['adresse'];
                                        var cp = response[0]['cp'];
                                        var ville = response[0]['ville'];
                                        
                                        // Set value to textboxes
                                        document.getElementById('nomRe').value = nom;
                                        document.getElementById('telephoneRe').value = telephone;
                                        document.getElementById('emailRe').value = email;
                                        document.getElementById('adresseRe').value = adresse;
                                        document.getElementById('cpRe').value = cp;
                                        document.getElementById('villeRe').value = ville;
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
            }
            elseif (isset($_POST['interne'])) {
        ?>

        <script>
            $(document).ready(function(){
                $(document).on('keydown', '.nomRi', function() {
                    var id = this.id;

                    // Initialize jQuery UI autocomplete
                    $( '#'+id ).autocomplete({
                        source: function( request, response ) {
                            $.ajax({
                                url: "z_getDetails.php",
                                type: 'post',
                                dataType: "json",
                                data: {
                                search: request.term,request:'ri1'
                                },
                                success: function( data ) {
                                response( data );
                                }
                            });
                        },
                    select: function (event, ui) {
                        $(this).val(ui.item.label); // display the selected text
                        var userid = ui.item.value; // selected value

                        // AJAX
                        $.ajax({
                            url: 'z_getDetails.php',
                            type: 'post',
                            data: {userid:userid,request:'ri2'},
                            dataType: 'json',
                            success:function(response){

                                var len = response.length;

                                if(len > 0){
                                var id = response[0]['id'];
                                var nom = response[0]['nom'];
                                var email = response[0]['email'];
                                var telephone = response[0]['telephone'];
                                
                                // Set value to textboxes
                                document.getElementById('nomRi').value = nom;
                                document.getElementById('telephoneRi').value = telephone;
                                document.getElementById('emailRi').value = email;


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
            }
        ?>

<!-- J'ai déplacé le code en arrière pour changer le script-->
        
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
                    <texte class='Question_Creation_Base'> Nom de la réservation : <input class="champ_input" type='text' id='Reservation_Nom' name='Reservation_Nom' required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Date de la réservation : <input class="champ_input" type='date' id='Reservation_Date' name='Reservation_Date' required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Heure de réservation : <input class="champ_input" type='number' id='Reservation_Heure' name='Reservation_Heure' min='8' max='18' step='1' size="4" required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Durée de la réservation : <input class="champ_input" type='number' id='Reservation_Duree' name='Reservation_Duree' min='1' step='1' max='5' size="4"></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nombre de Participant : <input class="champ_input" type='number' id='Reservation_Participant' name='Reservation_Participant' min="0" max="30" required>  / 30</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class="Descriptif" id='Reservation_Descriptif' name='Reservation_Descriptif' required></textarea></texte>
                </fieldset>

                <?php
                if (isset($_POST['formation'])) {
                ?>
    
                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Nom du Formateur : <input type='text' class="nomF champ_input" id='nomF' name='Formateur' placeholder='Nom du Formateur' required></texte>
                    </br>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail du Formateur : <input class="champ_input" type='email' id='emailF' name='AdresseMail' placeholder='Adresse Mail' required></texte>
                    </br>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone du Formateur : <input class="champ_input" type='tel' id='telephoneF' name='Telephone' placeholder='Numéros de Téléphone' required></texte>
                </fieldset>
            
                <?php }
                elseif (isset($_POST['externe'])) {
                ?>

                    <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Nom du client : <input class="nomRe champ_input" type='text' id='nomRe' name='NomClient' placeholder='Nom du Client'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse : <input class="champ_input" type='text' id='adresseRe' name='Adresse' placeholder='Adresse du Client'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Code Postal : <input class="champ_input" type='text' id='cpRe' name='CodePostal' placeholder='Code Postal'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Ville : <input class="champ_input" type='text' id='villeRe' name='Ville' placeholder='Ville'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail : <input class="champ_input" type='email' id='emailRe' name='Mail' placeholder='Adresse Mail'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone : <input class="champ_input" type='tel' id='telephoneRe' name='Telephone' placeholder='Numéros de Téléphone'></texte>
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
                    <texte class='Question_Creation_Base'>Réservant : <input class="nomRi champ_input" type='text' id='nomRi' name='ReservantNom' placeholder='Nom du Formateur'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail : <input class="champ_input" type='email' id='emailRi' name='ReservantAdresseMail' placeholder='Adresse Mail'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone : <input class="champ_input" type='tel' id='telephoneRi' name='ReservantTelephone' placeholder='Numéros de Téléphone'></texte>
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
