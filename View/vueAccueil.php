<?php
    $titre = "Accueil";
?>

<?php ob_start(); ?>
<!--
    <div class="connexion">
        <form action="connexion.php" method="post">
            <div>
                Username:<input type="text" id="username" name="username"><br />
                Password:<input type="password" id="password" name="password"><br />
                <input id="boutonConnect" type="submit" value="Connect">
            </div>
        </form>
        <a href="inscription.php">New?</a>
    </div>
    <hr />
    <h1>Bienvenue!</h1>-->
    <p>Test</p>
<?php $contenu = ob_get_clean(); ?>
<?php require('template.php'); ?>
