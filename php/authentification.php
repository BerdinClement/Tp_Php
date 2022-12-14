<?php 
    session_start();
  
    require_once 'connexion.php';
    $pdo = getPDO();

    $id = $_POST['id']??null;
    $password = $_POST['password']??null;

    $passhash = hash('md5',$password);

    $request = $pdo->prepare( 'select * from user where username like :id and password like :password');
    $request->execute(['id'=>$id,'password'=>$passhash]);

    $var = $request->fetch();

    if($var!=false){
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $id;
        $_SESSION['role'] = $var['role'];
        header('Location: ../index.php');
    } else {
        header('Location: ../login.php');
    }
