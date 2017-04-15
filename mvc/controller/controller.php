<?php

require '../model/model.php';

// renvoie sur la page d'accueil
function accueil() {
  require '../view/vueAccueil.php';
}

/*// Affiche les détails sur un billet
function billet($idBillet) {
  $billet = getBillet($idBillet);
  $commentaires = getCommentaires($idBillet);
  //require 'vueBillet.php';
}*/

// Affiche une erreur
function erreur($msgErreur) {
  require '../view/vueErreur.php';
}

?>
