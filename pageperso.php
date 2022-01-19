<?php
$page='adopte';
require "bdd.php";
require "header.php";
session_start();

if(isset($_SESSION['login_cli'])){
    echo $_SESSION['login_cli']. " Vous êtes bien connecté";
}
?>

<?php
    if (isset($_GET['persoid'])){
        $id = $_GET['persoid'];
       $reponse = $bdd->query("SELECT id_ani, nom_ani, race_ani, age_ani, sexe_ani, img_ani, desc_ani, dateaccueil_ani, nom_ref, ville_ref, adresse_ref FROM animal INNER JOIN refuge ON animal.id_ref = refuge.id_ref WHERE id_ani=$id");
       $tableau = $reponse->fetch($mode = PDO::FETCH_ASSOC);
    //    var_dump($tableau);
       $animal = $tableau;
    }
?>

    <section class="section3">
            <?php
            if($animal ==0){
                $sexe = "male";
            }
            else {
                $sexe = "femelle";
            }
            ?>

        <div class="card mb-3">
            <img src="photo/<?php echo $animal['img_ani']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $animal['nom_ani']; ?></h5>
            <p class="card-text"><?php echo ucfirst($animal['desc_ani']). " ".$sexe. " agé de " .$animal['age_ani']. " ans. Se trouvant au " .$animal['nom_ref']. " à l'adresse : " .$animal['adresse_ref']. " à " .$animal['ville_ref'] ?></p>
            <a href="formulaireadoption.php?id=<?php echo $animal['id_ani']; ?>" class="btn btn-primary">Adopter <?php echo $animal['nom_ani']; ?></a>
        </div>
</div>

        </section>

<?php
require "footer.php";
?>