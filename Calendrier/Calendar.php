<?php
session_start();
$utilisateur = $_SESSION["utilisateur"];
$administrateur = $_SESSION["administrateur"];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Prixy calendrier</title>
  <link rel="stylesheet" href="lelogoparametre.css"/>
  <link rel="icon" type="image/png" sizes="16x16" href="logoPrixy.png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
   



   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title ajt',
     right:'month,agendaWeek,agendaDay'
    },

    customButtons: {
    ajt: {
      text: 'Ajouter',
      click: function() {
        window.location.replace("../Choix_Bouton.php");
      }
    }
  },

    events: 'load.php',
    selectable:true,
    selectHelper:true,
    locale: 'fr',
    selectMirror: true,
    dayMaxEvents: true,
    // select: function(start, end, allDay)
    // {
    //  var title = prompt("Enter Event Title");
    //  var descriptionEvent = prompt("Enter Event description");
    //  var participant = prompt("Enter Event participant");
    //  var IDSalle = prompt("Enter Event IDSalle");
    //  var UTILNomUtilisateur = prompt("Enter Event NomUtilisateur");
    //  if(title)
    //  {
    //   var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
    //   var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
    //   $.ajax({
    //    url:"insert.php",
    //    type:"POST",
    //    data:{title:title, start:start, end:end, descriptionEvent:descriptionEvent, participant:participant, IDSalle:IDSalle, UTILNomUtilisateur:UTILNomUtilisateur},
    //    success:function()
    //    {
    //     calendar.fullCalendar('refetchEvents');
    //     alert("Added Successfully");
    //    }
    //   })
    //  }
    // },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     var descriptionEvent = event.descriptionEvent;
     var participant = event.participant;
     var IDSalle = event.IDSalle;
     var UTILNomUtilisateur = event.UTILNomUtilisateur;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id, descriptionEvent:descriptionEvent, participant:participant, IDSalle:IDSalle, UTILNomUtilisateur:UTILNomUtilisateur},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Evenement mis à jour');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     var descriptionEvent = event.descriptionEvent;
     var participant = event.participant;
     var IDSalle = event.IDSalle;
     var UTILNomUtilisateur = event.UTILNomUtilisateur;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id, descriptionEvent:descriptionEvent, participant:participant, IDSalle:IDSalle, UTILNomUtilisateur:UTILNomUtilisateur},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Evenement mis à jour");
      }
     });
    },
    // eventClick:function(event)
    // {
    //  if(confirm("Are you sure you want to remove it?"))
    //  {
    //   var id = event.id;
    //   $.ajax({
    //    url:"delete.php",
    //    type:"POST",
    //    data:{id:id},
    //    success:function()
    //    {
    //     calendar.fullCalendar('refetchEvents');
    //     alert("Event Removed");
    //    }
    //   })
    //  }
    // },
    eventClick:function(event)
    {
     if(confirm("Etes vous sur de vouloir supprimer cet évenement ?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Evenement supprimé");
       }
      })
     }
    }
    

   });
  });
   
  </script>
 </head>
 <div class="divparametre">
    <ul id="menu-accordeon">
        <li><a href="#"><img src="parametre.png" class="imageParametre" ></a>
            <ul>
                <li><a href="../Projet_Site_Réservation_Page_Connexion.php">Déconnexion</a></li>
                <?php
                if ($administrateur==1){
                  echo'<li><a href="../Projet_Site_Reservation_Page_Compte.php">Création de compte</a></li>';
                }
                ?>
              </ul>
        </li>
    </ul>
  </div>
 <body>
  <br />
  <br />
  <div class="container">
  <div id="calendar"></div>
  </div>
 </body>
</html>