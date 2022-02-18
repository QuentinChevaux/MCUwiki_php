<?php

    $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

    $request_movie = $connexion_bdd -> prepare('SELECT * FROM film');
    $request_movie -> execute();
    $movies = $request_movie -> fetchAll();

    $request_serie = $connexion_bdd -> prepare('SELECT * FROM serie');
    $request_serie -> execute();
    $series = $request_serie -> fetchAll();

    foreach($movies as $movie) {

        $tableau[] = [

            'type' => 'film',
            'id' => $movie['id'],
            'titre' => $movie['titre'],
            'description' => $movie['description'],
            'date' => $movie['date'],
            'duree' => $movie['duree'],
            'date_fictive' => $movie['date_fictive'],
            'image' => $movie['image'],
            'tmdb' => $movie['tmdb'],
            'streaming' => $movie['streaming'],
            'streaming_link' => $movie['streaming_link']

        ];

    }

    foreach($series as $serie) {

        $tableau[] = [

            'type' => 'serie',
            'id' => $serie['id'],
            'titre' => $serie['titre'],
            'description' => $serie['description'],
            'date' => $serie['date'],
            'nbepisode' => $serie['nbepisode'],
            'date_fictive' => $serie['date_fictive'],
            'image' => $serie['image'],
            'tmdb' => $serie['tmdb'],
            'streaming_link' => $serie['streaming_link']

        ];

    }

    // function sortDate($a, $b) {

    //     return strtotime($a['date']) - strtotime($b['date']);

    // }

    // function sortChronologie($a, $b) {

    //     return strtotime($a['date_fictive']) - strtotime($b['date_fictive']);

    // }

    // usort($tableau, 'sortDate');

    $title = 'MCUwiki';

    include 'header.php';

?>

<section class="movie_wrapper">

    <div class="watcher">

        <div>

            <div class="sort_button_div">

                <h2>Choissisez comment vous voulez triez les Films : </h2>

                    <button onClick="sortChronologie(<?= json_encode($tableau) ?>)">Ordre Chronologique</button>

                    <button onClick="sortDate(<?= json_encode($tableau) ?>)">Date de Sortie</button>

            </div>

            <!-- ANCIEN CODE AVEC DOUBLE FOREACH -->

            <div class="flex_center">
        
                <?php
                
                    for($i = 0; $i < count($tableau); $i++) {

                        $date = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                        $date_fr = $date -> format(strtotime($tableau[$i]['date']));

                        if($tableau[$i]['type'] == 'film') {

                ?>

                    <div class="card_margin">

                        <a href="./film.php?id= <?= $tableau[$i]['id'] ?>">
                    
                            <div class='movie_card' style="background-image: url(./assets/image/films/<?= $tableau[$i]['image'] ?>)">
            
                                <div class="movie_card_content">
            
                                    <h2> <?= $tableau[$i]['titre'] ?> </h2>

                                    <div class="savoir_plus">

                                        <img class="card_description_img" src="./assets/image/arrow.png" alt="">
                                        <p class="card_description">En savoir plus</p>

                                    </div>

                                    <p class="card_date capitalize"> <?= $date_fr ?> </p>
            
                                </div>
                                
                            </div>

                        </a>

                    </div>
        
                        <?php
                
                    } else if($tableau[$i]['type'] == 'serie') {
        
                ?>

                    <div class="card_margin">

                    <a href="./serie.php?id= <?= $tableau[$i]['id'] ?>">

                        <div class='movie_card' style="background-image: url(./assets/image/series/<?= $tableau[$i]['image'] ?>)">

                            <div class="movie_card_content">

                                <h2> <?= $tableau[$i]['titre'] ?> </h2>

                                <div class="savoir_plus">

                                    <img class="card_description_img" src="./assets/image/arrow.png" alt="">
                                    <p class="card_description">En savoir plus</p>

                                </div>

                                <p class="card_date capitalize"> <?= $date_fr ?> </p>

                            </div>
                            
                        </div>

                    </a>

                    </div>   
                
                <?php

                    }

                }

                ?>

            </div>

            <!-- NOUVEAU CODE D'AFFICHAGE -->

        </div>

    </div>

</section>

<?php

    include 'footer.php';

?>