<?php
$bdd = new PDO('mysql:host=localhost;dbname=adoption_chat', "root", "");

    if($bdd){
        echo "connection successfull";
    }
    else{
        var_dump($bdd);
    }
?>