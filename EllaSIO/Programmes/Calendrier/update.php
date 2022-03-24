<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname=bdd_prixy', 'root', '');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE reservation 
 SET title=:title, start_event=:start_event, end_event=:end_event, descriptionEvent=:descriptionEvent, participant=:participant, IDSalle=:IDSalle, UTILNomUtilisateur=:UTILNomUtilisateur  
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id'],
   ':descriptionEvent' => $_POST['descriptionEvent'],
   ':participant' => $_POST['participant'],
   ':IDSalle' => $_POST['IDSalle'],
   ':UTILNomUtilisateur' => $_POST['UTILNomUtilisateur']
  )
 );
}

?>