<?php 

    $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

    $seriequery = $connexion_bdd -> prepare('SELECT * FROM serie WHERE id = '. $_GET["id"] );

    $seriequery -> execute();

    $serie = $seriequery -> fetch();

    $title = 'Serie';

    include 'header.php';

?>

<div class="flex_center div_presentation_film">

    <div class="div_image">
        
        <div style="background-image: url(./assets/image/films/<?= $serie['image'] ?>)"></div>
        
    </div>

    <div class="div_texte">

        <h2> <?= $serie['titre'] ?> </h2>

        <p> <?= $serie['description'] ?> </p>

            <?php 

                setlocale(LC_TIME, "French.UTF-8");
                $date_fr = strftime("%d %B %Y", strtotime($serie['date']));

            ?>

        <p> <?= $date_fr ?> </p>

    </div>

</div>


