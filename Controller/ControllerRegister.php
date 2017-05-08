<?php
    require_once(root.'/Model/Model.php');
    if(registerAccount())
        header('Location: index.php?action=principale');
    else header('Location: index.php?action=inscription');
 ?>
