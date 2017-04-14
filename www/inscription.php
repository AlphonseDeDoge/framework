<?php

    require '../mvc/model/model.php';

    $bdd = getBdd();
    if(isset($_POST['user'])) //on a deja visité la page
    {
        //On remplit la bdd
        $hashedpwd = md5($_POST['password']);
        $username = $_POST['user'];
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $bdd -> exec('INSERT INTO account(username,password,accountLevel) VALUES(\''.$username.'\',\''.$hashedpwd.'\',1)');

        //Récupération de l'id pour faire match l'id de l'account et l'id de l'user

        $tmp = $bdd -> query('SELECT id FROM account ORDER BY id DESC limit 1');
        $id = $tmp -> fetch();

        $bdd -> exec('INSERT INTO user VALUES(\''.$id['id'].'\',\''.$name.'\',\''.$fname.'\',\''.$email.'\')');
        session_start();
        header('Location: accueil.php');
        exit();
    }


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<link rel="stylesheet" href="../content/style.css">
</head>

<body>
    <h1>Registration</h1>
    <h3>To sign up, please complete the form down below</h3>
	<div class="inscription">
		<form action="inscription.php" method="post">
			<div>
				<label class="labelInscription" for="user">Username:</label><input class="inputInscription" type="text" id="user" name="user"><br />
				<label class="labelInscription" for="password">Password:</label><input class="inputInscription" type="password" id="password" name="password"><br />
                <label class="labelInscription" for="name">Name:</label><input class="inputInscription" type="text" id="name" name="name"><br />
				<label class="labelInscription" for="fname">First name:</label><input class="inputInscription" type="text" id="fname" name="fname"><br />
                <label class="labelInscription" for="email">Email:</label><input class="inputInscription" type="email" id="email" name="email"><br />
				<input id="boutonConnect" type="submit" value="Submit">
			</div>
		</form>
	</div>
</body>
</html>
