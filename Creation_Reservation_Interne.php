<html>
    <head>
        <meta charset="utf-8">
        <title>Prixy création</title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">
    

        <fieldset class="fieldsetHead">   
                <img src="logoPrixy_sf.png" class="logo_prixy_head">
                <div class="divparametre">
                    <ul id="menu-accordeon">
                        <li><a href="#"><img src="parametre.png" class="imageParametre" ></a>
                            <ul>
                                <li><a href="Projet_Site_Réservation_Page_Connexion.php">Déconnexion</a></li>
                                <li><a href="Projet_Site_Reservation_Page_Compte.php">Création de compte</a></li>
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
    </head>
    <body class="body">
        <form action="Traitement_Reservation_Interne.php" method="post" name = "formulaire">
            <div class="colonne">
                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nom de la réservation : <input type='text' id='Reservation_Nom' name='Reservation_Nom' placeholder='Nom de la Reservation' required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Date de la formation : <input type='date' id='Reservation_Date' name='Reservation_Date' required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Heure de Réservation : <input type='time' id='Reservation_Heure' name='Reservation_Heure' min='8:00' max='18:00' step='3600' required></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Durée de la formation : <input type='time' id='Reservation_Duree' name='Reservation_Duree' min='1:00' step='3600' max='5:00' > </texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nombre de Participant : <input type='number' id='Reservation_Nom' name='Reservation_Nom' min="0" max="30" required>  / 30</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class="Descriptif" id='Reservation_Nom' name='Reservation_Nom' placeholder='Description de la Reservation' required></textarea></texte>
                </fieldset>

                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Réservant : <input type='text' class="nom" id='nom' name='Formateur' placeholder='Nom du Formateur'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail : <input type='text' id='email' name='AdresseMail' placeholder='Adresse Mail'></texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone : <input type='text' id='telephone' name='Telephone' placeholder='Numéros de Téléphone'></texte>
                    </br>
                    </br>
                    </br>                
                </fieldset>
            </div>
            <input type="submit" value="Envoyer" class="BoutonValidation">
        </form>
    </body>
</html>