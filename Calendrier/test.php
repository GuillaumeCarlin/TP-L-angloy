<?php

$date = date('d-m-y h:i:s');
$query = "UPDATE `events` SET `horodatage` = '04-03-22 07:57:14' WHERE `events`.`id` = 1;";
$result = mysqli_query($mysqli, $query);

$con = mysqli_connect('localhost','root','');
if ($con) {
    $connectdb = mysqli_select_db($con, 'bdd_prixy');
    if ($connectdb) {
        $query = "UPDATE `events` SET `horodatage` = '$date' WHERE `events`.`id` = 1;";
        $result = mysqli_query($mysqli, $query);
    }
    else {
        echo 'Erreur de connexion à la base de donnée';
    }
}
else {
    echo 'Erreur de connexion au serveur';
}




?>


<!-- eventClick:function(event)
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
        window.location.replace("../Choix_Bouton.php");
        calendar.fullCalendar('refetchEvents');
        alert("Evenement supprimé");
       }
      })
     }
    } -->