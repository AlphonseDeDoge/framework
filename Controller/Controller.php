<?php

require_once(root.'/Model/Model.php');
require_once(root.'/View/View.php');


// renvoie sur la page d'accueil
function accueil() {
    getView('Accueil');
}

function pagePrincipale() {
    getView('Principale');
}

function compte() {
    getView('Compte');
}

function inscription() {
    getView('Inscription');
}

function register(){
    require('ControllerRegister.php');
}

function signin(){
    if(authentifyAccount($_SESSION['usernameTemp'],$_SESSION['passwordTemp']))
        pagePrincipale();
}

function deleteAcc(){
    deleteAccount($_SESSION['id']);
}

function changePwd(){
    changePassword($_SESSION['id']);
}

function erreur($msgErreur)
{
    getViewErreur('Erreur',$msgErreur);
}

?>
