<?php 
ob_start();

$acteur = $requete->fetch();

?>
<img src="<?= $acteur['image'] ?>" >
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
      
          <tr>
            <td><?= $acteur['fname_person'];?></td>
            <td><?= $acteur['lname_person'];?></td>
            <td><?= $acteur['birthday_person'];?></td>
            <td><?= $acteur['sex_person'];?></td>
            <td><?= $acteur['nomf'];?></td>
          </tr>

    </tbody>
</table>


<?php
$titre = "Details des acteurs ";
$titre_secondaire =  "Details des acteurs";
$contenu = ob_get_clean();

 require "view/template.php";
 ?>