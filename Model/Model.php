<?php

	function getBdd()
	{
		require_once(root.'/Assets/Config/dbConf.php');

		try
		{
			$bdd = new PDO('mysql:host='.HOST.';dbname='.DBName, USER, PASS);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$bdd->exec("SET CHARACTER SET utf8");
		}

		catch (PDOException $e)
		{
			echo "<p>Erreur ! : ". $e->getMessage(). "</p><br/>";
			die();
		}

		return $bdd;
	}

	function getAccount()
	{
		$bdd=getBdd();
		$account = $bdd->query('select * from account');
		return $account;
	}

	function authentifyAccount($username,$passwd)
	{
		$account=getAccount();
		while($donnees = $account -> fetch())
		{
			if($donnees['username']==$username)
			{
				$hashPasswd = password_hash($passwd,PASSWORD_DEFAULT);
				if(password_verify($passwd,$donnees['password']))
				{
					$_SESSION['connection']='true';
					$_SESSION['accountLevel']=$donnees['accountLevel'];
					$_SESSION['username']=$donnees['username'];
					$_SESSION['id']=$donnees['id'];
					return true;
				}
			}
		}
		return false;
	}

	function registerAccount()
	{
		$bdd = getBdd();

			try
			{
				if(isset($_POST['user']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['email']))
				{
			        //On remplit la bdd
					$_SESSION['connection']=true;
			        $_SESSION['accountLevel']='1';
					$_SESSION['hashedpwd']=password_hash($_POST['password'],PASSWORD_DEFAULT);
					$_SESSION['username']=$_POST['user'];
					$_SESSION['name']=$_POST['name'];
					$_SESSION['fname']=$_POST['fname'];
					$_SESSION['email']=$_POST['email'];
					//insertBdd('account(username,password,accountLevel)',$test,$bdd);
			        $bdd -> exec('INSERT INTO account(username,password,accountLevel) VALUES(\''.$_SESSION['username'].'\',\''.$_SESSION['hashedpwd'].'\',\''.$_SESSION['accountLevel'].'\')');

			        //Récupération de l'id pour faire match l'id de l'account et l'id de l'user

			        $tmp = $bdd -> query('SELECT id FROM account ORDER BY id DESC limit 1');
			        $id = $tmp -> fetch();

			        $bdd -> exec('INSERT INTO user VALUES(\''.$id['id'].'\',\''.$_SESSION['name'].'\',\''.$_SESSION['fname'].'\',\''.$_SESSION['email'].'\')');

					return true;
				}
				else return false;
			}
			catch(Exception $e)
			{
				echo($e->getMessage());
			}

	}

	function deleteAccount($id)
	{
		$bdd = getBdd();
		$bdd -> exec('DELETE FROM account where id=\''.$id.'\'');
		$_SESSION['connection']=false;
		session_destroy();
		header('Location: index.php');
	}

	function changePassword($id)
	{
		$bdd=getBdd();
		$account = $bdd->query('select * from account');
		while($donnees = $account -> fetch())
		{
			if($donnees['username']==$_SESSION['username'])
			{
				if(password_verify($_SESSION['prev_passwordTemp'],$donnees['password']))
				{
					$pwdhash = password_hash($_SESSION['new_passwordTemp'],PASSWORD_DEFAULT);
					$req = $bdd -> prepare('UPDATE account SET password= ? WHERE id= ?');
					$req -> execute(array($pwdhash,$id));
					$req -> closeCursor();
					header('Location: index.php?action=compte');
					return true;
				}
			}
		}
		return false;
	}
?>
