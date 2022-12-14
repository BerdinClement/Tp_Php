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
<body onload="checkQuery()">
    <?php 
        session_start();

        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("Location: login.php");
            exit;
        }
    ?>

    <div id="activeMenu" style="display: none; width: 100%; height: 6%; background-color: #1b1c1d; margin-bottom: 10px;">
        <i style="display: inline-block; color: white; margin-top:10px; margin-left :5px;" onclick="activeMenu()" class="terminal icon"></i> <h3 style="display: inline-block;color: white; margin-top:10px; margin-left :5px;">   Menu</h3>
    </div>

    <div style="width: 14%;" id="menu" class="ui sidebar visible inverted vertical menu">

        <h2 style="margin-bottom: 0px;" class="item"><a href="index.php">BUT 2 - APP </a> </h2>

        <h4 style="margin-top: 0px; margin-bottom: 0px;" class="item"><?php echo $_SESSION['username'] ?></h4>
    
        <a class="item" href='photo.php'>
            Voir les photos
        </a>
        <a class="item active" href="profil.php">
            Voir mon profil
        </a>
        <a class="item"href="php/logout.php">
            Se deconnecter
        </a>
        <?php
            if($_SESSION['role']==='admin'){
                echo('
                    <a style="color: red;" class="item"href="addUser.php">
                        Ajouter un utilisateur
                    </a>
                ');
            }
        ?>

    </div>
    <div style="width: 86%; float:right;" id="main">

        <div style="margin: 10px;" class="ui red aligned segment">
            <h2>Informations</h2> 
        </div>

        <div id="info" class="ui form" style="width: 40%; margin-left:15px ; margin-top: 20px; margin-bottom: 40px;">
            <div class="inline fields">
                <div class="field">
                    <label>Nom d'utilisateur</label>
                    <input type="text" value="<?php echo $_SESSION['username']?> "readonly>
                </div>
                <div class="field">
                    <label>Rôle</label>
                    <input type="text" value="<?php echo $_SESSION['role']?> "readonly>
                </div>
            </div>
        </div>




        <div style="margin: 10px;" class="ui red aligned segment">
            <h2>Changer son mot de passe</h2> 
        </div>
        <form id="changePass" style="width: 40%; margin-left:15px ; margin-top: 20px;" action="php/newPassword.php" method="post" class="ui form">
        <div class="field">
            <label>Nouveau mot de passe</label>
            <input type="password" name="password" placeholder="..." required>
        </div>
        <div class="field">
            <label>Confirmer le mot de passe</label>
            <input type="password" name="confirmPassword" placeholder="..." required>
        </div>
            <button style="width: 100%; margin: auto;" class="ui button" type="submit">Valider</button>
        </form>

        
    </div>        
    
    <script>

        function checkQuery(){
            if (!window.matchMedia("(min-width: 800px)").matches) {
                let main = document.getElementById('main')
                let menu = document.getElementById('activeMenu')
                document.getElementById('menu').className = "ui sidebar inverted vertical menu";
                document.getElementById('menu').style.width="50%";
                document.getElementById('menu').style.heigth="0%";
                main.style.width=("95%")
                main.style.heigth=("94%")
                main.style.margin=("auto")
                main.style.float=("")
                menu.style.display = ('block')
                document.getElementById('info').style.width = '100%'
                document.getElementById('info').style.margin = 'auto'
                document.getElementById('changePass').style.width = '80%'
                document.getElementById('changePass').style.margin = 'auto'
            }
        }

        function activeMenu() {
            document.getElementById('menu').className = "ui sidebar visible inverted vertical menu";
            document.getElementById('menu').style.heigth="100%";
        }

    </script>
    

</body>
</html>
