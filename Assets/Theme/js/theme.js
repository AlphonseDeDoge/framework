// Déclaration des variables
var selection;
var themeActuel = "classique";

// Fenêtre "Commande"
$( function() {
    $( ".dialog" ).dialog();
  } );

// Faire bouger ma classe sujet
$(
	function(){
		$('.sujet').draggable({cursor: "move"});
		$('.sujetPrincipal').draggable({cursor: "move"});
	}
);

// Prend l'id de l'objet cliqué si c'est un texte
$(document).ready(function(){
	$(".texte").click(function() {
	  selection = this.id;
	});
});

// ------------------------ Fenêtre "Commande" -----------------------------------------------

function augmente_taille() {
    if(document.getElementById(selection)== null){
        alert(selection);
    }
	switch(document.getElementById(selection).style.fontSize) {
    case "xx-small":
        document.getElementById(selection).style.fontSize = "x-small";
        break;
    case "x-small":
         document.getElementById(selection).style.fontSize = "small";
        break;
    case "small":
         document.getElementById(selection).style.fontSize = "medium";
        break;
    case "medium":
        document.getElementById(selection).style.fontSize = "large";
        break;
    case "large":
        document.getElementById(selection).style.fontSize = "x-large";
        break;
    case "x-large":
        document.getElementById(selection).style.fontSize = "xx-large";
        break;
    case "xx-large":
        break;
    default:
    	document.getElementById(selection).style.fontSize = "large";
        break;
	}
}
	
function diminue_taille(){
	switch(document.getElementById(selection).style.fontSize) {
    case "xx-small":
        break;
    case "x-small":
         document.getElementById(selection).style.fontSize = "xx-small";
        break;
    case "small":
         document.getElementById(selection).style.fontSize = "x-small";
        break;
    case "medium":
        document.getElementById(selection).style.fontSize = "small";
        break;
    case "large":
        document.getElementById(selection).style.fontSize = "medium";
        break;
    case "x-large":
        document.getElementById(selection).style.fontSize = "large";
        break;
    case "xx-large":
   		document.getElementById(selection).style.fontSize = "x-large";
        break;
    default:
    	document.getElementById(selection).style.fontSize = "small";
        break;
	}
}

function gras(){
	if(document.getElementById(selection).style.fontWeight == "bold") {
		document.getElementById(selection).style.fontWeight = "normal";
	} else {
		document.getElementById(selection).style.fontWeight = "bold";
	}
}

function italique(){
	if(document.getElementById(selection).style.fontStyle == "italic") {
		document.getElementById(selection).style.fontStyle = "normal";
	} else {
		document.getElementById(selection).style.fontStyle = "italic";
	}
}

function souligne(){
	if(document.getElementById(selection).style.textDecoration == "underline") {
		document.getElementById(selection).style.textDecoration = "none";
	} else {
		document.getElementById(selection).style.textDecoration = "underline";
	}
}

function barre(){
	if(document.getElementById(selection).style.textDecoration == "line-through") {
		document.getElementById(selection).style.textDecoration = "none";
	} else {
		document.getElementById(selection).style.textDecoration = "line-through";
	}
}

function couleur(nom){
	switch(nom) {
    case "noir":
        return "rgb(0,0,0)";
        break;
    case "gris50":
        return "rgb(127,127,127)";
        break;
    case "rougeFonce":
        return "rgb(136,0,21)";
        break;
    case "rouge":
        return "rgb(237,28,36)";
        break;
    case "orange":
        return "rgb(255,127,39)";
        break;
    case "jaune":
        return "rgb(255,242,0)";
        break;
    case "vert":
        return "rgb(34,177,76)";
        break;
    case "turquoise":
        return "rgb(0,162,232)";
        break;
    case "indigo":
        return "rgb(63,72,204)";
        break;
    case "violet":
        return "rgb(163,73,164)";
        break;
    case "blanc":
        return "rgb(255,255,255)";
        break;
    case "gris25":
        return "rgb(195,195,195)";
        break;
    case "marron":
        return "rgb(185,122,87)";
        break;
    case "roseSaumon":
        return "rgb(255,174,201)";
        break;
    case "or":
        return "rgb(255,201,14)";
        break;
    case "jauneClair":
        return "rgb(239,228,176)";
        break;
    case "vertClair":
        return "rgb(181,230,29)";
        break;
    case "turquoiseClair":
        return "rgb(153,217,234)";
        break;
    case "bleuGris":
        return "rgb(112,146,190)";
        break;
    case "lavande":
        return "rgb(200,191,231)";
        break;
    
    default:
        break;
	}
}

