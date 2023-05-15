<?php
require_once('../include.php');

if(!isset($_SESSION['id'])){
    header('Location: index.php');
    exit;
}

$q = $db->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$q->execute([$_SESSION['id']]);

$req_profil = $q->fetch();

if(!empty($_POST)){
  extract($_POST);

  $validation = true;

  if(isset($_POST['formulaire1'])){
    $methode = filter_input(INPUT_SERVER, "REQUEST_METHOD");

    if($methode == "POST"){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    //Verifier si on a quelque chose dans la variable nom
    if (!isset($nom)){
      $validation = false ;
    }
    else{
      $q = $db->prepare("SELECT id FROM utilisateurs WHERE nom = ?");
      $q->execute([$nom]);
      $q = $q->fetch();
    }
    if($validation){
      $q = $db->prepare("UPDATE utilisateurs SET nom = ? WHERE id = ?");
      $q->execute([$nom, $_SESSION['id']]);
      header('Location: modifiersonprofil.php');
    }

    if (!isset($prenom)){
      $validation = false ;
    }
    else{
      $q = $db->prepare("SELECT id FROM utilisateurs WHERE prenom = ?");
      $q->execute([$prenom]);
      $q = $q->fetch();
    }
    if($validation){
      $q = $db->prepare("UPDATE utilisateurs SET prenom = ? WHERE id = ?");
      $q->execute([$prenom, $_SESSION['id']]);
      header('Location: modifiersonprofil.php');
    }

    if (!isset($email)){
      $validation = false ;
    }
    else{
      $q = $db->prepare("SELECT id FROM utilisateurs WHERE email = ?");
      $q->execute([$email]);
      $q = $q->fetch();
    }
    if($validation){
      $q = $db->prepare("UPDATE utilisateurs SET email = ? WHERE id = ?");
      $q->execute([$email, $_SESSION['id']]);
      header('Location: modifiersonprofil.php');
      exit;
    }
    }  
  }

  // elseif(isset($_POST['formulaire2'])){
  //   $methode = filter_input(INPUT_SERVER, "REQUEST_METHOD");
    
  //   if($methode == "POST"){
  //   $mot_de_passe = $_POST['mot_de_passe'];
  //   $newpassword = $_POST['newpassword'];
  //   $confnewpassord = $_POST['confnewpassword'];

  //   if (!isset($mot_de_passe)){
  //     $validation = false ;
  //   }

  //   else {
  //     $q = $db->prepare("SELECT mot_de_passe FROM utilisateurs WHERE id = ?");
  //     $q->execute([$_SESSION['id']]);
  //     $q = $q->fetch();
  //   }
  //   }

  //     if($validation){
  //       $q = $db->prepare("UPDATE utilisateurs SET mot_de_passe WHERE id = ?");
  //       $q->execute([$mot_de_passe, $_SESSION['id']]);
  //       header('Location: modifiersonprofil.php');
  //       exit;
  //     }
  //   }
  }


// Afficher les informations de l'utilisateur
if(!isset($nom)){
  $nom = $req_profil['nom'];
}

if(!isset($prenom)){
  $prenom = $req_profil['prenom'];
}

if(!isset($email)){
  $email = $req_profil['email'];
}

// if(!isset($mot_de_passe)){
//   $mot_de_passe = $req_profil['mot_de_passe'];
// }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Modifier mon compte <?= $req_profil['prenom'] ?> </title>
</head>

    <body>
        <?php
            require_once('../menu.php');
        ?>
    <div class="row">
        <h1>Modifier mes informations</h1>
    </div>
      <form method="post">
        <input type="text" name = "nom" placeholder="Nom" value="<?= $nom ?>"><br>
        <input type="text" name = "prenom" placeholder="Prénom" value="<?= $prenom ?>"><br>
        <input type="email" name = "email" placeholder="Email" value="<?= $email ?>"><br>
        <input type="submit" name = "formulaire1" value="Modifier">
      </form>

      <form method="post">
        <input type="password" name = "mot_de_passe"  placeholder="Mot de passe actuel" value=""><br>
        <input type="password" name = "newpassword"  placeholder="Nouveau mot de passe" value=""><br>
        <input type="password" name = "confnewpassword"  placeholder="Confirmer votre nouveau mot de passe" value=""><br>
        <input type="submit" name = "formulaire2" value="Modifier">
      </form>
    </body>

</html>