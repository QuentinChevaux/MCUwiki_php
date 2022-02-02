<?php

    session_start();

    if(!isset($_SESSION['admin'])) {

        header('Location: .');

    }

    include 'admin_header.php';

?>

    <header>

        <div class="deconnexion flex_between">

            <a href="./">Retourner a la Page Principale</a>

            <a href="deconnexion-admin.php">Se Deconnecter</a>

        </div>        

    </header>

    <div class="adminbutton mt-5">

        <button type='button' class='btn btn-dark' onclick='showMovieForm()'>Ajouter un Film</button>

        <button type='button' class='btn btn-dark' onclick='showSerieForm()'>Ajouter une Serie</button>

    </div>

    <!-- MOVIE FORM -->

    <form action="insert.php" method="POST" enctype='multipart/form-data' id="movieform" class="mt-3">

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
        
                <input type="date" name="date" class="form-control"/>
                <label for="date" class="form-label">Date de Sortie :</label>
            
            </div>

            <p class="mt-4">A la suite dans la Chronologie ?</p>

            <div class="btn-group radio_button w-100" role="group" aria-label="Basic radio toggle button group">

                <input type="radio" class="btn-check" name="btnradio" id="btn_radio_oui" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btn_radio_oui">Oui</label>

                <input type="radio" class="btn-check" name="btnradio" id="btn_radio_non" autocomplete="off">
                <label class="btn btn-outline-primary" for="btn_radio_non">Non</label>

            </div>

            <div class="form-floating mt-4" id="film_order">
        
                <input type="number" name="ordre" class="form-control"/>
                <label for="ordre" class="form-label">Ordre du Film :</label>
            
            </div>

            <div class="form-group">

                <label for="file" class="form-label mt-4">Image :</label>
                <input class="form-control" type="file" name="image" />

            </div>
        
            <div>
        
                <button type="submit" name="valider_movie" class="btn btn-dark w-100 mt-4 dashboard_form_validate_button">Valider</button>
        
            </div>

        </div>

    </form>

    <!-- SERIE FORM -->

    <form action="insert.php" method="POST" enctype='multipart/form-data' id="serieform" class="mt-3">

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

            <input type="date" name="date" class="form-control"/>
            <label for="date" class="form-label">Date de Sortie :</label>

        </div>

        <div class="form-group">

            <label for="file" class="form-label mt-4">Image :</label>
            <input class="form-control" type="file" name="image" />

        </div>

        <div>

            <button type="submit" name="valider_serie" class="btn btn-dark w-100 mt-4 dashboard_form_validate_button">Valider</button>

        </div>

        </div>
        
    </form>

</body>
</html>