<?php 
    session_start();
  
    require_once 'connexion.php';
    $pdo = getPDO();

    $password = $_POST['password']??null;
    $newPassword = $_POST['confirmPassword']??null;
    $user = $_SESSION['username'];

    if($password === $newPassword){
        $passhash = hash('md5',$password);
        $request = $pdo->prepare('UPDATE user set password = :password where username like :user');
        $request->execute(['user'=>$user,'password'=>$passhash]);
    }
    header("Location: ../index.php");
