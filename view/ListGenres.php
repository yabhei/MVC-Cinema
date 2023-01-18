<?php
ob_start();?>



<table >
    <thead>
        <tr>
        <th>ID</th>
            <th>TITRE</th>
            
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $genre){
          ?>
          <tr>
            <td><?= $genre['id_category'];?></td>
            <td><a href="index.php?action=detailGenre&id=<?php echo $genre['id_category'];  ?>"><?= $genre['name_category'];?></td>
            
          </tr>
<?php }?>
    </tbody>
</table>

<br>
<form action="index.php?action=ajouterGenre" method="POST" >
    <p>
        <h3>
            Ajouter un nouveau Genre :
        </h3>
    </p>
    <p>
<label >ID :</label>
<input type="number" name="id">
</p>
    <p>
<label >Genre :</label>
<input type="text" name="name">
</p>
<p>
    <input type="submit" name="submit" value="Ajouter Genre">
</p>
</form>

<?php

$titre = "List des genres ";
$titre_secondaire =  "List des genres";
$contenu = ob_get_clean();

require "view/template.php";



?>