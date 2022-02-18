<?php

    $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

    $request_movie = $connexion_bdd -> prepare('SELECT * FROM film');
    $request_movie -> execute();
    $movies = $request_movie -> fetchAll();

    $request_serie = $connexion_bdd -> prepare('SELECT * FROM serie');
    $request_serie -> execute();
    $series = $request_serie -> fetchAll();

        // $tableau = [

        //     'id' => '',
        //     'titre' => '',
        //     'description' => '',
        //     'date' => '',
        //     'duree' => '',
        //     'nbepisode' => '', 
        //     'date_fictive' => '',
        //     'image' => '',
        //     'tmdb' => '',
        //     'streaming' => '',
        //     'streaming_link' => ''

        // ];

    foreach($movies as $movie) {

        $tableau[] = [

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

    echo '<pre>';
    var_dump($tableau);
    echo '</pre>';

    $title = 'MCUwiki';

    include 'header.php';

?>

<section class="movie_wrapper">

    <div class="watcher">

        <div>

            <div class="sort_button_div">

                <h2>Choissisez comment vous voulez triez les Films : </h2>

                    <button name='chronological'>Ordre Chronologique</button>

                    <button name='date'>Date de Sortie</button>

            </div>

            <!-- ANCIEN CODE AVEC DOUBLE FOREACH -->

            <!-- <div class="flex_center">
        
                <?php
                
                    // foreach($movies as $movie) {

                    //     $date = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                    //     $date_fr = $date -> format(strtotime($movie['date']));

                ?>

                    <div class="card_margin">

                        <a href="./film.php?id= <?= $movie['id'] ?>">
                    
                            <div class='movie_card' style="background-image: url(./assets/image/films/<?= $movie['image'] ?>)">
            
                                <div class="movie_card_content">
            
                                    <h2> <?= $movie['titre'] ?> </h2>

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
                
                    // }
        
                ?>

                    <?php
                        
                        // foreach($series as $serie) {
            
                        //     $date = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                        //     $date_fr = $date -> format(strtotime($movie['date']));

                    ?>
                        
                        <div class="card_margin">

                            <a href="./serie.php?id=<?= $serie['id'] ?>">
                        
                                <div class='movie_card' style="background-image: url(./assets/image/series/<?= $serie['image'] ?>)">
                
                                    <div class="movie_card_content">
                
                                        <h2> <?= $serie['titre'] ?> </h2>

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
                    
                        // }
                
                    ?>
        
            </div> -->

            <!-- NOUVEAU CODE D'AFFICHAGE -->



        </div>

    </div>

</section>

<?php

    include 'footer.php';

?>