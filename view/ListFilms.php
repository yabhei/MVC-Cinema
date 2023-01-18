<?php
ob_start();?>

<p>
    Il y a <?= $requete->rowCount() ?> Films
</p>

<table >
    <thead>
        <tr>
            <th>TITRE</th>
            
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $film){
          ?>
          <tr>
            <td> <a href="index.php?action=detailFilm&id=<?= $film['id_film'] ?>"><?= $film['title_film'];?> </td>
            
          </tr>
<?php }?>
    </tbody>
</table>

<?php

$titre = "List des films ";
$titre_secondaire =  "List des films";
$contenu = ob_get_clean();

require "view/template.php";



?>