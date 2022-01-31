<?php

    session_start();

    if(!isset($_SESSION['admin'])) {

        header('Location: .');

    }

    if(isset($_POST['valider_movie'])) {

        $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

        $movieinsert = $connexion_bdd -> prepare('INSERT INTO film (`titre`, `description`, `date`, `image`)
                                                  VALUES (?, ?, ?, ?) ');

        // Count total files
        $countfiles = count($_FILES['image']['name']);

        // Loop all files
        for($i=0; $i<$countfiles; $i++){

            // File name
            $filename = $_FILES['image']['name'][$i];

            // Location
            $target_file = './assets/image/films/'.$filename;

            // file extension
            $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);

            // Valid image extension
            $valid_extension = array("png","jpeg","jpg");

            if(in_array($file_extension, $valid_extension)){

                // Upload file
                if(move_uploaded_file($_FILES['image']['tmp_name'][$i],$target_file)){

                     // Execute query
                     $movieinsert -> execute([ $_POST['titre'], $_POST['description'], $_POST['date'], $filename]);

                }

            }
 
        }

        header('Location: ./dashboard.php');

    }

    if(isset($_POST['valider_serie'])) {

        $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');

        $movieinsert = $connexion_bdd -> prepare('INSERT INTO serie (`titre`, `description`, `date`)
                                                  VALUES (?, ?, ?) ');

        $movieinsert -> execute([ $_POST['titre'], $_POST['description'], $_POST['date'] ]);

        header('Location: ./dashboard.php');

    }

?>