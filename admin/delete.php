<?php
include "bdd.php";

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $bdd->query("DELETE FROM animal WHERE id_ani=$id");

    // echo "Votre animal est supprimé de la base de donnée!";
    header("Location: display.php");
    }
?>
