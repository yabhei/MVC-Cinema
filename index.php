<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>
        <?= $titre ?>
    </title>
</head>

<body>
    <div>
        <main>
            <nav>
                <ul>
                    <li><a href="index.php?action=ListFilms">Liste des films</a></li>
                    <li><a href="index.php?action=ListActeurs">Liste des acteurs</a></li>
                    <li><a href="index.php?action=ListRealisateurs">Liste des realisateurs</a></li>
                    <li><a href="index.php?action=ListGenres">Liste des genres</a></li>
                    <li><a href="index.php?action=ListRole">Liste des role</a></li>
                </ul>
            </nav>

            <!-- <nav>
                <ul>
                    <li><a href="index.php?action=ListFilms">Ajouter un film</a></li>
                    <li><a href="index.php?action=ListActeurs">Ajouter un acteur</a></li>
                    <li><a href="index.php?action=ListRealisateurs">Ajouter un realisateur</a></li>
                    <li><a href="index.php?action=ListGenres">Ajouter un genre</a></li>
                    <li><a href="index.php?action=ListRole">Ajouter un role</a></li>
                </ul>
            </nav> -->
        </main>
    </div>
</body>

</html>

<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();

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

        // case "detailFilm":$ctrlCinema->detailFilm($id);break;
        // case "detailActeur":$ctrlCinema->detailActeur($id);break;
        // case "detailRealisateur":$ctrlCinema->detailRealisateur($id);break;
        // case "detailGenre":$ctrlCinema->detailGenre($id);break;
        // case "detailRole":$ctrlCinema->detailRole($id);break; 

    }

}





?>