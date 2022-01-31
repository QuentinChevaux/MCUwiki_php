<?php

    $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

    $movierequest = $connexion_bdd -> prepare('SELECT * FROM film');

    $movierequest -> execute();

    $movies = $movierequest -> fetchAll();

    $title = 'MCUwiki';

    include 'header.php';

?>

<section class="movie_wrapper">

        <div class="watcher">

        <div class="flex_center">

            <?php
        
                foreach($movies as $movie) {

                    setlocale(LC_TIME, "fr_FR","French");
                    $date_fr = strftime("%d %B %Y", strtotime($movie['date']));

                ?>
        
                    <div class='movie_card' style="background-image: url(./assets/image/films/<?= $movie['image'] ?>)">

                        <div class="movie_card_content">

                            <h2> <?= $movie['titre'] ?> </h2>
                        
                            <p> <?= $movie['description'] ?> </p>
                        
                            <p> <?= $date_fr ?> </p>

                        </div>
                    
                    
                    </div>

                    <?php
        
                }

            ?>

        </div>

        </div>


</section>

<?php

    include 'footer.php';

?>