<?php
$page='profil';
require "header.php";
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=adoption_chat', "root", "");

if(isset($_SESSION['login_cli'])){
    echo $_SESSION['login_cli']. " Vous êtes bien connecté";
}

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM client WHERE id_cli = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    // print_r($requser->errorInfo());

?>

    <section>
    <h3>Profil de <?php echo $_SESSION['login_cli']; ?>
    </h3><br><br><br>
    Pseudo = <?php echo $_SESSION['login_cli']; ?>
    <br>
    email = <?php echo $_SESSION['mail_cli']; ?>
    </section>

    <section>
        <a href="Suivi-compagnon.php?page=">Suivi de votre compagnon</a>
    </section>

<?php
}
require "footer.php";
?>