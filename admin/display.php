<?php
include "bdd.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Board ANIMAUX</title>
</head>
<body>
    <div class="container">
        <button class="btn btn-primary"><a href="animaux.php" class="text-light">Ajout Animal</a></button>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">ID animal</th>
        <th scope="col">NOM</th>
        <th scope="col">Race</th>
        <th scope="col">Age</th>
        <th scope="col">Sexe</th>
        <th scope="col">Date d'accueil</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>
    <tbody>
        <?php
       $reponse = $bdd->query("SELECT * FROM animal");
       $tableau = $reponse->fetchAll($mode = PDO::FETCH_ASSOC);
       
    //    foreach($tableau as $animal){
    //     echo $animal['id_ani']," ", $animal['nom_ani'] ," ", $animal['race_ani'] ,"<br/>";
    // }
    // var_dump($tableau);
    foreach ($tableau as $animal) {
        if ($animal['sexe_ani'] == 0) {
            $sexe = "male";
        } else {
            $sexe = "femelle";
        } 
        ?>
        <tr>
            <td><?php echo $animal['id_ani']; ?></td>
            <td><?php echo $animal['nom_ani']; ?></td>
            <td><?php echo ucfirst($animal['race_ani']); ?></td>
            <td><?php echo $sexe; ?></td>
            <td><?php echo $animal['age_ani'] . " ans "; ?></td>
            <td><?php echo $animal['dateaccueil_ani']; ?></td>
            <td><button class="btn btn-primary" id="bouton" value="envoyer"> <a class="text-light" href="update.php?updateid=<?php echo $animal['id_ani']; ?>">UDAPTE</a></button>
            <button class="btn btn-danger" id="bouton" value="envoyer"> <a class="text-light" href="delete.php?deleteid=<?php echo $animal['id_ani']; ?>">DELETE</a></button></td>
        </tr> 
    </tbody>
        <?php
        }
        ?>
    </table>
    </div>
    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>          