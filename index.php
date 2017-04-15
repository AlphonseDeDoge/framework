<?php

require('mvc/controller/controller.php');

try {
  if (isset($_GET['action'])) {

  }
  else {
    accueil();  // action par défaut
  }
}
catch (Exception $e) {
    erreur($e->getMessage());
}
