<?php
require_once('../include.php');

if(!isset($_SESSION['id'])){
    header('Location: index.php');
    exit;
}

$q = $db->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$q->execute([$_SESSION['id']]);

$req_profil = $q->fetch();

$date = date_create($req_profil['date_creation']);
$date_inscription = date_format($date, 'd/m/Y');

$date = date_create($req_profil['date_connexion']);
$date_connexion = date_format($date, 'd/m/Y à H:i');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profil de <?= $req_profil['prenom'] ?> </title>
</head>

    <body>
        <?php
            require_once('../menu.php');
        ?>
    <div class="row">
        <h1>Bonjour <?= $req_profil['prenom'] ?></h1>
    </div>
    <div>
        Date d'inscription : <?= $date_inscription ?>
    </div>

    <div>
        Date de dernière connexion : <?= $date_connexion ?>
    </div>

    <div>
       <a href="profil/modifiersonprofil.php">Modifier mes informations</a>
    </div>
    </body>

</html>