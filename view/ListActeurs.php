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
        foreach($requete->fetchAll() as $acteur){
          ?>
          <tr>
            <td><a href="index.php?action=detailActeur&id=<?php echo $acteur['id_acteur'] ?>" ><?= $acteur['prenom_personne'];?></td>
            <td><a href="index.php?action=detailActeur&id=<?php echo $acteur['id_acteur'] ?>" ><?= $acteur['nom_personne'];?></td>
            <td><?= $acteur['date_naissance'];?></td>
            <td><?= $acteur['sexe_personne'];?></td>
          </tr>
<?php }?>
    </tbody>
</table>


<?php
$titre = "List des acteurs ";
$titre_secondaire =  "List des acteurs";
$contenu = ob_get_clean();

 require "view/template.php";
 ?>


