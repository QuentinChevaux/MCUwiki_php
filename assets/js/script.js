function showMovieForm() {

    if( document.getElementById('serieform').style.display == 'block') {

        alert('Fermez le formulaire Serie');

    }

    else {

        document.getElementById('movieform').style.display = 'block';

    }

}

function closeMovieForm() {

    document.getElementById('movieform').style.display = 'none';

}

function showSerieForm() {

    if( document.getElementById('movieform').style.display == 'block') {

        alert('Fermez le formulaire Film');

    }

    else {

        document.getElementById('serieform').style.display = 'block';

    }

}

function closeSerieForm() {

    document.getElementById('serieform').style.display = 'none';

}