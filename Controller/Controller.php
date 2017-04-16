<?php

require_once(root.'/Model/Model.php');
require_once(root.'/View/View.php');


// renvoie sur la page d'accueil
function accueil() {
  getView('Accueil');
}

function pagePrincipale() {
  getView('Principale');
}

function erreur($msgErreur)
{
    getViewErreur('Erreur',$msgErreur);
}

?>
