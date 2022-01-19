<?php
require "header.php";
session_start();

if(isset($_SESSION['login_cli'])){
    echo $_SESSION['login_cli']. " Vous êtes déja inscrit et connecté.";
}

$bdd = new PDO('mysql:host=localhost;dbname=adoption_chat', "root", "");
     
if(isset($_POST['inscrit']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $email2 = htmlspecialchars($_POST['email2']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);
      if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
      { 
        $pseudolenght = strlen($pseudo);
        if($pseudolenght <= 255)
        {
            if($email == $email2)
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                if($mdp == $mdp2)
                {
                    $requeteuser = $bdd->prepare("INSERT INTO client (login_cli, mail_cli, mdp_cli) VALUES (?, ?, ? )");
                    $requeteuser-> execute(array($pseudo, $email, $mdp));
                    // echo "\nPDOStatement::errorCode(): ";
                    print_r($requeteuser->errorInfo());
                    $erreur = "Votre compte a bien été créé!";
                    header("Location: connexion.php?page=connexion".$_SESSION['id_cli']);
                }
                else
                {
                    $erreur = "Vos mots de passes ne corespondent pas!";
                }
            }
            else
            {
                $erreur = "Votre adresse mail n'est pas valide!";
            }
            }
            else{
                $erreur = "Vos adresses email ne corerespondent pas!";
            }
        }
            else
            {
                $erreur = "Votre pseudo ne doit pas dépassé 255 caractères!";
            }
      }
      else {
          $erreur = "tous les champs doivent etre completés!";
      }
    }

?>
    <h3>Inscription</h3><br><br><br>
    <form action="" method="POST">
    <table>
        <tr>
            <td>
            <label for="pseudo">Pseudo</label>
            </td>
            <td>
                <input type="text" id="pseudo" name="pseudo" placeholder="Votre Pseudo" value="<?php if(isset($pseudo)){ echo $pseudo; }?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">Email</label>
            </td>
            <td>
                <input type="" id="email" name="email" placeholder="Votre Email" value="<?php if(isset($email)){ echo $email; }?>">
            </td>
        </tr>
        <tr>
            <td>
            <label for="emailconfir">Confirmation Email</label>
            </td>
            <td>
                <input type="text" id="confiremail" name="email2" placeholder="Confirmation du mail" value="<?php if(isset($email)){ echo $email2; }?>">
            </td>
        </tr>
        <tr>
            <td>
            <label for="mdp">Mot de passe</label>
            </td>
            <td>
                <input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" value="<?php if(isset($mdp)){ echo $mdp; }?>">
            </td>
        </tr>
        <tr>
            <td>
            <label for="mdp2">Confirmation Mot de passe</label>
            </td>
            <td>
                <input type="password" id="mdp2" name="mdp2" placeholder="Confirmation mot de passe" value="<?php if(isset($mdp2)){ echo $mdp2; }?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="inscrit"value="S'inscrire">
            </td>
        </tr>
    </table>
    </form><br>
    <a href="connexion.php?page=">Si vous êtes déjà membres connectez-vous directement!</a>
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