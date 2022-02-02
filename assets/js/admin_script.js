// SHOW MOVIE OR SERIE FORM

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

document.getElementById('btn_radio_non').addEventListener('click', () => {

    if_radio_non();

});

document.getElementById('btn_radio_oui').addEventListener('click', () => {

    if_radio_oui();

});


function if_radio_non() {

    if (document.getElementById('btn_radio_non').checked) {
    
        document.getElementById('film_order').style.display = 'block';
    
    }

}

function if_radio_oui() {

    if (document.getElementById('btn_radio_oui').checked) {
    
        document.getElementById('film_order').style.display = 'none';
    
    }

}

