<?php ob_start() ?>


<table id="tab">
    <thead>
        <tr>
        <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>

    </thead>

    <tbody>
        <?php
        foreach ($requete->fetchAll() as $real) {
            ?>
            <tr>
                <td><?= $real['id_director'] ?></td>
                <td><a href="index.php?action=detailRealisateur&id=<?php echo $real['id_director'] ?>">
                        <?= $real['fname_person']; ?>
                </td>
                <td><a href="index.php?action=detailRealisateur&id=<?php echo $real['id_director'] ?>">
                        <?= $real['lname_person']; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<a href="index.php?action=ListRealisateurs">Ajouter un realisateur</a>

<?php
$titre = "List des realisateurs ";
$titre_secondaire = "List des realisateurs";
$contenu = ob_get_clean();

require "view/template.php";
?>