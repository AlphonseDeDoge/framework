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
                compte("");
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
                accueil("");
            }
            else if ($_GET['action']=='signin') {
                signin();
            }
            else if ($_GET['action']=='deleteAccount') {
                deleteAcc();
            }
            else if ($_GET['action']=='changePwd') {
                changePwd();
            }
            else if ($_GET['action']=='carte') {
                carte();
            }
            else if ($_GET['action']=='userpwd') {
                userPwd();
            }
            else if ($_GET['action']=='delUser') {
                delUserAcc();
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
        if(!isset($_SESSION['connection']) || !$_SESSION['connection'])
      	    accueil("");
        else pagePrincipale();
  	}
}
catch (Exception $e) {
    erreur($e->getMessage());
}
