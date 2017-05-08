/*~~~~~~~~~~~~~~~~~~~~~~*/
/*   Carte Heuristique  */
/*~~~~~~~~~~~~~~~~~~~~~~*/
function Carte(i,idc){
    /*
	idcourant : id courant des elements créés
	elems : tableau d'element constituant la carte
	liaisons : ensemble des liaisons
	nom : nom de la carte
	id : identifiant de la carte
	idCrea : Liste des identifiants des créateurs
	styl : Définie le style général pour chaque element de la carte
	*/
    this.idcourant=0;
    this.elems={};
    this.liaisons=new Array();
    this.ensembles=new Array();
    this.nom="Sans_nom";
    this.id=i; //à remplir par la suite
    this.idCrea=idc;
    this.styl={
        couleur:"black",
        bordure:"solid",
        backgrnd:"white"
    }
    this.type='Carte'
}

Carte.prototype.CreatEnsemble=function(ids,type){
    if(type==0)
        this.ensembles.push(new Limite(idcourant++,ids));
    else {
        if(type==1)
            this.ensembles.push(new Accolade(idcourant++,ids));
        else
            alert("type d'ensemble non définie");
    }
}

Carte.prototype.DelEnsemble=function(id){}

Carte.prototype.CreatSu=function(px,py){
    new Sujet(-1,this.idcourant,px,py);
}

Carte.prototype.CreatEns=function(tabId){}

Carte.prototype.CreatLiaison=function(/*truc*/){}


Carte.prototype.Suppr=function(selection){
	var elem = document.getElementById(selection);
	elem.parentNode.removeChild(elem);
	this.DelElem(selection);
}


Carte.prototype.DelElem=function(iddel){
    //suppression element
    var ok=false;
    var len=this.elems.length;
    for(var i=0;i<len;i++){
        if(this.elems[i]==iddel){
            ok=true;
            len--;
        }
        if(ok){
            this.idFils[i]=this.idFils[i+1];
            this.idFils[i+1]=-1; // à vérifier
        }
    }
	if(ok=true)
		this.elems.pop();
    //supression des liaisons comprenant l'element
    ok=false;
    len=this.liaisons.length;
    var imp=0;
    for(var i=0;i<len;i++){
        if(this.liaisons[i].id1==iddel||this.liaisons[i].id2==iddel){
            imp++;
            len--;
            ok=true;
        }
        if(ok){
            this.liaisons[i]=this.liaisons[i+imp];
            this.liaisons[i+imp]=null; // à vérifier
        }
    }
	for(var i=0;i<imp;i++)
		this.liaisons.pop();
    //suppression de l'element dans les possibles ensembles
    ok=false;
    for(var i=0;i<this.ensembles.length;i++){
        len=this.ensembles[i].idSujets.length;
        ok=false;
        for(var j=0;j<len;j++){
            if(this.ensembles[i].idSujets[j]==iddel)
                ok=true;
            if(ok){
                this.ensembles[i].idSujets[j]=this.ensembles[i].idSujets[j+1];
                this.ensembles[i].idSujets[j+1]=-1; // à vérifier
            }
        }
    }
	if(ok=true)
		this.ensembles.pop();
}

Carte.prototype.AjoutCreateur=function(idc){
    idCrea.push(idc);
}

/*Carte.prototype.Affiche=function(){
    for(var i=0;i<this.elems.length;i++)
        this.elems[i].Affiche();
    //console.log("longueur ensemble : "+this.ensembles.length);

    for(var i=0;i<this.ensembles.length;i++)
        this.ensembles[i].Affiche();
    //console.log("longueur element : "+this.elems.length);
}*/

/*                                   */
Carte.prototype.AfficheImport=function(){
	var cartementale="";
	for(var i=0;i<this.ensembles.length;i++)
		cartementale+=this.ensembles[i].AfficheImport();
	/*for(var i=0;i<this.liaisons.length;i++)
		cartemental+=this.liaisons[i].AfficheImport();*/
	for(var i=0;i<this.elems.length;i++)
		cartementale+=this.elems[i].AfficheImport();
	document.getElementById('Carte').innerHTML=cartementale;
}


