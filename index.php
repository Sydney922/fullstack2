<?php 
require_once('include.php');

if(isset($_SESSION['id'])){
  $var = "Bonjour"  .  $_SESSION['prenom'];
}
else{
  $var = "Bienvenue sur notre réseau social.";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Projet réseaux sociaux </title>
</head>
<header>

</header>
<body>
<?php
  require_once('menu.php');
?>

<h1><?= $var ?></h1>
  <!-- <h1>Modifier son profil </h1>  -->

<!-- <form method="POST">
  <input type="text" name = "nom" value =<?= $nom ?> placeholder="Nom"><br>
  <input type="text" name = "prenom" value =<?= $prenom; ?> placeholder="Prénom"><br>
  <input type="text" name = "email" value =<?= $email ?> placeholder="Email"><br>
  <input type="submit" name = "modifier" value="Modifier">
</form> -->

<?php

  // $methode = filter_input(INPUT_SERVER, "REQUEST_METHOD");
  // if($methode == "POST")
  // {
  // $nouveauNom = $nom;
  // $nouveauPrenom = $prenom;
  // $nouvelEmail = $email;

    // Effectuer la requête de mise à jour
  // $recup_id = "SELECT id_profil FROM profil WHERE ?";
  
  // $update = "UPDATE profil SET nom = :nom, prenom = :prenom, email = :email WHERE id = ?"; 
  // $q = $db->prepare($update);
  // $q->execute(array([
  //   ':nom' => $nouveauNom, 
  //   ':prenom' => $nouveauPrenom,
  //   ':email' => $nouvelEmail
  // ]));

  // $verif_update = "SELECT * FROM profil WHERE id = ?";
  // $resultat_update = $db->prepare($verif_update);
  // while ($ligne = $resultat_update->fetch(PDO::FETCH_ASSOC)) {
    // Traitement des enregistrements modifiés
// }


  // $update = "UPDATE profil SET nom = :nom, prenom = :prenom, email = :email WHERE condition";
  // $q = $db->prepare($update);
  // $q->bindValue(':nom', $nouveauNom);
  // $q->bindValue(':prenom', $nouveauPrenom);
  // $q->bindValue(':email', $nouvelEmail);
  

// try {
//   $q->execute();
//   echo "Les informations personnelles ont été mises à jour avec succès.";
//   }
//   catch (PDOException $e) {
    
   
//     echo 'Erreur lors de la mise à jour des informations : ' . $e->getMessage();
//       }
    //  }
  //  }
// ?>
</body>
</html>
<!-- pour les photos et la bannière il faut mettre le chemin qui mène à la photo et aussi pour la bannière -->