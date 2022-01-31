<?php

    session_start();

    if(isset($_POST['valider'])) {

        $connexion_bdd = new PDO('mysql:dbname=mcuwiki;host=localhost;charset=UTF8', 'root', '');
    
        $adminrequest = $connexion_bdd -> prepare('SELECT * FROM `admin` WHERE `login` = ?');

        $adminrequest -> execute( [ $_POST['login'] ] );

        $login = $adminrequest -> fetch();

        if($login) {

            if(password_verify($_POST['password'], $login['password'])) {  // Verify si le mdp est similaire a celui encrypté en BCRYPT sur la bdd

                $_SESSION['admin'] = $_POST['login'];
                header('Location: dashboard.php');

            }

        }

    }

?>

<form action="" method="POST">

    <label for="login">Login : </label>
    <input type="text" name="login"/>

    <label for="password">Password :</label>
    <input type="password" name="password" />

    <input type="submit" name="valider" value="Se Connecter" />

</form>

</body>
</html>