<?php
include "bdd.php";

if (isset($_GET['updateid'])){
    $id = $_GET['updateid'];
    $reponse = $bdd->query("SELECT * FROM animal WHERE id_ani=$id");
    $tableau = $reponse->fetchAll($mode = PDO::FETCH_ASSOC);
    // var_dump($tableau);
    if (count($tableau)==1){
        $animal = $tableau[0];
        $name= $animal['nom_ani'];
        $race= $animal['race_ani'];
        $age= $animal['age_ani'];
        $sexe= $animal['sexe_ani'];
        $date= $animal['dateaccueil_ani'];
  }  
}

if (isset($_POST['nom'])){
    $id= $_POST['id'];
    $name= $_POST['nom'];
    $race= $_POST['race'];
    $age= $_POST['age'];
    $sexe= $_POST['sexe'];
    $date= $_POST['date'];
    // var_dump($id);

    $envoi = $bdd->query("UPDATE animal SET nom_ani='$name', race_ani='$race', age_ani=$age, sexe_ani='$sexe', dateaccueil_ani='$date' WHERE id_ani=$id");
    // print_r($bdd->errorInfo());
    if (isset($envoi)){
        echo "mise a jours des données de l'animal effectuées.";
        header('Location: display.php');
    }
    else {
        echo "erreur de mise à jours des données de l'animal";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.min.css">
        <title></title>
    </head>

    <body>
    <div class="container">

    <form action="" method="POST">
    <div class="form-group">
        <input type="hidden" value="<?php echo $id; ?>" name="id">
      <div class="form-group">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Entrer le sexe" name="nom">
      <div>
      <div class="form-group">
        <label for="race" class="form-label">Race</label>
        <input type="text" class="form-control" value="<?php echo $race; ?>" placeholder="Entrer la race" name="race">
      <div>
      <div class="form-group">
        <label for="age" class="form-label">ÂGE</label>
        <input type="text" class="form-control" value="<?php echo $age; ?>" placeholder="Entrer l'âge" name="age">
      <div>
      <div class="form-group">
        <label for="sexe" class="form-label">Sexe</label>
        <input type="text" class="form-control" value="<?php echo $sexe; ?>" placeholder="Entrer le sexe" name="sexe">
      <div>
      <div class="form-group">
        <label for="date" class="form-label">Date d'accueil</label>
        <input type="date" class="form-control" value="<?php echo $date; ?>" placeholder="Entrer la date" name="date">
      <div>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>

    </div>
    <script src="bootstrap.bundle.min.js"></script>
    </body>
</html>