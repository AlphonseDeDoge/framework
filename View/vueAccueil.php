<?php
    $titre = "Accueil";
    $style = "style.css";
    $error=$msgError;

    ob_start();
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $_SESSION['passwordTemp']=$_POST['password'];
        $_SESSION['usernameTemp']=$_POST['username'];
        header('Location: index.php?action=signin');
    }
?>
    <div class="connexion">
<?php
    if(!isset($_SESSION['connection']) || !$_SESSION['connection']):
?>

    <form action="index.php" method="post">
        <div>
            <label>Username:</label><input type="text" id="username" name="username" placeholder="username">
            <label>Password:</label><input type="password" id="password" name="password" placeholder="password">
            <?php echo $error; ?>
            <label><input id="boutonConnect" type="submit" value="Connect"></label>
        </div>
    </form>

    <a href="index.php?action=inscription">New?</a>

<?php

    else:

?>

    <form action="index.php?action=compte" method="post">
        <input type="submit" value="Compte" class="gestionCompte" />	<!-- Value : nom de l'utilisateur -->
    </form>
    <a href="index.php?action=signout">Sign Out</a>

<?php endif; ?>



    </div>
    <hr />
    <h1>Welcome!</h1>
    <div>
        <p>
            This website will allow you to create mind maps.<br />
            <br />
            If you're not yet registered, please create an account by clicking the "New?" link.
        </p>
    </div>

<?php
    $contenu=ob_get_clean();
 ?>
