<head>
<base href ="/projet_reseaux_sociaux/index.php">
</head>
<nav class="navbar navbar-expend-lg navbar-light bg light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Accueil</a>
    <div class="collapse navbar-collapse" id="navbarnavAtlMarkup">
            <div class="navbar-nav">
            <a class="nav-link" href="profil/membres.php">Membres</a>
            <?php
            if(!isset($_SESSION['id'])){
    
            ?>
            <a class="nav-link" href="inscription.php">Inscription</a><br>
            <a class="nav-link" href="connexion.php">Connexion</a><br>
            <?php
            }else{
            ?>
            <a class="nav-link" href="profil/profil.php">Mon Profil</a>
            <a class="nav-link" href="deconnexion.php">Déconnexion</a>
            <?php
            }
            ?>
            </div>
    </div>        
    </div>
</nav>