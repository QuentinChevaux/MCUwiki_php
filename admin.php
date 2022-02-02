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

    include 'admin_header.php';

?>

    <div class="admin_div">
        
        <form action="" method="POST" id="admin_login">
        
            <div class="w-50 mx-auto">
        
                <div class="form-floating mt-4">
                    
                    <input type="text" name="login" class="form-control"/>
                    <label for="login" class="form-label">Login :</label>
                        
                </div>
                    
                <div class="form-floating mt-4">
                    
                    <input type="password" name="password" class="form-control"/>
                    <label for="password" class="form-label">Password :</label>
                        
                </div>
        
                <div>
            
                    <button type="submit" name="valider" class="btn btn-dark w-100 mt-4 dashboard_form_validate_button">Se Connecter</button>
            
                </div>
                
            </div>
        
        </form>

    </div>

</body>
</html>