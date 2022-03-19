<!DOCTYPE html>
<html>
  <head>
  <meta charset='utf-8' />
  <link href='lib/main.css' rel='stylesheet' />
  <script src='lib/main.js'></script>

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

<script>
var js_date_reservation = [];
var js_nom_reservation = [];
var js_id_reservation = [];

function suppr_element() {
  alert('test');
}
</script>
<?php



// Remplissage des noms
$nom_reservation = array();
$ligne = 0;
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect("localhost", "root", "", "bdd_prixy");

$query = "SELECT * FROM reservation";
$result = mysqli_query($mysqli, $query);

// Remplissage des dates
$date_reservation = array();

$query = "SELECT * FROM reservation";
$result = mysqli_query($mysqli, $query);

// 
$id_reservation = array();

$query = "SELECT * FROM reservation";
$result = mysqli_query($mysqli, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $ligne++;
  ?>
  <script>
  js_date_reservation.push('<?php echo $row["RESERVDate"]; ?>');
  js_nom_reservation.push('<?php echo $row["Intitule"]; ?>');
  js_id_reservation.push('<?php echo $row["NUMReservation"]; ?>');

</script>
  <?php
}
$con = mysqli_connect('localhost','root','','bdd_prixy');
$connectdb = mysqli_select_db($con, 'bdd_prixy');
?>

<script>
  function suppr(id) {
    var requete = '<?php echo "DELETE FROM `reservation` WHERE `reservation`.`NUMReservation` = ";?>';
    requete = requete + id;
    return requete;
  }


  var ligne = '<?php echo $ligne?>';
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today ajouter',
        center: 'title',
        right: 'supprimer dayGridMonth,timeGridWeek,timeGridDay'
      },

      initialView: 'dayGridMonth',
      locale: 'fr',
      navLinks: true, 
      selectable: true,
      selectMirror: true,
      dayMaxEvents: true,

      customButtons: {
        ajouter: {
          text: 'Nouveau',
          click: function() {
            document.location.href="Choix_Bouton.php"
          }
        },
        supprimer: {
          text: 'Supprimer',
          click: function() {
            <?php
              $id = readline("Commande : ");
              $con = mysqli_connect('localhost','root','','bdd_prixy');
              $suppr = mysqli_query($con, "DELETE FROM `reservation` WHERE `reservation`.`NUMReservation` = '$id'");            
            ?>
          }
        }
      },

      eventClick: function(arg) {
        if (confirm('Etes-vous sur de supprimer cet évenement ? id : '+ arg.event.id)) {
          id = arg.event.id;
          <?php
            $id = "15";
            $con = mysqli_connect('localhost','root','','bdd_prixy');
            $suppr = mysqli_query($con, "DELETE FROM `reservation` WHERE `reservation`.`NUMReservation` = '$id'");            
          ?>
        }
      },
    });
    
    for (i = 0; i < ligne; i++) {
      calendar.addEvent({ 
        id: js_id_reservation[i],
        title: js_nom_reservation[i], 
        start: js_date_reservation[i], 
        allDay: true 
      });
    }
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