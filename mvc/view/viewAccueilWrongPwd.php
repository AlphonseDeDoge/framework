<?php ob_start(); ?>

<label class="wrongpwd">Wrong password</label>

<?php $w_pwd = ob_get_clean(); ?>
<?php require 'www/accueil.php'; ?>
