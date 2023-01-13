<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();

$id = (isset($_GET['id']) ? $_GET['id'] : null );
if(isset($_GET['action'])){

        switch($_GET['action']){

        case "ListFilms":$ctrlCinema->ListFilms();break;
        case "ListActeurs":$ctrlCinema->ListActeurs();break;
        case "ListRealisateurs":$ctrlCinema->ListRealisateurs();break;
        case "ListGenres":$ctrlCinema->ListGenres();break;
        case "ListRole":$ctrlCinema->ListRole();break;

        case "detailFilm":$ctrlCinema->detailFilm($id);break;
        case "detailActeur":$ctrlCinema->detailActeur($id);break;
        case "detailRealisateur":$ctrlCinema->detailRealisateur($id);break;
        case "detailGenre":$ctrlCinema->detailGenre($id);break;
        case "detailRole":$ctrlCinema->detailRole($id);break; 

        }

}





?>