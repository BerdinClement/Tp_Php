<?php 
    session_start();
  

    if(!isset($_SESSION['like']) || $_SESSION['like'] != true){
        require_once 'connexion.php';
        $pdo = getPDO();

        $url = $_POST['url']??null;


        $result = $pdo->query("select * from picture where link like '$url';")->fetch(PDO::FETCH_ASSOC);
        $like = $result['likes'];
        
        $request = $pdo->prepare("UPDATE picture SET likes = $like + 1 where link like '$url'");
        $request->execute();

        $_SESSION['like'] = true;
        $_SESSION['unlike'] = false;
    }

    header("Location: ../photo.php");


    
