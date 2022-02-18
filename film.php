<?php 

    $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

    $moviedisplay = $connexion_bdd -> prepare('SELECT * FROM film WHERE id = '. $_GET["id"] );

    $moviedisplay -> execute();

    $movie = $moviedisplay -> fetch();

    $title = 'Film';

    include 'header.php';

?>

<div class="flex_center div_presentation_film">

    <div class="div_image">
        
        <div style="background-image: url(./assets/image/films/<?= $movie['image'] ?>)"></div>
        
    </div>

    <div class="div_texte">

        <h2> <?= $movie['titre'] ?> </h2>

            <?php

                if($movie['duree'] >= 120) {

                    $texte_heure = ' heures';

                }

                else {

                    $texte_heure = ' heure';

                }

                $duration_converted = intdiv($movie['duree'], 60) . $texte_heure . " et " . ($movie['duree'] % 60) . " minutes.";

            ?>

        <p class="movie_page_card_duration_text"> Durée du Film : <span><?= $duration_converted ?></span> </p>

            <?php 

                setlocale(LC_TIME, "French.UTF-8");
                $date_fr = strftime("%d %B %Y", strtotime($movie['date']));

            ?>

        <p class="movie_page_card_release_text capitalize"> Date de Sortie du Film : <span><?= $date_fr ?></span> </p>

        <p class="movie_page_card_description_text"> <span><?= $movie['description'] ?></span> </p>

        <?php 

            if($movie['streaming'] != null) {

                if($movie['streaming'] == 'disney') {
                ?>
                    <div class="streaming_link_button flex">

                        <div class="align-center">

                            <p class="movie_page_streaming">Disponible sur : </p>

                        </div>

                        <div class="logo_streaming">

                            <a href="<?= $movie['streaming_link'] ?>" target='_blank'> <img src="./assets/image/disney+_logo.jpg" alt="Logo disney+" /></a>

                        </div>

                    </div>

            <?php

                }

                if($movie['streaming'] == 'netflix') {
                    ?>

                    <div class="streaming_link_button flex">

                        <div class="align-center">

                            <p class="movie_page_streaming">Disponible sur : </p>

                        </div>

                        <div class="logo_streaming">

                            <a href="<?= $movie['streaming_link'] ?>" target='_blank'> <img src="./assets/image/netflix_logo.png" alt="Logo Netflix" class="logo_netflix"/></a>

                        </div>

                    </div>

                <?php

                }

                if($movie['streaming'] == 'prime') {
                    ?>

                    <div class="streaming_link_button flex">

                        <div class="align-center">

                            <p class="movie_page_streaming">Disponible sur : </p>

                        </div>

                        <div class="logo_streaming">

                            <a href="<?= $movie['streaming_link'] ?>" target='_blank'> <img src="./assets/image/netflix_logo.png" alt="Logo Netflix" class="logo_netflix"/></a>

                        </div>

                    </div>

                <?php

                }

            } else {
                ?>

                    <p class="movie_page_streaming">Disponible sur Aucune Platforme de Streaming</p>

            <?php

            }

        ?>

    </div>

</div>



