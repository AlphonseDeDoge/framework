<?php

require_once(root.'/Model/Model.php');
require_once(root.'/View/View.php');

class ControleurAccueil {

  public function accueil() {
    $vue = new View("Accueil");
    $vue->generer('test');
  }
}


// renvoie sur la page d'accueil
function accueil() {
  require(root.'/View/vueAccueil.php');
}

function pagePrincipale() {
  require(root.'/View/vuePrincipale.php');
}

// Affiche une erreur
function erreur($msgErreur) {
  require(root.'/View/vueErreur.php');
}

?>
