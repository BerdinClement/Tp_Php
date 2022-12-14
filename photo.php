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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
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

    <div id="menu" style="width: 14%;" class="ui sidebar visible inverted vertical menu">

        <h2 style="margin-bottom: 0px;" class="item"><a href="index.php">BUT 2 - APP </a> </h2>

        <h4 style="margin-top: 0px; margin-bottom: 0px;" class="item"><?php echo $_SESSION['username'] ?></h4>
    
        <a class=" active item" href='photo.php'>
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
                    <a style="color: red;" class="item"href="addUser.php">
                        Ajouter un utilisateur
                    </a>
                ');
            }
        ?>

    </div>
    <div id="main" style="width: 86%;  height:99%;  float:right;">
        <div style="margin: 10px;" class="ui red aligned segment">
            <h2>Les photos : <i id="addPict" onclick="addP()" style="float: right;" class="plus circle icon"></i></h2> 
        </div>

        <div id="formAddPict" style="margin: 15px; display: none;">
                <div>
                    <h2 style="margin-bottom: 10px; border-bottom: 1px solid red;">Ajouter une image</h2>
                    <form class="iu form" action="php/upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" style="display: inline-block; width: 40%;" name="file">
                            <button style="display: inline-block; width: 19%;"class="iu button" type="submit">Ajouter</button>
                    </form>
                </div>
      </div>


        <div id="photos" style="margin:auto;overflow: auto; display: flex;">


        </div>

    </div>

    <script>
        $('#photos').load('php/loadPicture.php')

        function addP(){
            document.getElementById('formAddPict').style.display == 'none' ? document.getElementById('formAddPict').style.display = 'block' : document.getElementById('formAddPict').style.display = 'none'
        }

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
                document.getElementById('photos').style.flexDirection = 'column'
            }
        }

        function activeMenu() {
            document.getElementById('menu').className = "ui sidebar visible inverted vertical menu";
            document.getElementById('menu').style.heigth="100%";
        }

    </script>

</body>
</html>

