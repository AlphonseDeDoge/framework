<?php

  function getView($fichier)
  {
      require(root.'/View/vue' . $fichier . '.php');
      require(root.'/View/template.php');
  }

  function getViewErreur($fichier,$msgError)
  {
      require(root.'/View/vue' . $fichier . '.php');
      require(root.'/View/template.php');
  }

?>
