<?php ob_start() ?>


<table id="tab">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>SEX</th>
        </tr>

    </thead>

    <tbody>
        <?php
        foreach ($requete->fetchAll() as $acteur) {
            ?>
            <tr>
                <td><a href="index.php?action=detailActeur&id=<?php echo $acteur['id_actor'] ?>">
                        <?= $acteur['fname_person']; ?>
                </td>
                <td><a href="index.php?action=detailActeur&id=<?php echo $acteur['id_actor'] ?>">
                        <?= $acteur['lname_person']; ?>
                </td>
                <td>
                    <?= $acteur['birthday_person']; ?>
                </td>
                <td><?= $acteur['sex_person']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php
$titre = "List des acteurs. ";
$titre_secondaire = "List des acteurs :";
$contenu = ob_get_clean();

require "view/template.php";
?>