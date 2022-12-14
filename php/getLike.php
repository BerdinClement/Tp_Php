<?php 
    // session_start();
    

    function getLike($url){

        require_once 'connexion.php';
        $pdo = getPDO();

        $result = $pdo->query("select * from picture where link like '$url';")->fetch(PDO::FETCH_ASSOC);
        $like = $result['likes'];

        return $like;
    }
        