Carte.prototype.ajoutElem = function(type,px,py,idselect) {
    console.log(idselect)
    console.log("verif elem : "+this.VerifElem(idselect));

    if(this.VerifElem(idselect)==1){
        var newElem = new window[type](idselect,this.idcourant,px,py);    
        new Liaison(idselect,newElem.id);
    }
}

Carte.prototype.VerifElem=function(idselect){
	var n=0;
    if(this.elems[idselect] instanceof Sujet)
        n=1;
    else{
        if(this.elems[idselect] instanceof Commentaire)
            n=2;
        else{
            if(this.elems[idselect] instanceof Bulle)
                n=3;
        }
    }
    return n;
}


/*----------------------------------------------------------------*/
/*----------------------------------------------------------------*/
/*----------------------------------------------------------------*/


/*~~~~~~~~~~~~~~~~~~~~~~*/
/*   Classe mere Elem   */
/*~~~~~~~~~~~~~~~~~~~~~~*/

function Elem(i,px,py){
    /*
	id : element unique (entier)
	texte : chaine de caractere
	styl : définie un style spécifique à l'element
	posx : position en x du centre de l'element
	posy : position en y du contre de l'element
	*/
    this.id=i;
    this.texte="";
    this.posx=px;
    this.posy=py;
    this.styl={
        couleur:"black",
        bordure:"solid",
        backgrnd:"white"
    }


    this.Affiche = function() {
        $('#Carte').append('<div id="'+this.id+'" class="'+this.type+' Elem" contenteditable="true" style="top:'+this.posy+'px;left:'+this.posx+'px;">'+this.texte+'</div>');

        console.log("affiche elem");
    } 
	
	
	this.AfficheImport=function(){
		var t='<div id="'+this.id+'" class="'+this.type+' Elem" contenteditable="true" style="top:'+this.posy+'px;left:'+this.posx+'px;">'+this.texte+'</div>';
		return t;
	}

    this.saveText = function(text) {
        this.texte = text;
    }


    carte.elems[this.id] = this;
    this.Affiche();

    var that = this;

    $('#'+this.id).draggable({
        cursor: 'move', 
        drag: function(){
            var position = $(this).position();
            that.posx = position.left;
            that.posy = position.top;

            $.each(carte.liaisons, function(key, liaison){
                if (liaison.id1 == that.id || liaison.id2 == that.id) {
                    liaison.redraw();
                }
            })
        }
    })
    carte.idcourant++
}


/*~~~~~~~~~~~~~~~~~~~~~~~*/
/*   Classe fille Sujet  */
/*~~~~~~~~~~~~~~~~~~~~~~~*/

function Sujet(idp,i,px,py){
    /*
	idPere : identifiant du pere du sujet (-1 si aucun pere)
	idFils : tableau des identifiant des fils du sujet (ensemble des sous sujets)
	*/
    this.type = 'Sujet'

    this.base=Elem;
    this.base("sujet"+i,px,py);
    this.idPere=idp;
}

//Sujet.prototype.AjoutPere=function(idp){
//    this.idPere=idp;
//}


//Sujet.prototype.SupprFils=function(idf){
//    var ok=false;
//    var len=this.idFils.length;
//    for(var i=0;i<len;i++){
//        if(this.idFils[i]==idf){
//            ok=true;
//            len--;
//        }
//        if(ok){
//            this.idFils[i]=this.idFils[i+1];
//        }
//    }
//}

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*   Classe fille Commentaire  */
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

function Commentaire(ids,i,px,py){
    /*
	idSujet : identifiant du sujet affilié
	*/
    this.type = 'Commentaire'

    this.base=Elem;
    this.base("commentaire"+i,px,py);
    this.idSujet=ids;

}


/*~~~~~~~~~~~~~~~~~~~~~~~*/
/*   Classe fille Bulle  */
/*~~~~~~~~~~~~~~~~~~~~~~~*/

