<?php
ob_start();?>



<table id="tab">
    <thead>
        <tr>
            <th> GENRE</th>
            <th>TITRE FILM</th>

            
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $genre){
          ?>
          <tr>
            <td><?= $genre['name_category'];?></td>
            <td><?= $genre['title_film'];?></td>
            
          </tr>
<?php }?>
    </tbody>
</table>

<?php

$titre = "Details de genre ";
$titre_secondaire =  "Details de genre";
$contenu = ob_get_clean();

require "view/template.php";



?>