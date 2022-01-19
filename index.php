<?php
require "header.php";
require "bdd.php";
session_start();

if(isset($_SESSION['login_cli'])){
    echo $_SESSION['login_cli']. " Vous êtes bien connecté";
}

$reponse = $bdd->query("SELECT * FROM client");
$tableau = $reponse->fetch($mode = PDO::FETCH_ASSOC);


// $reponse = $bdd->query("SELECT * FROM animal");
// $tableau = $reponse->fetchAll($mode = PDO::FETCH_ASSOC);

?>
    <section class="section1">
        <a href="profil.php?id=<?php if(isset($_SESSION['login_cli'])){echo $_SESSION['id_cli'];} ?>"><button type="button" class="btn btn-warning">ACCES A VOTRE PROFIL </button></a>
    </section><br>

    <section class="section2">
        <a href="page1-adoption.php?page=page1-adoption"><button type="button" class="btn btn-warning">ADOPTE TON NOUVEAU COMPAGNON</button></a>
    </section><br>

    <section class="section2">
        <a href="refuges.php?refugesid="><button type="button" class="btn btn-warning">LISTE DES REFUGES</button></a>
    </section><br>


<?php
require "footer.php";
?>

 