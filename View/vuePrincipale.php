<?php
    $titre = "Principale";

    ob_start();
?>
<form action="index.php?action=compte" method="post">
    <input type="submit" value="Compte" class="gestionCompte" />	<!-- Value : nom de l'utilisateur -->
</form>
<br />
<hr />

<div>

	<form action="index.php?action=groupe" method="post" class ="boutonPrincipale">
		<button type="submit">Gestion groupe</button>
		<button type="submit" formaction="index.php?action=carte">Gestion carte</button>
	</form>

</div>
<?php $contenu = ob_get_clean() ?>
