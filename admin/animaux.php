<?php
include "bdd.php";
if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $race=$_POST['race'];
    $age=$_POST['age'];
    $sexe=$_POST['sexe'];
    $date=$_POST['date'];

    $requeteuser = $bdd->prepare("INSERT INTO animal (nom_ani, race_ani, age_ani, sexe_ani, dateaccueil_ani) VALUES ( ?, ?, ?, ?, ?)");
    $envoi = $requeteuser-> execute(array($nom, $race, $age, $sexe, $date));

    if($envoi){
        // echo "data insert successfully";
        header("Location: display.php?");
    }
    else{
        print_r($requeteuser->errorInfo());
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
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" placeholder="Entrer le nom" name="nom">
      <div>
      <div class="form-group">
        <label for="nom" class="form-label">Race</label>
        <input type="text" class="form-control" placeholder="Entrer la race" name="race">
      <div>
      <div class="form-group">
        <label for="nom" class="form-label">ÂGE</label>
        <input type="text" class="form-control" placeholder="Entrer l'âge" name="age">
      <div>
      <div class="form-group">
        <label for="nom" class="form-label">Sexe</label>
        <input type="text" class="form-control" placeholder="Entrer le sexe" name="sexe">
      <div>
      <div class="form-group">
        <label for="nom" class="form-label">Date d'accueil</label>
        <input type="date" class="form-control" name="date">
      <div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    </div>
    <script src="bootstrap.bundle.min.js"></script>
    </body>
</html>