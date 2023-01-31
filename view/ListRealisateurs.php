<?php ob_start() ?>


<table id="tab">
    <thead>
        <tr>
            <th>ID Director</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>ID Person</th>
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
                <td><?php echo $real['id_person'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>



<form action="index.php?action=ajouterRealisateur" method="POST">
    <p>
    <h3>
        Ajouter un nouveau Realisateur :
    </h3>
    </p>
    <p>
        <label>ID Director :</label>
        <input type="number" name="id_director">
    </p>
    <p>
        <label>ID person :</label>
        <input type="number" name="id_person">
    </p>
    <p>
        <label>First Name :</label>
        <input type="text" name="firstname">
    </p>
    <p>
        <label>Last Name :</label>
        <input type="text" name="lastname">
    </p>
    <p>
        <label>SEX :</label>
        <input type="text" name="sex_director">
    </p>
    <p>
        <label>Birthday :</label>
        <input type="text" name="birthday" placeholder="yyyy/mm/dd">
    </p>
    <p>
        <label>Image :</label>
        <input type="text" name="image" placeholder="URL photo">
    </p>
    <p>
        <input type="submit" name="submit" value="Ajouter Realisateur">
    </p>
</form>

<?php
$titre = "List des realisateurs ";
$titre_secondaire = "List des realisateurs";
$contenu = ob_get_clean();

require "view/template.php";
?>