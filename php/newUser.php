<?php 
    session_start();
  
    require_once 'connexion.php';
    $pdo = getPDO();



    $password = $_POST['password']??null;
    $newPassword = $_POST['confirmPassword']??null;
    $user = $_POST['username'];
    $role = $_POST['role']??null;

    if($password === $newPassword){
        if($role!==null){
            $passhash = hash('md5',$password);
            $request = $pdo->prepare("INSERT INTO user (username,password,role) values (:user ,:password, :role)");
            $request->execute(['user'=>$user,'password'=>$passhash, 'role'=>$role]);
            header("Location: ../addUser.php");
        } else{
            $passhash = hash('md5',$password);
            $request = $pdo->prepare("INSERT INTO user (username,password,role) values (:user ,:password, 'app')");
            $request->execute(['user'=>$user,'password'=>$passhash]);
            header("Location: ../login.php");
        }
        
    }
    
