
<?php
session_start();
if(isset($_POST['valider']) and isset($_POST['pseudo']) and isset($_POST['pwd'])){
    if(!empty($_POST['pseudo']) and !empty($_POST['pwd'])){
        $pseudo_defaut = 'Rony';
        $pwd_defaut = 'Rony';
        
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp =  htmlspecialchars($_POST['pwd']);
        if($pseudo == $pseudo_defaut and $mdp == $pwd_defaut){
           $_SESSION['auth'] = true;
            
            header('Location: index.php');
}
        else{
            echo '<p class="incorrect">Votre Pseudo ou mot de passe est incorrect</p>';
            
}
    }
    else{
        echo '<p class="remp">Desole vous devez remplir tous les champs</p>';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="championnat.css" rel="stylesheet"/>
        <title>
            Espace connexion Admin
        </title>
    </head>
    <body class="corps">
        
        <div class="bloc_form">
            <h3>Login</h3>
            <form method="post" action="">
                <div class="bloc_input">
                <input type="text" name="pseudo" placeholder="Rony">
                    </div>
                <div class="bloc_input">
                <input type="password" name="pwd" placeholder="Rony">
                    </div>
                <button class="bout" type="submit" name="valider">Connecter</button>
            </form>
        </div>
    </body>
</html>