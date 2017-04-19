<?php

require_once(root.'/Model/Model.php');
require_once(root.'/View/View.php');


// renvoie sur la page d'accueil
function accueil($msgError) {
    getViewErreur('Accueil',$msgError);
}

function pagePrincipale() {
    getView('Principale');
}

function compte($msgError) {
    getViewErreur('Compte',$msgError);
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

    else {
        $msgError="Wrong password";
        accueil($msgError);
    }
}

function deleteAcc(){
    deleteAccount($_SESSION['id']);
}

function changePwd(){
    if(!changePassword($_SESSION['id']))
    {
        compte('Wrong password');
    }
    else compte("");
}

function erreur($msgErreur)
{
    getViewErreur('Erreur',$msgErreur);
}

?>
