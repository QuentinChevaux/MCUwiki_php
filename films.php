<?php 

    $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

    $moviedisplay = $connexion_bdd -> prepare('SELECT * FROM film WHERE id = '. $_GET["id"] );

    $moviedisplay -> execute();

    $movie = $moviedisplay -> fetch();

    $title = 'Films';

    include 'header.php';

?>

<div class="flex_center div_presentation_film">

    <div class="div_image">
        
        <div style="background-image: url(./assets/image/films/<?= $movie['image'] ?>)"></div>
        
    </div>

    <div class="div_texte">

        <h2> <?= $movie['titre'] ?> </h2>

        <p> <?= $movie['description'] ?> </p>

        <p> <?= $movie['date'] ?> </p>

    </div>

</div>


