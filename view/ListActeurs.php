<?php ob_start() ?>


<table id="tab">
    <thead>
        <tr>
        <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>SEX</th>
            <th>ID Person</th>
        </tr>

    </thead>

    <tbody>
        <?php
        foreach ($requete->fetchAll() as $acteur) {
            ?>
            <tr>
                <td><?= $acteur['id_actor'] ?></td>
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
                <td><?= $acteur['id_person'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>



<form action="index.php?action=ajouterRole" method="POST" >
    <p>
        <h3>
            Ajouter un nouvel Acteur :
        </h3>
    </p>
    <p>
<label >ID :</label>
<input type="number" name="id">
</p>
    <p>
<label >First Name :</label>
<input type="text" name="name">
</p>
<p>
<label >First Name :</label>
<input type="text" name="name">
</p>
<p>
    <input type="submit" name="submit" value="Ajouter Role">
</p>
</form>

<?php
$titre = "List des acteurs. ";
$titre_secondaire = "List des acteurs :";
$contenu = ob_get_clean();

require "view/template.php";
?>