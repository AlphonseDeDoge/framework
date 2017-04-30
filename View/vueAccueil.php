<?php
    $titre = "Accueil";
    $error=$msgError;

    ob_start();
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $_SESSION['passwordTemp']=$_POST['password'];
        $_SESSION['usernameTemp']=$_POST['username'];
        header('Location: index.php?action=signin');
    }
?>
    <div class="connexion">
<?php
    if(!isset($_SESSION['connection']) || !$_SESSION['connection']):
?>

    <form action="index.php" method="post">
        <div>
            <label>Username:</label><input type="text" id="username" name="username" placeholder="username">
            <label>Password:</label><input type="password" id="password" name="password" placeholder="password">
            <?php echo $error; ?>
            <label><input id="boutonConnect" type="submit" value="Connect"></label>
        </div>
    </form>

    <a href="index.php?action=inscription">New?</a>

<?php

    else:

?>

    <form action="index.php?action=compte" method="post">
        <input type="submit" value="Compte" class="gestionCompte" />	<!-- Value : nom de l'utilisateur -->
    </form>
    <a href="index.php?action=signout">Sign Out</a>

<?php endif; ?>



    </div>
    <hr />
    <h1>Bienvenue!</h1>
    <div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius tellus quis nisi mattis consectetur. Nunc nunc tortor, rhoncus in est sed, imperdiet convallis tortor. Cras malesuada felis vel libero mattis porta. Donec in nisl lacus. Nam sagittis dolor neque. Fusce pulvinar et quam et commodo. Ut facilisis et magna a pretium. Phasellus laoreet volutpat diam, a finibus urna iaculis tincidunt. Suspendisse vitae est eget nibh pulvinar tincidunt. Phasellus elementum lectus lorem, maximus posuere elit tempus in. Phasellus pellentesque aliquet magna vitae scelerisque. Nullam malesuada varius risus nec maximus. Nullam scelerisque, arcu et dignissim pulvinar, lectus libero euismod purus, id elementum libero ipsum eu dolor.

            Fusce interdum eros nec faucibus tempus. Donec dui libero, mollis sit amet nunc quis, interdum dictum tellus. Curabitur convallis urna lacus, maximus ultricies sapien tempus et. Fusce eget felis a sem viverra consectetur vitae vel magna. Donec mollis nec massa ullamcorper imperdiet. Quisque sodales aliquam tortor. Sed efficitur tortor odio, et volutpat ex porta nec. Cras id viverra orci, sed ultrices tortor. Sed eu cursus lectus. Aliquam non purus hendrerit, vulputate sapien ac, dapibus dui. Suspendisse ultricies urna non urna pharetra maximus.

            Aliquam fermentum ligula eget augue finibus, nec commodo urna euismod. Donec viverra tortor et pulvinar laoreet. Fusce magna orci, lacinia sed tellus pretium, viverra malesuada velit. Nam enim quam, facilisis porta magna a, imperdiet congue diam. Nullam eu turpis vel diam rutrum auctor a eu lorem. Integer at ligula et lorem accumsan suscipit. Praesent ut mollis mauris. Duis accumsan at quam a vehicula. Vestibulum ac erat vitae magna eleifend malesuada. In sodales neque eu risus aliquet convallis. Aliquam vulputate non libero id eleifend. Aenean lobortis est eu justo bibendum pharetra. Donec tristique eros non dignissim laoreet.

            Suspendisse potenti. Etiam lobortis dui nec eros bibendum auctor. Nullam et laoreet mauris, ut sodales quam. Sed condimentum accumsan massa at pulvinar. Nulla dolor purus, tempor in consequat et, condimentum a eros. Maecenas eget feugiat elit. Nam feugiat condimentum massa, vel consectetur nisi malesuada in. Mauris fermentum, urna vitae commodo imperdiet, massa nunc finibus lectus, nec condimentum elit nisi non tellus. Duis vestibulum velit id massa imperdiet vehicula. Morbi imperdiet, tellus a hendrerit accumsan, arcu metus feugiat purus, ac dictum justo urna vitae magna.

            Maecenas semper lectus quis dui vestibulum viverra. Sed malesuada placerat viverra. Praesent sagittis, odio nec condimentum laoreet, risus diam molestie purus, quis gravida enim dui vel nisl. Donec aliquet at dolor ut varius. Nullam et erat iaculis, porttitor orci sed, blandit risus. Phasellus a viverra felis, a vulputate nibh. Vivamus laoreet massa a sem finibus iaculis. Etiam semper arcu lobortis rutrum ultricies. Etiam feugiat sapien quis nisi finibus consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent vel justo accumsan, dignissim nisi nec, finibus leo.
        </p>
    </div>

<?php
    $contenu=ob_get_clean();
 ?>
