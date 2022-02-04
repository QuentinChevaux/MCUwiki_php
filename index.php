<?php

    $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

    $request = $connexion_bdd -> prepare('SELECT * FROM film');

    $request -> execute();

    $movies = $request -> fetchAll();

    $request2 = $connexion_bdd -> prepare('SELECT * FROM serie');

    $request2 -> execute();

    $series = $request2 -> fetchAll();

    $title = 'MCUwiki';

    include 'header.php';

?>

<section class="movie_wrapper">

    <div class="watcher">

        <div>

            <div class="sort_button_div">

                <h2>Choissisez comment vous voulez triez les Films : </h2>

                <button onclick="sortChronological()">Ordre Chronologique</button>

                <button onclick="sortDate()">Date de Sortie</button>

            </div>

            <div class="flex_center">
        
                <?php
                
                    foreach($movies as $movie) {
        
                        setlocale(LC_TIME, "French.UTF-8");
                        $date_fr = strftime("%d %B %Y", strtotime($movie['date']));

                    ?>

                    <div class="card_margin">

                        <a href="./film.php?id=<?= $movie['id'] ?>">
                    
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
                
                    }
        
                ?>

                    <?php
                        
                        foreach($series as $serie) {
            
                            setlocale(LC_TIME, "French.UTF-8");
                            $date_fr = strftime("%d %B %Y", strtotime($serie['date']));

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
                    
                        }
                
                    ?>
        
            </div>

        </div>

    </div>

</section>

<?php

    include 'footer.php';

?>