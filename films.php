<?php 

    $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

    $moviedisplay = $connexion_bdd -> prepare('SELECT * FROM film WHERE id = '. $_GET["id"] );

    $moviedisplay -> execute();

    $movie = $moviedisplay -> fetch();

    $title = 'Films';

    include 'header.php';

?>

<p><?= $movie['titre'] ?></p>


