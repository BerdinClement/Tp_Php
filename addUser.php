<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    async
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/semantic-ui@2/dist/semantic.min.css"
  />
  <script src="https://cdn.jsdelivr.net/npm/semantic-ui-react/dist/umd/semantic-ui-react.min.js"></script>
  <title>BUT APP</title>
</head>
<body style="background-color: #eee;">
    <?php 
        session_start();

        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("Location: login.php");
            exit;
        }
    ?>

    <div style="width: 14%;" class="ui sidebar visible inverted vertical menu">

        <h2 style="margin-bottom: 0px;" class="item"><a href="index.php">BUT 2 - APP </a> </h2>

        <h4 style="margin-top: 0px; margin-bottom: 0px;" class="item"><?php echo $_SESSION['username'] ?></h4>
    
        <a class="item" href='photo.php'>
            Voir les photos
        </a>
        <a class="item" href="profil.php">
            Voir mon profil
        </a>
        <a class="item"href="php/logout.php">
            Se deconnecter
        </a>
        <?php
            if($_SESSION['role']==='admin'){
                echo('
                    <a style="color: red;" class="active item"href="addUser.php">
                        Ajouter un utilisateur
                    </a>
                ');
            }
        ?>

    </div>
    <div style="width: 86%; float:right;">

        <div style="margin: 10px;" class="ui red aligned segment">
            <h2>Ajouter un nouvel utilisateur</h2> 
        </div>
        <form style="width: 40%; margin-left:15px ; margin-top: 20px;" action="php/newUser.php" method="post" class="ui form">
        <div class="field">
            <label>Identifiant</label>
            <input type="text" name="username" placeholder="..." required>
        </div>
        <div class="field">
            <label>Mot de passe</label>
            <input type="password" name="password" placeholder="..." required>
        </div>
        <div class="field">
            <label>Confirmer le mot de passe</label>
            <input type="password" name="confirmPassword" placeholder="..." required>
        </div>

        <div class="field">
            <label>Role</label>
            <select multiple="" class="ui dropdown" name="role">
                <option value="app">app</option>
                <option value="admin">admin</option>
            </select>
        </div>
            <button style="width: 100%; margin: auto;" class="ui button" type="submit">Valider</button>
        </form>

        
    </div>        
    
    

</body>
</html>
