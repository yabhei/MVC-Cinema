<!-- <nav>
                <ul>
                    <li><a href="index.php?action=ListFilms">Ajouter un film</a></li>
                    <li><a href="index.php?action=ListActeurs">Ajouter un acteur</a></li>
                    <li><a href="index.php?action=ListRealisateurs">Ajouter un realisateur</a></li>
                    <li><a href="index.php?action=ListGenres">Ajouter un genre</a></li>
                    <li><a href="index.php?action=ListRole">Ajouter un role</a></li>
                </ul>
            </nav> -->

<?php

use Controller\CinemaController;
use Controller\HomeController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$ctrlHome = new HomeController();

$id = (isset($_GET['id']) ? $_GET['id'] : null);
if (isset($_GET['action'])) {

    switch ($_GET['action']) {

        case "ListFilms":
            $ctrlCinema->ListFilms();
            break;
        case "ListActeurs":
            $ctrlCinema->ListActeurs();
            break;
        case "ListRealisateurs":
            $ctrlCinema->ListRealisateurs();
            break;
        case "ListGenres":
            $ctrlCinema->ListGenres();
            break;
        case "ListRole":
            $ctrlCinema->ListRole();
            break;

        case "detailFilm":
            $ctrlCinema->detailFilm($id);
            break;
        case "detailActeur":
            $ctrlCinema->detailActeur($id);
            break;
        case "detailRealisateur":
            $ctrlCinema->detailRealisateur($id);
            break;
        case "detailGenre":
            $ctrlCinema->detailGenre($id);
            break;
        case "detailRole":
            $ctrlCinema->detailRole($id);
            break;

        case "ajouterRole":
            if (isset($_POST['submit'])) {
                $ctrlCinema->ajouterRole($_POST['id'], $_POST['name']);
                break;
            } else {
                echo "No submit ";
            }

        case "ajouterGenre":
            if (isset($_POST['submit'])) {
                $ctrlCinema->ajouterGenre($_POST['id'], $_POST['name']);
                break;
            } else {
                echo "No submit ";
            }

        case "ajouterFilm":
            if (isset($_POST['submit'])) {
                $ctrlCinema->ajouterFilm($_POST['id'], $_POST['title'], $_POST['year'], $_POST['duration'], $_POST['iddirector'], $_POST['image']);
                $ctrlCinema->ajouterGenreFilm($_POST['id'], $_POST['genre']);
                break;
            } else {
                echo "No submit ";
            }

        case "ajouterRealisateur":
            if (isset($_POST['submit'])) {
                $ctrlCinema->ajouterperson($_POST['id_person'], $_POST['firstname'], $_POST['lastname'], $_POST['sex_director'], $_POST['birthday'], $_POST['image']);
                $ctrlCinema->ajouterRealisateur($_POST['id_director'], $_POST['id_person']);
                break;
            } else {
                echo "No submit ";
            }


    }

} else {
    $ctrlHome->home();
}





?>