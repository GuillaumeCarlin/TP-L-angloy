<html>
    <head>
        <meta charset="utf-8">
        <title> Prixy création Formation </title>
        <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
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
                                        document.getElementById('nom_'+index).value = nom;
                                        document.getElementById('telephone_'+index).value = telephone;
                                        document.getElementById('email_'+index).value = email;
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
        <form action="Traitement_Formation.php" method="post" name ="formulaire">
            <?php 
            if ($cpt == 0) {         
            ?>
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
                    <texte class='Question_Creation_Base'> Heure de Réservation : <input type='number' id='Reservation_Heure' name='Reservation_Heure' min='8' max='18' step='1' size="4" required> heures</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Durée de la formation : <input type='number' id='Reservation_Duree' name='Reservation_Duree' min='1' step='1' max='5' size="4"> heures</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Nombre de Participant : <input type='number' id='Reservation_Participant' name='Reservation_Participant' min="0" max="30" required>  / 30</texte>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class="Descriptif" id='Reservation_Descriptif' name='Reservation_Descriptif' placeholder='Description de la Reservation' required></textarea></texte>
                </fieldset>

                <fieldset class="FieldsetFormation_Creation">
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Nom du Formateur : <input type='text' class='nom' id='nom_1' name='Formateur' placeholder='Nom du Formateur' required></texte>
                    </br>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Adresse Mail du Formateur : <input type='text' class='email' id='email_1' name='AdresseMail' placeholder='Adresse Mail' required></texte>
                    </br>
                    </br>
                    </br>
                    </br>
                    <texte class='Question_Creation_Base'>Téléphone du Formateur : <input type='text' class='telephone' id='telephone_1' name='Telephone' placeholder='Numéros de Téléphone' required></texte>
                </fieldset>
            </div>
            <input type="submit" value="Envoyer" class="BoutonValidation" >
        <?php } 


        else{
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            }
    
            $mysqli = mysqli_connect("localhost", "root", "", "bdd_prixy");    
            $suppr_formateur = "DELETE FROM formateur WHERE IDFormateur = (SELECT IDFormateur FROM events WHERE id = $id);";
            $result4 = mysqli_query($mysqli, $suppr_formateur);

            $query = "SELECT * FROM events, formateur WHERE id = $id AND formateur.IDFormateur = events.IDFormateur;";
            $result = mysqli_query($mysqli, $query);
    
            $suppr = "DELETE FROM events WHERE id = $id;";
            $result2 = mysqli_query($mysqli, $suppr);
    

            


            while ($row = mysqli_fetch_assoc($result)) {
                $NomReservation = $row["title"];
                $DateReservation = $row["start_event"];
                $DateReservation = substr($DateReservation,0,-9);
                $HeureReservation = $row["start_event"];
                $HeureReservation = substr($HeureReservation,11,-6);
                
                $DureeReservation = $row["end_event"];
                $DureeReservation = substr($DureeReservation,11,-6);
                $DureeReservation = $DureeReservation - $HeureReservation;
                $NbParticipant = $row["participant"];
                $Description = $row["descriptionEvent"];
                $Formateur = $row["NOMFormateur"];
                $AdresseMail = $row["EMAILFormateur"];
                $Telephone = $row["TELFormateur"];

            echo "<div class='colonne'>
            <fieldset class='FieldsetFormation_Creation'>
                </br>
                </br>
                </br>";
            if ($cpt == 1){
                echo "<texte class='Question_Creation_Base'> Nom de la réservation : <input type='text' id='Reservation_Nom' name='Reservation_Nom'  value='$NomReservation'  required></texte>";
            }
            else{
                echo "<texte class='Question_Creation_Base'> Nom de la réservation : <input type='text' id='Reservation_Nom' name='Reservation_Nom'  placeholder='Nom de la Réservation'  required></texte>";
            }
            ?>
            
            </br>
            </br>
            </br>
            <?php 
            if ($cpt == 1){
                echo "<texte class='Question_Creation_Base'> Date de la formation : <input type='date' id='Reservation_Date' name='Reservation_Date' value = '$DateReservation' required></texte>";
            }
            else{
                echo "<texte class='Question_Creation_Base'> Date de la formation : <input type='date' id='Reservation_Date' name='Reservation_Date' required></texte>";
            }
            ?>
            </br>
            </br>
            </br>
            <?php
            if ($cpt == 1){
                echo "<texte class='Question_Creation_Base'> Heure de Réservation : <input type='number' id='Reservation_Heure' name='Reservation_Heure' min='8' max='18' step='1' size='4' value = '$HeureReservation' required> heures</texte>";
            }
            else{
                echo "<texte class='Question_Creation_Base'> Heure de Réservation : <input type='number' id='Reservation_Heure' name='Reservation_Heure' min='8' max='18' step='1' size='4' required> heures</texte>";
            }
            ?>
            </br>
            </br>
            </br>
            <?php
            if ($cpt == 1){
                echo "<texte class='Question_Creation_Base'>Durée de la formation : <input type='number' id='Reservation_Duree' name='Reservation_Duree' min='1' step='1' max='5' size='4' value = '$DureeReservation'> heures</texte>";
            }
            else{
                echo "<texte class='Question_Creation_Base'>Durée de la formation : <input type='number' id='Reservation_Duree' name='Reservation_Duree' min='1' step='1' max='5' size='4'> heures</texte>";
            }
            ?>
            </br>
            </br>
            </br>
            <?php
            if ($cpt == 1){
                echo "<texte class='Question_Creation_Base'> Nombre de Participant : <input type='number' id='Reservation_Participant' name='Reservation_Participant' min='0' max='30' value='$NbParticipant' required>  / 30</texte>";
            }
            else{
                echo "<texte class='Question_Creation_Base'> Nombre de Participant : <input type='number' id='Reservation_Participant' name='Reservation_Participant' min='0' max='30' required>  / 30</texte>";
            }
        
    
        ?>
        </br>
        </br>
        </br>
        <?php
        if ($cpt == 1){
            echo "<texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class='Descriptif' id='Reservation_Descriptif' name='Reservation_Descriptif' required>$Description</textarea></texte>";
        }
        else{
            echo "<texte class='Question_Creation_Base'> Descriptif : </br></br> <textarea class='Descriptif' id='Reservation_Descriptif' name='Reservation_Descriptif' placeholder = 'Description de la Reservation' required></textarea></texte>";
        }
    
        ?>
    </fieldset>

    <fieldset class="FieldsetFormation_Creation">
        </br>
        </br>
        </br>
        <?php
        if ($cpt == 1){
            echo "<texte class='Question_Creation_Base'>Formateur : <input type='text' id='Formateur' name='Formateur' value='$Formateur' required></texte>";
        }
        else{
            echo "<texte class='Question_Creation_Base'>Formateur : <input type='text' id='Formateur' name='Formateur' placeholder='Nom du Formateur' required></texte>";
        }
        ?>
        </br>
        </br>
        </br>
        </br>
        <?php
        if ($cpt == 1){
            echo "<texte class='Question_Creation_Base'>Adresse Mail du Formateur : <input type='text' id='AdresseMail' name='AdresseMail' value='$AdresseMail' required></texte>";
        }
        else{
            echo "<texte class='Question_Creation_Base'>Adresse Mail du Formateur : <input type='text' id='AdresseMail' name='AdresseMail' placeholder='Adresse Mail' required></texte>";
        }
        ?>
        </br>
        </br>
        </br>
        </br>
        <?php
        if ($cpt == 1){
            echo "<texte class='Question_Creation_Base'>Téléphone du Formateur : <input type='text' id='Telephone' name='Telephone' value='$Telephone' required></texte>";
        }
        else{
            echo "<texte class='Question_Creation_Base'>Téléphone du Formateur : <input type='text' id='Telephone' name='Telephone' placeholder='Numéros de Téléphone' required></texte>";
        }
    }
        ?>
    </fieldset>
</div>
<input type="submit" value="Enregistrer" class="BoutonValidation" >
<?php
        }
        ?>
        </form>
    </body>
    
</html>
