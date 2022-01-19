<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="styles.css" type="text/css" rel="stylesheet">
    <title>ADOPTE UN CHAT</title>
</head>

<body class="body">

    <header class="header">
        <div class="div1">
            <img src="photo/LOGO-CHAT2.png" width="100" height="100">
        </div>
        <div class="div2">
            <h2>ADOPTE UN CHAT</h2>
        </div>
        
        <?php
            if(isset($_GET['page'])){
            $page = $_GET['page'];
            // var_dump($page);
            }
        ?>
        <nav class="nav">
            <a href="index.php?page=index" <?php if($page=='index'){echo 'class="active"';} ?>>ACCUEIL</a>
            <a href="page1-adoption.php?page=page1-adoption" <?php if($page=='page1-adoption'){echo 'class="active"';} ?>>ADOPTE</a>
            <a href="connexion.php?page=connexion" <?php if($page=='connexion'){echo 'class="active"';} ?>>CONNEXION</a>
            <a href="inscription.php?page=inscription" <?php if($page=='inscription'){echo 'class="active"';} ?>>INSCRIPTION</a>
            <a href="deconnexion.php?page=deconnexion" <?php if($page=='deconnexion'){echo 'class="active"';} ?>>DECONNEXION</a>
            <div class="animation start-ACCEUIL"></div>
            
        </nav>
    </header>
    