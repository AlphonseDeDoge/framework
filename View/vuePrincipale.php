<?php
    $titre = "Principale";

    ob_start();
?>
<p>Test</p>
<?php $contenu = ob_get_clean() ?>
