<?php

    session_start();

    if(!isset($_SESSION['admin'])) {

        header('Location: .');

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/script.js" defer></script>

    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>

<body>

    <header>

        <div class="deconnexion">

            <a href="deconnexion-admin.php">Se Deconnecter</a>

        </div>        

    </header>

    <div class="adminbutton mt-5">

        <button type='button' class='btn btn-dark' onclick='showMovieForm()'>Ajouter un Film</button>

        <button type='button' class='btn btn-dark' onclick='showSerieForm()'>Ajouter une Serie</button>

    </div>

    <!-- MOVIE FORM -->

    <form action="" method="POST" id="movieform" class="mt-3">

        <div class="w-50 mx-auto">

            <div class="text-end">
                
                <button type="button" class="btn-close" onclick="closeMovieForm()">
                    <span aria-hidden="true"></span>
                </button>

            </div>

            <div class="form-floating mt-4">
        
                <input type="text" name="titre" class="form-control"/>
                <label for="titre" class="form-label">Titre :</label>
            
            </div>
        
            <div class="form-group">
                
                <label for="description" class="form-label mt-4">Description : </label>
                <textarea name="description" rows="3" class="form-control"></textarea>
        
            </div>
        
            <div class="form-floating mt-4">
        
                <input type="text" name="date" class="form-control"/>
                <label for="date" class="form-label">Date de Sortie :</label>
            
            </div>
        
            <div class="form-group">

                <label for="file" class="form-label mt-4">Image :</label>
                <input class="form-control" type="file" name="file" />

            </div>
        
            <div>
        
                <button type="submit" name="valider_movie" class="btn btn-dark w-100 mt-4 dashboard_form_validate_button">Valider</button>
        
            </div>

        </div>

    </form>

    <form action="" method="POST" id="serieform">

    <div class="w-50 mx-auto">

        <div class="text-end">
            
            <button type="button" class="btn-close" onclick="closeSerieForm()">
                <span aria-hidden="true"></span>
            </button>

        </div>

        <div class="form-floating mt-4">

            <input type="text" name="titre" class="form-control"/>
            <label for="titre" class="form-label">Titre :</label>

        </div>

        <div class="form-group">
            
            <label for="description" class="form-label mt-4">Description : </label>
            <textarea name="description" rows="3" class="form-control"></textarea>

        </div>

        <div class="form-floating mt-4">

            <input type="text" name="date" class="form-control"/>
            <label for="date" class="form-label">Date de Sortie :</label>

        </div>

        <div class="form-group">

            <label for="file" class="form-label mt-4">Image :</label>
            <input class="form-control" type="file" name="file" />

        </div>

        <div>

            <button type="submit" name="valider_movie" class="btn btn-dark w-100 mt-4 dashboard_form_validate_button">Valider</button>

        </div>

        </div>
        
    </form>
    
</body>
</html>