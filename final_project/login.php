<?php session_start() ?>
<!DOCTYPE html>
<html>
    <?php include 'inc/header.php'; ?>
    <body>
        <header>
            <?php include 'inc/nav.php'; ?>
        </header>
        <div id="login-field">
            <?php
                if ($_SESSION['loginStatus'] == "FAILED") {
                    echo "<p class='error-highlight'>Incorrect username or password</p>";
                }
            ?>
            <form method="POST" action="inc/loginRoute.php">
                Username: <input type="text" name="username" placeholder="username">
                Password: <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Login" name="login">
            </form>
        </div>
    </body>
</html>