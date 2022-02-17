<!DOCTYPE html>
<html>
  <head>
  <meta charset='utf-8' />
  <link href='lib/main.css' rel='stylesheet' />
  <script src='lib/main.js'></script>
  <meta charset="utf-8">
  <!-- <title> Prixy création Formation </title>
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
  </fieldset> -->


<?php
$mar_var_php = "baxterbax";

$nom_reservation = array();
  $test = "test";
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $mysqli = mysqli_connect("localhost", "root", "", "bdd_prixy");
  
  $query = "SELECT * FROM reservation";
  $ligne = 0;
  $result = mysqli_query($mysqli, $query);
  
  /* fetch associative array */
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($nom_reservation, $row["Intitule"]);
    $ligne++;
  }
?>
<script>


var nb_ligne = '<?php echo $ligne; ?>';
var montableau = [];
<?php $i = 0; ?>
for (i = 0; i < nb_ligne; i++) {
  montableau.push('<?php echo $nom_reservation[$i]; ?>')
}




</script>

<script>
  alert(montableau[7]);
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      selectable: true,

      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      }
      
    });

    calendar.render();
  });




</script>
</head>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>



<body>

  <div id='calendar'></div>

</body>
</html>