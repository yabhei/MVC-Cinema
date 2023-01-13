<?php ob_start() ?>


<table >
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>SEX</th>
            <th>Film</th>
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $acteur){
          ?>
          <tr>
            <td><?= $acteur['prenom_personne'];?></td>
            <td><?= $acteur['nom_personne'];?></td>
            <td><?= $acteur['date_naissance'];?></td>
            <td><?= $acteur['sexe_personne'];?></td>
            <td><?= $acteur['nomf'];?></td>
          </tr>
<?php }?>
    </tbody>
</table>


<?php
$titre = "Details des acteurs ";
$titre_secondaire =  "Details des acteurs";
$contenu = ob_get_clean();

 require "view/template.php";
 ?>