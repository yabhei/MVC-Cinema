<?php ob_start() ?>


<table id="tab">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $real){
          ?>
          <tr>
            <td><a href="index.php?action=detailRealisateur&id=<?php echo $real['id_realisateur'] ?>"><?= $real['prenom_personne'];?></td>
            <td><a href="index.php?action=detailRealisateur&id=<?php echo $real['id_realisateur'] ?>"><?= $real['nom_personne'];?></td>
          </tr>
<?php }?>
    </tbody>
</table>


<?php
$titre = "List des realisateurs ";
$titre_secondaire =  "List des realisateurs";
$contenu = ob_get_clean();

 require "view/template.php";
 ?>


