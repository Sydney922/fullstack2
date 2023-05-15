<?php
require_once('../include.php');

$req_sql = "SELECT id, nom FROM utilisateurs ";

$q = $db->prepare("SELECT * FROM utilisateurs ");
$q->execute();

$req_membres = $q->fetchAll();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Membres </title>
    </head>
<header>

</header>
    <body>
        <?php
            require_once('../menu.php');
        ?>
    <div class="row">
        <h1>Membres</h1>
    </div>
    <?php 
        foreach($req_membres as $all_membres){
    ?>
    <div class="col-4">
        <div><?= $all_membres['prenom'] ?></div>
        <div><a href="profil/voir-profil?id=<?= $all_membres['id']?>">Voir Profil</a></div>
    </div>
    <?php       
        }
    ?>
    </body>

</html>