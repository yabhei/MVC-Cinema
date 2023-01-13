<?php
ob_start();?>



<table >
    <thead>
        <tr>
           
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
            <th>DUREE</th>
            <th>REALISATEUR</th>
            <th>GENRE</th>
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $filmd){
          ?>
          <tr>
            <td>  <h2> <?= $filmd['nom_film'];?></h2> </td>
            <td><?= $filmd['date_sortie'];?></td>
            <td><?= $filmd['duree'];?></td>
            <td><?= $filmd['prenom_personne'];?></td>
            <td><?= $filmd['libelle'];?></td>
          </tr>
<?php }?>
    </tbody>
</table>

<p>
    <h3>
        CASTING : 
    </h3>
</p>
<table >
    <thead>
        <tr>
           
            <th>First Name</th>
            <th>Last Name</th>
            <th>Role</th>
           
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($castreque->fetchAll() as $cast){
          ?>
          <tr>
            <td> <?= $cast['prenom_personne'];?> </td>
            <td><?= $cast['nom_personne'];?></td>
            <td><?= $cast['nom_role'];?></td>
           
<?php }?>
    </tbody>
</table>

<?php

$titre = "Details de film ";
$titre_secondaire =  "Details de film";
$contenu = ob_get_clean();

require "view/template.php";



?>