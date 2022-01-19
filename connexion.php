<?php
require "header.php";
session_start();

if(isset($_SESSION['login_cli'])){
    echo $_SESSION['login_cli']. " Vous êtes déjà connecté.";
}

$bdd = new PDO('mysql:host=localhost;dbname=adoption_chat', "root", "");

if(isset($_POST['SeConnecter']))
{
    $emailconnect = htmlspecialchars($_POST['emailconnect']);
    $mdpconnect = ($_POST['mdpconnect']);
    if(!empty($emailconnect) AND ! empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM client WHERE mail_cli = ? AND  mdp_cli = ?");
        $requser->execute(array($emailconnect, $mdpconnect));
         $userexist = $requser->rowCount();
         print_r($userexist);
        // ($requser->errorInfo());
        if($userexist  == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id_cli'] = $userinfo['id_cli'];
            $_SESSION['login_cli'] = $userinfo['login_cli'];
            $_SESSION['mail_cli'] = $userinfo['mail_cli'];
            header("Location: profil.php?id=".$_SESSION['id_cli']);
        }
        else
        {
            $errreur = "Mauvais email ou mot de passe !";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être remplis!";
    }
}
     
?>
    <h3>Connexion</h3><br><br><br>
    <form action="" method="POST">
    <table>
        <tr>
            <td>
            <label for="email">Email</label>
            </td>
            <td>
                <input type="email" id="emailconnect" name="emailconnect" placeholder="Email" value="<?php if(isset($emailconnect)){ echo $emailconnect; }?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="mdpconnect">Mot de passe</label>
            </td>
            <td>
                <input type="password" id="mdpconnect" name="mdpconnect" placeholder="Mot de passe" value="<?php if(isset($mdpconnect)){ echo $mdpconnect; }?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="SeConnecter"value="Se connecter">
            </td>
        </tr>
    </table>
    </form><br>
    <a href="inscription.php?page=">Si vous n'etes pas encore un de nos membres, inscrivrez-vous ici!</a>

    <?php
    if(isset($erreur))
    {
        echo '<font color="red">'.$erreur."</font>";
    }
    ?>
</body>
</html>

<?php
require "footer.php";
?>