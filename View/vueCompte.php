<?php
    $titre = "Compte";

    ob_start();
    if(isset($_POST['prev_password']) && isset($_POST['new_password']))
    {
        $_SESSION['new_passwordTemp']=$_POST['new_password'];
        $_SESSION['prev_passwordTemp']=$_POST['prev_password'];
        header('Location: index.php?action=changePwd');
    }
?>
<form action="index.php?action=compte" method="post">
    <input type="submit" value="Compte" class="gestionCompte" />	<!-- Value : nom de l'utilisateur -->
</form>
<br />
<hr />

<div>

	<h1>Account changes</h1>
	<h3>Change password</h3>

	<form action="index.php?action=compte" method="post">
		<label>Current password:</label><input type="password" class="inputCompte" name="prev_password">
		<label>New password:</label><input type="password" class="inputCompte" name="new_password"><br /><br />
		<button type="submit">Submit</button><br />
	</form>

	<h3>Delete account</h3>
	<form action="index.php?action=deleteAccount" method="post">
	    <input type="submit" value="Delete account" />
	</form>

    <h3>Sign out</h3>
	<form action="index.php?action=signout" method="post">
	    <input type="submit" value="Sign out" />
	</form>

</div>
<?php $contenu = ob_get_clean() ?>
