<?php
ob_start();
session_start();
?>



<table id="tab">
    <thead>
        <tr>
            <th>ID</th>
            <th>TITRE</th>
            
        </tr>

    </thead>

    <tbody>
        <?php
        foreach($requete->fetchAll() as $role){
          ?>
          <tr>
            <td><?= $role['id_role'];?></td>
            <td><a href="index.php?action=detailRole&id=<?= $role['id_role'] ?>"><?= $role['name_role'];?></td>
           
          </tr>
<?php }?>
    </tbody>
</table>
<br>

<form action="index.php?action=ajouterRole" method="POST" >
    <p>
        <h3>
            Ajouter un nouveau Role :
        </h3>
    </p>
    <p>
<label >ID :</label>
<input type="number" name="id">
</p>
    <p>
<label >Role :</label>
<input type="text" name="name">
</p>
<p>
    <input type="submit" name="submit" value="Ajouter Role">
</p>
</form>

<?php

$titre = "List des roles ";
$titre_secondaire =  "List des roles";
$contenu = ob_get_clean();

require "view/template.php";



?>