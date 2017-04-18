<?php
    $titre = "Compte";

    ob_start();
?>
<form action="index.php?action=compte" method="post">
    <input type="submit" value="Compte" class="gestionCompte" />	<!-- Value : nom de l'utilisateur -->
</form>
<br />
<hr />

<div>

	<h1>Account changes</h1>
	<h3>Change password</h3>

	<form action="" method="post">
		<label>Current password:</label><input type="password" class="inputCompte" name="prev_password">
		<label>New password:</label><input type="password" class="inputCompte" name="new_password"><br /><br />
		<button type="submit">Submit</button><br />
	</form>

	<h3>Delete account</h3>
	<form action="" method="post">
	    <input type="submit" value="Delete account" />
	</form>

    <h3>Sign out</h3>
	<form action="" method="post">
	    <input type="submit" value="Delete account" />
	</form>

</div>
<?php $contenu = ob_get_clean() ?>
