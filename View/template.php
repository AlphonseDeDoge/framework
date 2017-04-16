<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?php echo $titre ?></title>
    </head>
    <body>
        <div id="global">

            <header>
                <a href="index.php"><h1>Site cartes heuristiques</h1></a>
            </header>


            <div id="contenu">
                <?php echo $contenu ?>
            </div> <!-- #contenu -->


            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS. 2017
            </footer>

        </div> <!-- #global -->
    </body>
</html>
