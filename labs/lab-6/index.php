<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Lab: 6 Admin Login Page </title>
        <style>
            body {
                text-align: center;
            }
        </style>
    </head>    
    <body>
        <h1> Admin Login </h1>
        <form method="POST" action="loginProcess.php">
            Username: <input type="text" name="username"/> <br/>
            Password: <input type="password" name="password"/> <br/>
            <input type="submit" name="login" value="Login">
        </form>
        <?php
            session_start();
            if($_SESSION['loginError'] == true){
                echo "<p>Incorrect username or password...</p>";
            }
        ?>
    </body>
</html>