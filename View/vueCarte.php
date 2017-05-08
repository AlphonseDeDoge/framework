<?php
    $titre = "Carte";
    $style = "theme.css";
    ob_start();
?>

<div class="connexion">
    <form action="index.php?action=compte" method="post">
        <input type="submit" value="<?php echo $_SESSION['username'];?>" class="gestionCompte" />	<!-- Value : nom de l'utilisateur -->
    </form>
    <a href="index.php?action=signout">Sign Out</a>
</div>
<br />
<hr />

    <div>
        <!--<div id="menu">
            <button type="button" onClick="carte.Sauvegarde();"><span>Sauvegarder</span></button>
            <button type="button" onClick="importer();"><span>Importer</span></button>
        </div>
        <div id="menuajout">
            <button disabled="disabled" type="button" onClick="carte.ajoutElem('Sujet',px,py,selection);"><span>Sujet</span></button>


            <button disabled="disabled" type="button" onClick="carte.ajoutElem('Commentaire',px,py,selection);"><span>Commentaire</span></button>


            <button disabled="disabled" type="button" onClick="carte.ajoutElem('Bulle',px,py,selection);"><span>Bulle</span></button>


            <button disabled="disabled" type="button" onClick="carte.Suppr(selection);"><span>Supprimer</span></button>
        </div>-->
        <!-- pour le menu / outils etc -->
        <nav>
            <ul id="menu">
                <li id="home" title="Afficher l'accueil"> <a href="#"></a></li>
                <li id="enregistrer" title="Enregistrer la carte"> <a href="#" type="button" onClick="carte.Sauvegarde();"></a></li>
                <li id="charger" title="Charger la carte"> <a href="#" type="button" onClick="importer();"></a></li>
                <li id="sujet" title="Sujet"> <a href="#" type="button" onClick="carte.ajoutElem('Sujet',px,py,selection);"></a></li>
                <li id="bulle" title="Bulle"> <a href="#" type="button" onClick="carte.ajoutElem('Bulle',px,py,selection);"></a></li>
                <li id="commentaire" title="Commentaire" onClick="carte.ajoutElem('Commentaire',px,py,selection);"><a href="#"></a></li>
                <li id="suppression" title="Suppression" onClick="carte.Suppr(selection);"><a href="#"></a></li>
                <li id="iconeTheme" title="Thèmes"> <a></a>
                    <ul>
                        <li><a href="#" onClick="themePro()">Professionnel</a></li>
                        <li><a href="#" onClick="themeBusinessI()">Business I</a></li>
                        <li><a href="#" onClick="themeBusinessII()">Business II</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    <div id="Background"></div>
    <svg>
    </svg>

    <div id="Carte"></div>

    <div class="dialog" title="Contrôleur" style="opacity: 1;">

        <div>
            <div>
                <div>
                    <table>
                        <tbody>
                            <tr>
                                <td>Taille de police:</td>
                                <td>
                                    <div>
                                        <button type="button" onClick="diminue_taille()">
                                            <span>A-</span>
                                        </button>
                                        <button type="button" onClick="augmente_taille()">
                                            <span>A+</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Style de police:</td>
                                <td>
                                    <div>
                                        <button type="button" onClick="gras()">
                                            <span>G</span>
                                        </button>
                                            <button type="button" onClick="italique()">
                                                <span>I</span>
                                        </button>
                                            <button type="button" onClick="souligne()">
                                                <span>S</span>
                                        </button>
                                            <button type="button" onClick="barre()">
                                                <span>B</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Couleur de police:</td>
                                <td>
                            <!-- Palette de couleur -->
                                <map name="couleurPolice">
                                <!-- Première ligne -->
                                    <area class="noir" onClick="couleurPolice(this.className)" shape="rect" coords="0,0,19,19">
                                    <area class="gris50" onClick="couleurPolice(this.className)" shape="rect" coords="22,0,41,19">
                                    <area class="rougeFonce" onClick="couleurPolice(this.className)" shape="rect" coords="44,0,63,19">
                                    <area class="rouge" onClick="couleurPolice(this.className)" shape="rect" coords="66,0,85,19">
                                    <area class="orange" onClick="couleurPolice(this.className)" shape="rect" coords="88,0,107,19">
                                    <area class="jaune" onClick="couleurPolice(this.className)" shape="rect" coords="110,0,129,19">
                                    <area class="vert" onClick="couleurPolice(this.className)" shape="rect" coords="132,0,151,19">
                                    <area class="turquoise" onClick="couleurPolice(this.className)" shape="rect" coords="154,0,173,19">
                                    <area class="indigo" onClick="couleurPolice(this.className)" shape="rect" coords="176,0,195,19">
                                    <area class="violet" onClick="couleurPolice(this.className)" shape="rect" coords="198,0,217,19">
                                <!-- Deuxième ligne -->
                                    <area class="blanc" onClick="couleurPolice(this.className)" shape="rect" coords="0,22,19,41">
                                    <area class="gris25" onClick="couleurPolice(this.className)" shape="rect" coords="22,22,41,41">
                                    <area class="marron" onClick="couleurPolice(this.className)" shape="rect" coords="44,22,63,41">
                                    <area class="roseSaumon" onClick="couleurPolice(this.className)" shape="rect" coords="66,22,85,41">
                                    <area class="or" onClick="couleurPolice(this.className)" shape="rect" coords="88,22,107,41">
                                    <area class="jauneClair" onClick="couleurPolice(this.className)" shape="rect" coords="110,22,129,41">
                                    <area class="vertClair" onClick="couleurPolice(this.className)" shape="rect" coords="132,22,151,41">
                                    <area class="turquoiseClair" onClick="couleurPolice(this.className)" shape="rect" coords="154,22,173,41">
                                    <area class="bleuGris" onClick="couleurPolice(this.className)" shape="rect" coords="176,22,195,41">
                                    <area class="lavande" onClick="couleurPolice(this.className)" shape="rect" coords="198,22,217,41">
                                </map>
                                    <img id="img" src="../Assets/theme/images/couleur.png" width="218" height="42" alt="Couleur" usemap="#couleurPolice">
                                </td>
                            </tr>
                            <!--<tr>
                                <td>Couleur de branche:</td>
                                <td>

                                </td>
                            </tr>-->
                            <tr>
                                <td>Couleur de fond:</td>
                                <td>
                            <!-- Palette de couleur -->
                                <map name="background">
                                <!-- Première ligne -->
                                    <area class="noir" onClick="background(this.className)" shape="rect" coords="0,0,19,19">
                                    <area class="gris50" onClick="background(this.className)" shape="rect" coords="22,0,41,19">
                                    <area class="rougeFonce" onClick="background(this.className)" shape="rect" coords="44,0,63,19">
                                    <area class="rouge" onClick="background(this.className)" shape="rect" coords="66,0,85,19">
                                    <area class="orange" onClick="background(this.className)" shape="rect" coords="88,0,107,19">
                                    <area class="jaune" onClick="background(this.className)" shape="rect" coords="110,0,129,19">
                                    <area class="vert" onClick="background(this.className)" shape="rect" coords="132,0,151,19">
                                    <area class="turquoise" onClick="background(this.className)" shape="rect" coords="154,0,173,19">
                                    <area class="indigo" onClick="background(this.className)" shape="rect" coords="176,0,195,19">
                                    <area class="violet" onClick="background(this.className)" shape="rect" coords="198,0,217,19">
                                <!-- Deuxième ligne -->
                                    <area class="blanc" onClick="background(this.className)" shape="rect" coords="0,22,19,41">
                                    <area class="gris25" onClick="background(this.className)" shape="rect" coords="22,22,41,41">
                                    <area class="marron" onClick="background(this.className)" shape="rect" coords="44,22,63,41">
                                    <area class="roseSaumon" onClick="background(this.className)" shape="rect" coords="66,22,85,41">
                                    <area class="or" onClick="background(this.className)" shape="rect" coords="88,22,107,41">
                                    <area class="jauneClair" onClick="background(this.className)" shape="rect" coords="110,22,129,41">
                                    <area class="vertClair" onClick="background(this.className)" shape="rect" coords="132,22,151,41">
                                    <area class="turquoiseClair" onClick="background(this.className)" shape="rect" coords="154,22,173,41">
                                    <area class="bleuGris" onClick="background(this.className)" shape="rect" coords="176,22,195,41">
                                    <area class="lavande" onClick="background(this.className)" shape="rect" coords="198,22,217,41">
                                </map>
                                    <img id="img" src="../Assets/theme/images/couleur.png" width="218" height="42" alt="Couleur" usemap="#background">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php
    $contenu=ob_get_clean();
 ?>
