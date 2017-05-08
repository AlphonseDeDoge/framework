<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Assets/theme/<?php echo $style ?>" />
        <title><?php echo $titre ?></title>
    </head>
    <body>
        <div id="global">

            <header>
                <a href="index.php"><h1 id="clicAccueil">Mind Maps</h1></a>
            </header>


            <div id="contenu">
                <?php echo $contenu ?>
            </div> <!-- #contenu -->


            <footer id="piedBlog">
                Site projet techno web 2017
            </footer>

        </div> <!-- #global -->
        <script src="../Assets/Javascript/jquery.js"></script>
        <script src="../Assets/Javascript/jquery-ui-1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="../Assets/Javascript/CarteMentaleV2.js"></script>
        <script src="../Assets/Javascript/theme.js"></script>
        <script>
            var carte=new Carte(1,20);
            var selection;
            var posx,posy,px=0,py=0;

            carte.CreatSu(200,200);

            //carte.Affiche();

            $("#Carte").ready(function(){

                $("#Carte").mousemove(function(event){
                    posx=event.pageX-50;
                    posy=event.pageY-70;
                })


                $("#Carte").dblclick(function(){
                    carte.CreatSu(posx+0,posy+0);

                    //$('.Su').draggable({cursor: "move"});
                });

                $("#Carte").click(function(event){
                    selection=event.target.id;
                    console.log("selection : "+selection);
                    /*if (selection.indexOf('sujet') > -1)
                        $('#menuajout button').prop('disabled', '');
                    else
                        $('#menuajout button').prop('disabled', 'disabled');*/
                });

                $(document).on('blur' ,'.Elem', function(){
                    var text = $(this).text();
                    carte.elems[$(this).attr('id')].saveText(text);

                })
            });
        </script>
        <script>themePro();</script>

    </body>
</html>
