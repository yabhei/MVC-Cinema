<?php
ob_start();?>



<table id="tab">
    <thead>
        <tr>
            <th>TITRE</th>
            
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $role){
          ?>
          <tr>
            <td><a href="index.php?action=detailRole&id=<?= $role['id_role'] ?>"><?= $role['nom_role'];?></td>
           
          </tr>
<?php }?>
    </tbody>
</table>

<?php

$titre = "List des roles ";
$titre_secondaire =  "List des roles";
$contenu = ob_get_clean();

require "view/template.php";



?>