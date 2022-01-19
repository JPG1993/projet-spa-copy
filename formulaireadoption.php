<?php
require "header.php";
require "bdd.php";
session_start();

if (isset($_SESSION['id_cli'])){
    $id = $_SESSION['id_cli'];
    $reponse = $bdd->query("SELECT * FROM client WHERE id_cli=$id");
    $tableau = $reponse->fetch($mode = PDO::FETCH_ASSOC);
    var_dump($tableau);
    }
?>




<?php
require "footer.php";
?>