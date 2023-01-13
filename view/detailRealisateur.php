<?php ob_start() ?>


<table >
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Film</th>
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $real){
          ?>
          <tr>
            <td><?= $real['prenom_personne'];?></td>
            <td><?= $real['nom_personne'];?></td>
            <td><?= $real['nom_film'];?></td>
          </tr>
<?php }?>
    </tbody>
</table>


<?php
$titre = "Details des realisateur ";
$titre_secondaire =  "Details des realisateur";
$contenu = ob_get_clean();

 require "view/template.php";
 ?>


