<?php
include("Projet_Site_Réservation_Page_Création.php");

$choix=$_POST['choix'];
/*
if($choix=="Formation"){
    echo "La formation à été choisis";
}
if($choix=="Reservation_interne"){
    echo "La reservation interne à été choisis";
}
if($choix=="Reservation_externe"){
   echo "La reservation externe à été choisis";
}
*/
?>
<html>
    <body>
        <?php 
        if($choix=="Formation"){
            echo " 
                <div id='Colonne'>
                    <fieldset class='FieldsetFormation_Creation'>
                        <div id='test'>
                            </br>
                            <texte class='Question_Creation'>Formateur : <input type='text' id='Formateur' name='Formateur' placeholder='Nom du Formateur' required></texte>
                            </br>
                            </br>
                            <texte class='Question_Creation'>Adresse Mail : <input type='text' id='AdresseMail' name='AdresseMail' placeholder='Adresse Mail'></texte>
                            </br>
                            </br>
                            <texte class='Question_Creation'>Téléphone : <input type='text' id='Telephone' name='Telephone' placeholder='Numéros de Téléphone'></texte>
                        </div>
                    </fieldset>
                </div>";
        }
        if ($choix=="Reservation_interne"){
            echo "
            <div id='Colonne'>
            <fieldset class='FieldsetFormation_Creation'>
                <div id='test'>
                    </br>
                    <texte class='Question_Creation'>Réservant : <input type='text' id='Formateur' name='Formateur' placeholder='Nom du Formateur'></texte>
                    </br>
                    </br>
                    <texte class='Question_Creation'>Adresse Mail : <input type='text' id='AdresseMail' name='AdresseMail' placeholder='Adresse Mail'></texte>
                    </br>
                    </br>
                    <texte class='Question_Creation'>Téléphone : <input type='text' id='Telephone' name='Telephone' placeholder='Numéros de Téléphone'></texte>
                </div>
            </fieldset>
        </div>";
        }
        if ($choix=="Reservation_externe"){
            echo"
            <div id='Colonne'>
            <fieldset class='FieldsetFormation_Creation_Reservation_Externe'>
                <div id='test'>
                    </br>
                    <texte class='Question_Creation'>Nom du client : <input type='text' id='NomClient' name='NomClient' placeholder='Nom du Client'></texte>
                    </br>
                    </br>
                    <texte class='Question_Creation'>Entreprise : <input type='text' id='Entreprise' name='Entreprise' placeholder='Entreprise'></texte>
                    </br>
                    </br>
                    <texte class='Question_Creation'>Adresse : <input type='text' id='Adresse' name='Adresse' placeholder='Adresse du Client'></texte>
                    </br>
                    </br>
                    <texte class='Question_Creation'>Code Postal : <input type='text' id='CodePostal' name='CodePostal' placeholder='Code Postal'></texte>
                    </br>
                    </br>
                    <texte class='Question_Creation'>Ville : <input type='text' id='Ville' name='Ville' placeholder='Ville'></texte>
                    </br>
                    </br>
                    <texte class='Question_Creation'>Adresse Mail : <input type='email' id='Mail' name='Mail' placeholder='Adresse Mail'></texte>
                    </br>
                    </br>
                    <texte class='Question_Creation'>Téléphone : <input type='text' id='Telephone' name='Telephone' placeholder='Numéros de Téléphone'></texte>
                    </br>
                </div>
            </fieldset>
            ";
        }
        ?>
    </body>
</html>