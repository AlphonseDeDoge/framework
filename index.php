<?php
session_start();
define('root',$_SERVER['DOCUMENT_ROOT']);
require_once(root.'/Controller/Controller.php');

try {
  	if (isset($_GET['action'])) {
        try
        {
            if($_GET['action']=='principale')
            {
                pagePrincipale();
            }
			else if($_GET['action']=='compte')
			{
                compte();
            }
			else if($_GET['action']=='inscription')
			{
                inscription();
            }
            else if ($_GET['action']=='register') {
                register();
            }
            else if ($_GET['action']=='signout') {
                $_SESSION['connection']=false;
                session_destroy();
                accueil();
            }
            else if ($_GET['action']=='signin') {
                pagePrincipale();
            }
            else
            {
                erreur("Please don't touch the url");
            }
        }
        catch (Exception $e)
        {
          erreur($e->getMessage());
        }
  	}
  	else {
      	accueil();  // action par défaut
  	}
}
catch (Exception $e) {
    erreur($e->getMessage());
}
