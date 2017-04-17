<?php
    $titre = "Principale";

    ob_start();
?>
<form action="index.php" method="post">
    <input type="submit" value="Compte" class="gestionCompte" />	<!-- Value : nom de l'utilisateur -->
</form>
<br />
<hr />

<div>

	<form action="index.php" method="post" class ="boutonPrincipale">
		<button type="submit">Gestion groupe</button>
		<button type="submit" formaction="index.php">Gestion compte</button>
	</form>

</div>
<?php $contenu = ob_get_clean() ?>
