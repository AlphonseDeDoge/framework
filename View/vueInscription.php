<!--

Aucune idée d'où mettre ça : (gère l'inscription et la rentre dans la BD)

$bdd = getBdd();
    if(isset($_POST['user'])) //on a deja visité la page
    {
		try{
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
			$_SESSION['accountLevel']='1';
			$_SESSION['name']=$username;
			setcookie('username', $username, time() + 365*24*3600, null, null, false, true);
	        header('Location: ../index.php');
	        exit();
		}catch(Exception $e){
			header('Location: inscription.php');
		}
    }


-->



<?php
    $titre = "Registration";

    ob_start();
?>

<h1>Registration</h1>
    <h3>To sign up, please complete the form down below</h3>
	<div>
		<form action="" method="post">
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
