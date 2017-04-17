<?php
    $titre = "Erreur";

    ob_start();
?>

    <div>
        <h1>Oops! ლ(ಠ_ಠლ)</h1><br /><br />
        <h2>It seems that there is a problem... ¯\_(ツ)_/¯</h2>
        <p><?php echo $msgError; ?></p>
    </div>

<?php
    $contenu=ob_get_clean();
 ?>
