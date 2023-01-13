<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title><?php $titre ?></title>
</head>
<body>
    <div>
        <main>
            <nav>
                <ul>
                    <li><a href="index.php?action=ListFilms" >Liste des films</a></li>
                    <li><a href="index.php?action=ListActeurs">Liste des acteurs</a></li>
                    <li><a href="index.php?action=ListRealisateurs">Liste des realisateurs</a></li>
                    <li><a href="index.php?action=ListGenres">Liste des genres</a></li>
                    <li><a href="index.php?action=ListRole">Liste des role</a></li>
                </ul>
            </nav>
            <div>
                <h1>PDO Cinema</h1>
                <h2><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
</body>
</html>