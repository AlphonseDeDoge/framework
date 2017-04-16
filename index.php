<?php
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
