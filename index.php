<?php

require_once('database.php');

try {
    $results = $db->query('select * from film');
} catch(Exception $e) {
    echo $e->getMessage();
    die();
}

$films = $results->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>PHP Data Objects</title>
  <link rel="stylesheet" href="style.css">

</head>

<body id="home">

  <h1>Sakila Sample Database</h1>

  <h2>Films by Title</h2>

  <ol>
  <?php
    foreach($films as $film){
      echo'<li><i class="lens"></i><a href="films.php?id='.$film["film_id"].'">'.$film["title"].'</li>';
    }

  ?>
  </ol>

</body>

</html>


