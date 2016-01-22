<?php

function connect() {
  global $pdo;
  $pdo = new PDO("mysql:host=localhost;dbname=sakila", "root", "root");
}

function get_actors_by_last_name( $letter ) {
  global $pdo;

  $stmt = $pdo->prepare('
    SELECT actor_id, first_name, last_name
    FROM actor
    WHERE last_name LIKE :letter
    LIMIT 25');

  $stmt->execute( array( ':letter' => $letter. '%' ) );

  return $stmt->fetchAll( PDO::FETCH_OBJ );
}

function get_actor_info( $actor_id ) {
  global $pdo;

  $stmt = $pdo->prepare('
    SELECT first_name, last_name, title
    FROM film_actor
    CROSS JOIN film
    CROSS JOIN actor
    WHERE film.film_id = film_actor.film_id
      AND film_actor.actor_id = :actor_id
      AND actor.actor_id = :actor_id
    ');

  $stmt->execute( array( ':actor_id' => $actor_id ) );

  return $stmt->fetchAll( PDO::FETCH_OBJ );
}