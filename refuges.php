<?php
$page='refuges';
require "bdd.php";
require "header.php";
// session_start();

// if(isset($_SESSION['login_cli'])){
//     echo $_SESSION['login_cli']. " Vous êtes bien connecté";
// }

$reponse = $bdd->query("SELECT * FROM refuge");
$tableau = $reponse->fetchAll($mode = PDO::FETCH_ASSOC);
// var_dump($tableau);
?>

<section class="section3">
        <?php
              foreach($tableau as $refuges){
        ?>

        <div class="card" style="width: 18rem;">
             <img src="photo/<?php echo $refuges['img_ref']; ?>" class="card-img-top" height=175 alt="...">
        <div class="card-body">
             <h5 class="card-title"><?php echo $refuges['nom_ref']; ?></h5>
             <p class="card-text"><?php echo "Se trouve au " . ucfirst($refuges['adresse_ref']) . " à " . $refuges['ville_ref']. " Code Postal: " . $refuges['cp_ref'] ; ?> </p>
             <a href="page1-adoption.php?page=page1-adoption" class="btn btn-primary">Consulter les animaux des refuges</a>
        </div>
        </div>
        
        <?php
        }   
        ?>
    </section>

<?php
require "footer.php";
?>