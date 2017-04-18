<?php
    $titre = "Registration";

    ob_start();
?>

<h1>Registration</h1>
    <h3>To sign up, please complete the form down below</h3>
	<div>
		<form action="index.php?action=register" method="post">
			<div>
				<input class="inputInscription" type="text" id="user" name="user" placeholder="username"><br />
				<input class="inputInscription" type="password" id="password" name="password" placeholder="password"><br />
                <input class="inputInscription" type="text" id="name" name="name" placeholder="name"><br />
				<input class="inputInscription" type="text" id="fname" name="fname" placeholder="first name"><br />
                <input class="inputInscription" type="email" id="email" name="email" placeholder="email"><br />
				<input id="boutonConnect" type="submit" value="Submit">
			</div>
		</form>
	</div>

<?php $contenu = ob_get_clean() ?>
