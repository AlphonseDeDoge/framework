<?php
if (isset($_POST['carte']) && !empty($_POST['carte'])){
    $carte = json_decode($_POST['carte']);
    $carteSaved = json_encode($carte, JSON_PRETTY_PRINT);
    file_put_contents('../cartes/'.$carte->id.'.json', $carteSaved);
}