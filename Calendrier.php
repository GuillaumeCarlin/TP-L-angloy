<!DOCTYPE html>
<html>
  <head>
  <meta charset='utf-8' />
  <link href='lib/main.css' rel='stylesheet' />
  <script src='lib/main.js'></script>
  <meta charset="utf-8">
  <!-- <title> Prixy création Formation </title>
  <link rel="stylesheet" href="Projet_Site_Réservation_Page_Connexion.css"/>
  <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png"> -->
  
  <!-- <fieldset class="fieldsetHead">   
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




?>
<script>

  document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    selectable: true,

    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },

    dateClick: function(info) {
        document.location.href="Choix_Bouton.php"
        //info.dayEl.style.backgroundColor = 'red';
        if(connexion()) {
            
        } 
      
      calendar.addEvent({
      title: '',
      start: info.dateStr,
      
      allDay: true
      });
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