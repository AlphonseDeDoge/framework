<?php
    $titre = "Principale";

    ob_start();
?>
<div class="connexion">
    <form action="index.php?action=compte" method="post">
        <input type="submit" value="<?php echo $_SESSION['username'];?>" class="gestionCompte" />	<!-- Value : nom de l'utilisateur -->
    </form>
    <a href="index.php?action=signout">Sign Out</a>
</div>
<br />
<hr />

<div>

	<form action="index.php?action=groupe" method="post" class ="boutonPrincipale">
		<button type="submit">Gestion groupe</button>
		<button type="submit" formaction="index.php?action=carte">Gestion carte</button>
	</form>

</div>
<?php $contenu = ob_get_clean() ?>
