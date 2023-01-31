<?php
ob_start();
use Model\Connect;

?>

<p>
    Il y a <?= $requete->rowCount() ?> Films
</p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>TITRE</th>
            <th>ID Director</th>

        </tr>

    </thead>

    <tbody>
        <?php
        foreach ($requete->fetchAll() as $film) {
            ?>
            <tr>
                <td><?= $film['id_film']; ?></td>
                <td> <a href="index.php?action=detailFilm&id=<?= $film['id_film'] ?>">
                        <?= $film['title_film']; ?>
                </td>
                <td>
                    <?= $film['id_director']; ?>
                </td>

            </tr>
        <?php } ?>
    </tbody>
</table>

<form action="index.php?action=ajouterFilm" method="POST">
    <p>
    <h3>
        Ajouter un nouveau Film :
    </h3>
    </p>
    <p>
        <label>ID :</label>
        <input type="number" name="id">
    </p>
    <p>
        <label>Title :</label>
        <input type="text" name="title">
    </p>
    <p>
        <label>Year :</label>
        <input type="text" name="year" placeholder="yyyy/mm/dd">
    </p>
    <p>
        <label>Duration :</label>
        <input type="time" name="duration">
    </p>

    <p>
        <label>Image :</label>
        <input type="text" name="image">
    </p>

    <p>
        <?php
        $pdo = Connect::seConnecter();

        $requete1 = $pdo->query("
      SELECT r.id_director , p.fname_person ,p.lname_person 
      FROM director r, person p  
      WHERE r.id_person = p.id_person
  ");

        $requete2 = $pdo->query("
  SELECT id_category ,name_category
  FROM category 
  ");
        ?>
        Director : <select name="iddirector">
            <?php
            foreach ($requete1->fetchAll() as $id) {
                ?>
                <option value="<?= $id['id_director'] ?>">
                    <?php echo $id['fname_person'];
                    echo " " . $id['lname_person']; ?>
                </option>

                <?php
            }
            ?>
        </select>
        <br>
    <p>
        Genre : <select name="genre">
            <?php
            foreach ($requete2->fetchAll() as $genre) {
                ?>
                <option value="<?= $genre['id_category'] ?>">
                    <?= $genre['name_category'] ?>
                </option>

                <?php
            }
            ?>

        </select>
    </p>

    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter Film">
    </p>
</form>

<?php

$titre = "List des films ";
$titre_secondaire = "List des films";
$contenu = ob_get_clean();

require "view/template.php";



?>