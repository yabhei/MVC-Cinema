<?php
ob_start();?>



<table >
    <thead>
        <tr>
            <th>TITRE</th>
            
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $genre){
          ?>
          <tr>
            <td><a href="index.php?action=detailGenre&id=<?php echo $genre['id_genre'];  ?>"><?= $genre['libelle'];?></td>
            
          </tr>
<?php }?>
    </tbody>
</table>

<?php

$titre = "List des genres ";
$titre_secondaire =  "List des genres";
$contenu = ob_get_clean();

require "view/template.php";



?>