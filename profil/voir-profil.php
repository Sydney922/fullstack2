<?php
require_once('../include.php');

$get_id = (int) $_GET['id'];

if($get_id <= 0){
    header('Location: profil/membres.php');
    exit;
}
// redirige l'utilisateur vers sa page profil
if(isset($_SESSION['id']) && $get_id == $_SESSION['id']){
    header('Location: profil.php');
    exit;
}

$q = $db->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$q->execute([$get_id]);

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
    </body>

</html>