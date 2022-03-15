<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=bdd_prixy', 'root', '');

$data = array();

$query = "SELECT * FROM reservation ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"],
  'descriptionEvent'   => $row["descriptionEvent"],
  'participant'   => $row["participant"],
  'IDSalle'   => $row["IDSalle"],
  'UTILNomUtilisateur'   => $row["UTILNomUtilisateur"]
 );
}

echo json_encode($data);

?>