function Bulle(ids,i,px,py){
    /*
	idSujet : identifiant du sujet affilié
	*/
    this.type = 'Bulle'

    this.base=Elem;
    this.base("bulle"+i,px,py);
    this.idSujet=ids;

}


/*----------------------------------------------------------------*/
/*----------------------------------------------------------------*/
/*----------------------------------------------------------------*/


/*~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*   Classe Mere ensemble  */
/*~~~~~~~~~~~~~~~~~~~~~~~~~*/

function Ensemble(id,idSujets){
    this.idSujets=idSujets;
    this.id=id;
	
	this.AfficheImport=function(){
	var t='';
	return t;
}
}

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*    Classe fille Accolade   */
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

function Accolade(ids,i){
    /*
	idSujets : identifiant des sujets affilié
	*/
    this.base=Ensemble;
    this.base(i,ids);
}

Accolade.prototype.Affiche=function(){
    var t="";
    return t;
}

/*~~~~~~~~~~~~~~~~~~~~~~~~*/
/*  Classe fille Limite   */
/*~~~~~~~~~~~~~~~~~~~~~~~~*/

function Limite(ids,i){
    /*
	idSujets : identifiant des sujets affilié
	*/
    this.base=Ensemble;
    this.base(ids,i);
}

Limite.prototype.Affiche=function(){
}


/*----------------------------------------------------------------*/
/*----------------------------------------------------------------*/
/*----------------------------------------------------------------*/


/*~~~~~~~~~~~~~~~~~~~~*/
/*       Liaison      */
/*~~~~~~~~~~~~~~~~~~~~*/

function Liaison(i1,i2){
    /*
	id1 : element de départ de la liaison (permet de récuperer les coordonnée du centre pour point de départ)
	id2 : element d'arrivée de la liaison
	type : définie de type de laison (possiblement modifiable par thme ou style)
	styl : définie une couleur à la liaison
	*/
    this.id1=i1;
    this.id2=i2;
    this.type=0;
    this.styl={
        couleur:"black"
    }

    this.index = carte.liaisons.push(this) -1

    this.redraw();
}

Liaison.prototype.redraw = function() {
    this.x1 = carte.elems[this.id1].posx+45;
    this.y1 = carte.elems[this.id1].posy+15;
    this.x2 = carte.elems[this.id2].posx+44;
    this.y2 = carte.elems[this.id2].posy+15;
    $('svg .'+this.index).remove();
    drawLine(this.x1, this.y1, this.x2, this.y2, this.index)
}



Carte.prototype.Sauvegarde=function(){
    $.ajax({
        type: 'POST',
        url:"save/save.php",
        data:{carte : JSON.stringify(this)},
        success:function(){console.log("Sauvegarde reussie");},
        error:function(){console.log("echec de sauvegarde")}
    });
}


function importer() {
    var id = prompt('Id de la carte', 1);

    if ($.isNumeric(Number(id))) {
        $.ajax({
            type: 'POST',
            url: "save/import.php",
            data: {id: Number(id)},
            dataType: 'json',
            success: function(carteJson) {
                console.log(carteJson);

                $('#Carte').html('')

                carte = reconstructCarte(carteJson);
                //carte.AfficheImport();

                console.log(carte)
            },
            error: function(e) {
                console.log(e);
            }
        })    
    }
}


function reconstructCarte(carteJson){
    var newCarte = new window[carteJson.type];
    for (var key in carteJson){
        if (key != 'elems'){
            newCarte[key] = carteJson[key]
        }   
    }   

    $.each(carteJson.elems, function(objName, obj) {
        var newObj = new window[obj.type]

        for (var key in obj) {
            newObj[key] = obj[key]
        }  
        newCarte.elems[objName] = newObj;
    })

    return newCarte;
}

function SVG(tag) {
    return document.createElementNS('http://www.w3.org/2000/svg', tag);
}

var drawLine = function(x1,y1,x2,y2,index){
    var $svg = $("svg");
    $(SVG('line'))
        .attr('class', index)
        .attr('x1', x1)
        .attr('y1', y1)
        .attr('x2', x2)
        .attr('y2', y2)
        .appendTo($svg);
};






//fin
