<?php
include "header.php";
include "bdd.php";
session_start();

$_SESSION = array();

session_destroy();
header('location: connexion.php?page=connexion');
?>

<?php
include "footer.php";
?>