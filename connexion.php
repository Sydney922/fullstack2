<?php
require_once('include.php');

if(isset($_SESSION['id'])){
    header('Location: index.php');
    exit;
}

$methode = filter_input(INPUT_SERVER, "REQUEST_METHOD");
if($methode == "POST")
{
$validation = (boolean) true;
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];


global $db;


if($validation){
    $q = $db->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $q->execute(array($email));

    $req_user = $q->fetch();

    if(isset($req_user['id'])){
        $date_connexion = date('Y-m-d H:i:s');

        $q = $db->prepare("UPDATE utilisateurs SET date_connexion = ? WHERE id = ?");
        $q->execute(array( 
            $date_connexion,
            $req_user['id']  ));

            $_SESSION['id'] = $req_user['id'];
            $_SESSION['nom'] = $req_user['nom'];
            $_SESSION['prenom'] = $req_user['prenom'];
            $_SESSION['email'] = $req_user['email'];
            
            header('Location: index.php');
            exit;
        }       
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Connexion </title>
    </head>
<header>

</header>
    <body>
    <div class="container">
      <div class="form-container">
            <form method="post">
                <h1> Connexion </h1>
                <input type="email" name = "email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"required>
                <input type="password" name = "mot_de_passe"  placeholder="Mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"required>
                
                <a href="connexion.php"><button>Se connecter</button></a>
                <a href="inscription.php">Je vais m'inscrire</a>
            </form>
       </div>
    </div>
    
    </body>

</html>