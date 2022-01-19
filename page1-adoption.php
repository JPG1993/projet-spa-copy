<?php
require "header.php";
require "bdd.php";
session_start();

if(isset($_SESSION['login_cli'])){
    echo $_SESSION['login_cli']. " Vous êtes bien connecté";
}

$reponse = $bdd->query("SELECT * FROM animal");
$tableau = $reponse->fetchAll($mode = PDO::FETCH_ASSOC);

// foreach($tableau as $animal){
//     echo $animal['nom_ani'] ," ", $animal['race_ani'] ,"<br/>";
//     }
//     var_dump($tableau);
?>

    <?php
    $reponse2 = $bdd->query("SELECT DISTINCT race_ani FROM animal");
    $tableau2 = $reponse2->fetchAll($mode = PDO::FETCH_ASSOC);
    // var_dump($tableau2);
    ?>

    <section class="section3b">
    <form method="POST">
        <select name="liste_deroulante">
            <?php foreach ($tableau2 as $race):?>
                <option value="<?php echo $race['race_ani'];?>"><?php echo $race['race_ani']; ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="envoyer" name="envoyer">
    </form>
    </section>

    <?php  
    if(isset($_POST['liste_deroulante'])){
    if(!empty($_POST['liste_deroulante']))
    $race2 = $_POST['liste_deroulante'];
    $reponse3 = $bdd->query("SELECT * FROM animal WHERE race_ani='$race2'");
    $tableau3 = $reponse3->fetchAll($mode = PDO::FETCH_ASSOC);
    $tableau = $tableau3;
    }
    ?>

    <section class="section3">
        <?php
              foreach($tableau as $animal){
              if ($animal['sexe_ani'] == 0){
                $sexe = "male";
            }
            else {
                $sexe = "femelle";
            }
        ?>

        <div class="card" style="width: 18rem;">
             <img src="photo/<?php echo $animal['img_ani']; ?>" class="card-img-top" height=175 alt="...">
        <div class="card-body">
             <h5 class="card-title"><?php echo $animal['nom_ani']; ?></h5>
             <p class="card-text"><?php echo ucfirst($animal['desc_ani']). " ". $sexe . " agé de ". $animal['age_ani'] . " ans. " ?></p>
             <a href="pageperso.php?persoid=<?php echo $animal['id_ani']; ?>" class="btn btn-primary">Consulter le profil de <?php echo $animal['nom_ani']; ?></a>
        </div>
        </div>
        
        <?php
        }   
        ?>
    </section>

<?php
require "footer.php";
?>