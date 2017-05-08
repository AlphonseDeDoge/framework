<?php
    $titre = "Compte";
    $style = "style.css";
    $error=$msgError;

    ob_start();
    if(isset($_POST['prev_password']) && isset($_POST['new_password']))
    {
        $_SESSION['new_passwordTemp']=$_POST['new_password'];
        $_SESSION['prev_passwordTemp']=$_POST['prev_password'];
        header('Location: index.php?action=changePwd');
    }
?>
<br />
<hr />

<div>
    <table class="table">
        <tr>
            <td>
                <h1>Account changes</h1>
                <h3>Change password</h3>

                <form action="index.php?action=compte" method="post">
                    <label>Current password:</label><input type="password" class="inputCompte" name="prev_password"><?php echo $error; ?>
                    <label>New password:</label><input type="password" class="inputCompte" name="new_password"><br /><br />
                    <button type="submit">Submit</button><br />
                </form>

                <h3>Delete account</h3>
                <form action="index.php?action=deleteAccount" method="post">
                    <input type="submit" value="Delete account" />
                </form>

                <h3>Sign out</h3>
                <form action="index.php?action=signout" method="post">
                    <input type="submit" value="Sign out" />
                </form>
            </td>

        <?php
            if($_SESSION['accountLevel'] == 0):
        ?>

            <td>
                <h1>Administration Panel</h1>
                <h3>Change user password</h3>

                <form action="index.php?action=userpwd" method="post">
                    <label>Username:</label><input type="text" class="inputCompte" name="userusername">
                    <label>Password:</label><input type="password" class="inputCompte" name="userpwd"><br /><br />
                    <button type="submit">Submit</button><br />
                </form>

                <h3>Delete user account</h3>
                <form action="index.php?action=delUser" method="post">
                        <label>Username:</label><input type="password" class="inputCompte" name="deleteuser"><br /><br />
                        <input type="submit" value="Delete account" />
                 </form>
            </td>
        </tr>
    </table>

        <?php endif; ?>

</div>
<?php $contenu = ob_get_clean() ?>
