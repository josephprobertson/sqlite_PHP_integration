<?php

require_once('database.php');

if(!empty($_GET['id'])){
  $film_id = intval($_GET['id']);
  
  try {
    $results = $db->prepare('select * from film where film_id = ?');
    $results->bindParam(1, $film_id);
    $results->execute();
  } catch(Exception $e) {
      echo $e->getMessage();
      die();
  }
  $film = $results->fetch(PDO::FETCH_ASSOC);
  if($film == FALSE){
    echo 'Sorry, a film could not be found with the provided ID.';
    die();
  }
}


?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>PHP Data Objects</title>
  <link rel="stylesheet" href="style.css">

</head>

<body id="home">
  
  <h1><?php echo $film['title'];?> - <?php echo $film['release_year']; ?></h1>
  
  <h2><?php echo $film['description']; ?></h2>
  
  <h3>$<?php echo $film['rental_rate']; ?> - <?php echo $film['rental_duration']; ?> day rental</h3>
  <h3>Own it for $<?php echo $film['replacement_cost']; ?></h3>
  
  <ul id="movie_information">
    
    <li>Rated <?php echo $film['rating']; ?></li>
    <li><?php echo $film['length']; ?> minutes</li>
  
  </ul>
  
  <p><?php print_r($film); ?></p>

</body>

</html>

