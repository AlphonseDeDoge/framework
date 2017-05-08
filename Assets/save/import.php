<?php
if (isset($_POST['id']) && !empty($_POST['id'])){
    $carte = file_get_contents('../cartes/'.$_POST['id'].'.json');
    echo $carte;
}