<?php 

    $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

    $seriequery = $connexion_bdd -> prepare('SELECT * FROM serie WHERE id = '. $_GET["id"] );

    $seriequery -> execute();

    $serie = $seriequery -> fetch();

    $title = 'Serie';

    include 'header.php';

?>

</div>

<div class="flex_center div_presentation_film">

    <div class="div_image">
        
        <div style="background-image: url(./assets/image/series/<?= $serie['image'] ?>)"></div>
        
    </div>

    <div class="div_texte">

        <h2> <?= $serie['titre'] ?> </h2>

        <p class="movie_page_card_duration_text"> Nombre d'Épisodes : <span><?= $serie['nbepisode'] ?></span> </p>

            <?php 

                $date = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                $date_fr = $date -> format(strtotime($movie['date']));

            ?>

        <p class="movie_page_card_release_text capitalize"> Date de Sortie de la Serie : <span><?= $date_fr ?></span> </p>

        <p class="movie_page_card_description_text"> <span><?= $serie['description'] ?></span> </p>

        <?php 

            if($serie['streaming_link'] != null) {
                ?>
                    
                    <div class="streaming_link_button flex">

                        <div class="align-center">

                            <p class="movie_page_streaming">Disponible sur : </p>

                        </div>

                        <div class="logo_streaming">

                            <a href="<?= $serie['streaming_link'] ?>" target='_blank'> <img src="./assets/image/disney+_logo.jpg" alt="Logo disney+" /></a>

                        </div>

                    </div>

            <?php

            }
            else {
                ?>
                    <p class="movie_page_streaming">Disponible sur Aucune Platforme de Streaming</p>

            <?php

            }

        ?>

    </div>

</div>

