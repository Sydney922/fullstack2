<?php

require_once('include.php');

if(isset($_SESSION['id'])){
  header('Location: index.php');
  exit;
}

$methode = filter_input(INPUT_SERVER, "REQUEST_METHOD");
if($methode == "POST")
{
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];


global $db;

$date_creation = date('Y-m-d H:i:s');

$q = $db->prepare("INSERT INTO utilisateurs(nom, prenom, email, mot_de_passe, date_creation, date_connexion) VALUES(?,?,?,?,?,?)");
$q->execute(array( 
   $nom,
   $prenom,
   $email,
   $mot_de_passe,
   $date_creation,
   $date_creation
  ));
  header('Location: connexion.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="inscription.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inscription </title>
    </head>
<header>

</header>
    <body>
    <div class="container">
      <div class="form-container">
        <form method="post">
          <h1> Inscription </h1>
          <input type="text" name = "nom" id="nom" placeholder="Nom">
          <input type="text" name = "prenom" id="prenom" placeholder="Prénom">
          <input type="email" name = "email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"required>
          <input type="password" name = "mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"required>
          <input type="password" name = "conf_mot_de_passe" placeholder="Confirmation Mot de passe" pattern="^;{6,}$"required>

          
          <a href="profil.php"><button>Créer son compte</button></a>
          <a href="connexion.php">J'ai déjà un compte</a>
        </form>
      </div>
    
    </div>

    </body>

</html>