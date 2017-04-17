<?php
    $titre = "Compte";

    ob_start();
?>
<form action="View/vueCompte.php" method="post">
    <input type="submit" value="Compte" class="gestionCompte" />	<!-- Value : nom de l'utilisateur -->
</form>
<br />
<hr />

<div>

	<h1>Account changes</h1>
	<h3>Change password</h3>

	<form action="View/vueChangeMdp.php" method="post">
		<label>Current password:</label><input type="password" class="inputCompte" name="prev_password">
		<label>New password:</label><input type="password" class="inputCompte" name="new_password"><br /><br />
		<button type="submit">Submit</button><br />
		<h3>Delete account</h3>
		<button type="submit" formaction="">Delete account</button>
	</form>

</div>
<?php $contenu = ob_get_clean() ?>
