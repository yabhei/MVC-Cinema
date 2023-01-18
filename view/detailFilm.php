<?php
ob_start();
$film = $requete->fetch();
?>

<img id="ph" src="<?= $film["image"] ?>" alt="">

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
      
          ?>
          <tr>
          <td><?= $film['id_film'];?></td>
            <td>  <h2> <?= $film['title_film'];?></h2> </td>
            <td><?= $film['year_film'];?></td>
            <td><?= $film['duration_film'];?></td>
            <td><?= $film['fname_person'];?></td>
            <td><?= $film['name_category'];?></td>
          </tr>
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
            <td> <?= $cast['fname_person'];?> </td>
            <td><?= $cast['lname_person'];?></td>
            <td><?= $cast['name_role'];?></td>
           
<?php }?>
    </tbody>
</table>

<?php

$titre = "Details de film ";
$titre_secondaire =  "Details de film";
$contenu = ob_get_clean();

require "view/template.php";



?>