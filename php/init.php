<?php 
    session_start();
  
    require_once 'connexion.php';
    $pdo = getPDO();

    $passhash = hash('md5','admin');
    $request = $pdo->prepare("INSERT INTO user values (1,'admin',:password, 'admin')");
    $request->execute(['password'=>$passhash]);