function background(nom){
	document.body.style.backgroundColor = couleur(nom);
}

function couleurPolice(nom){
	document.getElementById(selection).style.color = couleur(nom);
}

// Pour l'instant je sauvegarde en local pour voir si ça marche bien
function sauvegarder(){
	var liste = document.getElementsByClassName('texte');
	var i;
	var id;
	var fontSize;
	var fontWeight;
	var fontStyle;
	var textDecoration;
	var styleColor;
	var monObjet;
	var monJSON;

	for (i = 0; i < liste.length; i++) {
		id = liste[i].id;
	    fontSize = liste[i].style.fontSize;
	    fontWeight = liste[i].style.fontWeight;
		fontStyle = liste[i].style.fontStyle;
		textDecoration = liste[i].style.textDecoration;
		styleColor = liste[i].style.color;
		monObjet = {
			"id":id, 
			"fontSize":fontSize, 
			"fontWeight":fontWeight, 
			"fontStyle":fontStyle, 
			"textDecoration":textDecoration, 
			"styleColor":styleColor
		}
		monJSON = JSON.stringify(monObjet);
		localStorage.setItem(id, monJSON);
	}
// on sauvegarde le background
	monObjet = {"background":document.body.style.backgroundColor}
	monJSON = JSON.stringify(monObjet);
	localStorage.setItem("background", monJSON);
}

function charger(){
	var liste = document.getElementsByClassName('texte');
	var i;
	var charge; 
	var obj;

	charge = localStorage.getItem("background");
	obj = JSON.parse(charge);
	document.body.style.backgroundColor = obj.background;

	for (i = 0; i < liste.length; i++) {
		charge = localStorage.getItem(liste[i].id);
		obj = JSON.parse(charge);
		liste[i].style.fontSize = obj.fontSize;
		liste[i].style.fontWeight = obj.fontWeight;
		liste[i].style.fontStyle = obj.fontStyle;
		liste[i].style.textDecoration = obj.textDecoration;
		liste[i].style.color = obj.styleColor;
	}
}

// juste pour tester un changement de thème basique, ça sera bien sûr amélioré pour le rendu final 
function changerTheme(){
	if(themeActuel == 'classique'){
		$('.sujet').removeClass('sujetClassique').addClass('sujetBusiness');
		$('.sujetPrincipal').removeClass('sujetPrincipalClassique').addClass('sujetPrincipalBusiness');
		themeActuel = 'business';
	} else if(themeActuel =='business'){
		$('.sujet').removeClass('sujetBusiness').addClass('sujetClassique');
		$('.sujetPrincipal').removeClass('sujetPrincipalBusiness').addClass('sujetPrincipalClassique');
		themeActuel = 'classique';
	}
}

$( function() {
    $( "#thèmes" ).selectmenu();
  } );
var a = 0;
function test(){

    var p = document.createElement("p");
    nouveauDiv = document.createElement("div");
    nouveauP= document.createElement("p");
    nouveauP.id="texte"+a;
    nouveauP.className="texte";
    nouveauP.innerHTML="Salutation"+a;
    nouveauDiv.appendChild(nouveauP);

  // ajoute l'élément qui vient d'être créé et son contenu au DOM
    mon_div = document.getElementById("element");
    document.body.insertBefore(nouveauDiv, mon_div);
    a++;
    document.body.insertBefore(nouveauDiv, mon_div);
    $(document).ready(function(){
    $(".texte").click(function() {
      selection = this.id;
    });
});

}