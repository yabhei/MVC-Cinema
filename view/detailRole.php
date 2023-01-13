<?php
ob_start();?>



<table >
    <thead>
        <tr>
            <th>ROLE</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Film</th>
            
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $detailrole){
          ?>
          <tr>
            <td><?= $detailrole['nom_role'];?></td>
            <td><?= $detailrole['fn'];?></td>
            <td><?= $detailrole['ln'];?></td>
            <td><?= $detailrole['nomf'];?></td>
           
          </tr>
<?php }?>
    </tbody>
</table>

<?php

$titre = "Details des roles ";
$titre_secondaire =  "Details des roles";
$contenu = ob_get_clean();

require "view/template.php";



?>