<?php

//delete.php

if(isset($_POST["id"]))
{
 echo 'test';
}

?>


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
        window.location.replace("../Choix_Bouton.php");
        calendar.fullCalendar('refetchEvents');
        alert("Evenement supprimé");
       }
      })
     }
    }