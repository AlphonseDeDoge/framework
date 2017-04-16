<?php

  function getView($fichier)
  {
      require(root.'/View/vue' . $fichier . '.php');
      require(root.'/View/template.php');
  }

?>
