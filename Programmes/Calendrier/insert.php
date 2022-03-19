<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=bdd_prixy', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (title, start_event, end_event, descriptionEvent, participant, IDSalle, UTILNomUtilisateur) 
 VALUES (:title, :start_event, :end_event, :descriptionEvent, :participant, :IDSalle, :UTILNomUtilisateur)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':descriptionEvent' => $_POST['descriptionEvent'],
   ':participant' => $_POST['participant'],
   ':IDSalle' => $_POST['IDSalle'],
   ':UTILNomUtilisateur' => $_POST['UTILNomUtilisateur']
  )
 );
}


?>